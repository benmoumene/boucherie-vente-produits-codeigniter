<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
    private $id_client;
    public function __construct()
    {
        parent::__construct();

        $this->secure();

        $this->id_client = $this->session->nom_ut;

    }

    public function index()
    {

        $id_client = $this->id_client;

        $this->data($this->session->role_ut . '/' . $this->session->role_ut, array_merge(
            $this->view_result('materiaux'),
            $this->view_result('commandes', compact('id_client')),
            ['cart' => $this->cart->contents()]
        ));
    }

    public function vue_edit_client(){

        $id_client = $this->id_client;

        $this->data('client/vue_edit_client', array_merge(
            $this->view_result('materiaux'),
            $this->view_result('commandes', compact('id_client')),
            ['cart' => $this->cart->contents()]
        ));
    }

    public function edit_client(){
        $nom_ut = $this->input->post('nom_ut');
        $anc_mot_pass = md5($this->input->post('anc_mot_pass'));
        $mot_pass = $this->input->post('mot_pass');
        $conf_mot_pass = $this->input->post('conf_mot_pass');
        $validate = [];

        if ($nom_ut != $this->session->nom_ut){

            $validate['nom_ut'] = $nom_ut;

            $this->form_validation->set_rules('nom_ut', 'Nom d\'Utilisateur', 'required|min_length[3]|max_length[25]|is_unique[utilisateurs.nom_ut]',
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le champ %s doit contenir au moins trois caractères',
                    'max_length' => 'Le champ %s doit contenir au plus vingt cinq caractères',
                    'is_unique' => 'Ce %s existe déjà'
                ]
            );
        }

        $anc_mot_pass_db = $this->Ci_vente_model->getUnique('utilisateurs', ['nom_ut' => $this->session->nom_ut])->mot_pass;

        if ($anc_mot_pass != $anc_mot_pass_db){

            $validate['anc_mot_pass_db'] = $anc_mot_pass_db;
            $validate['anc_mot_pass'] = $anc_mot_pass;

            $this->form_validation->set_rules('anc_mot_pass', 'Ancien Mot de passe', 'required|min_length[6]|matches[anc_mot_pass_db]',
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le champ %s doit contenir au moins six caractères',
                    'matches' => "L'%s est incorrect"
                ]
            );
        }

        $this->form_validation->set_rules('mot_pass', 'Mot de passe', 'required|min_length[6]|max_length[12]',
            [
                'required' => 'Le champ %s est requis',
                'min_length' => 'Le champ %s doit contenir au moins six caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères'
            ]
        );

        $this->form_validation->set_rules('conf_mot_pass', 'Confirm Mot de passe', 'required|min_length[6]|max_length[12]|matches[mot_pass]',
            [
                'required' => 'Le champ %s est requis',
                'min_length' => 'Le champ %s doit contenir au moins six caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères',
                'matches' => 'Le champ %s doit correspondre avec le champ Mot de passe'
            ]
        );

        $this->form_validation->set_data(array_merge($validate, compact('mot_pass', 'conf_mot_pass')));

        if ($this->form_validation->run()){

            $mot_pass = md5($mot_pass);
            $data = compact('nom_ut', 'mot_pass');

            if ($this->Ci_vente_model->setUpdate('utilisateurs', $data, ['nom_ut' => $this->session->nom_ut])){

                $this->session->set_userdata(compact('nom_ut'));
                $this->setMsg("Client $nom_ut vos informations ont bien été modifiées !", 'success');
                redirect('client/');
            }
            else{

                $this->setMsg("Impossible de modifier vos informations personelles !");
            }
            redirect('client/');
        }
        else {

            $this->setMsg();
            $this->index();
        }
    }

    public function panier()
    {
        if ($this->form_validation->run())
        {
            $name = $this->input->post('code_mat');
            $qte_cmd = $this->input->post('qte_cmd');

            $mat = $this->Ci_vente_model->getUnique('materiaux', ['name' => $name]);

            $data = array(
                'id'      => $mat->code_mat,
                'qty'     => $qte_cmd,
                'price'   => $mat->prix_unitaire,
                'name'    => $name,
            );

            $this->cart->insert($data);


            redirect('client');


        }
        else
        {
            $this->setMsg();
            $this->index();
        }


    }

    public function reinit_cmd()
    {
        $this->cart->destroy();
        $this->setMsg("Votre commande a bien été reinitialisée...!");
        redirect('client');

    }

    public function submit_cmd()
    {
        if (! empty($this->cart->contents())){
            $cmd_id = $this->cmd_id();
            $nom_client = $this->session->nom_client;
            $date_cmd = date('Y-m-d');
            $statut = 'Votre commande est en attente';

            $id_client = $this->session->nom_ut;


            $this->Ci_vente_model->setInsert('commandes', compact('cmd_id', 'id_client', 'nom_client', 'date_cmd', 'statut'));

            foreach ($this->cart->contents() as $row){
                unset($row['id']);
                unset($row['rowid']);
                $this->Ci_vente_model->setInsert('lignes_commandes', array_merge(
                    compact('id_client', 'cmd_id', 'nom_client', 'date_cmd'), $row));
            }
            $this->cart->destroy();
            $this->setMsg("Votre commande a été bien envoyée avec succès!", 'success');
        }
        else{
            $this->setMsg('Votre panier est encore vide');
        }
        redirect('client');
    }

    public function suppr_cmd(){

        $id = $this->input->get('id');
        $data = compact('id');

        if ($this->Ci_vente_model->setDelete('commandes', $data)){

            $this->setMsg('la commande a bien été supprimée', 'success');
        }
        else{

            $this->setMsg("Impossible de supprimer la commande");
        }
        redirect('client');
    }

    function cmd_id(){
        $al = '0123456789abcdefghijklmnopqrstuvwxyzBCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($al, 10)), 0, 10);
    }

    function test()
    {
        $this->dd($_SESSION);
    }

}
