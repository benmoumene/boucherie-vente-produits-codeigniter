<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_client extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->secure();
    }

    public function index()
    {
        $tout_client = [];

        foreach ($this->Ci_vente_model->getList('commandes') as $cmd) {

            foreach ($this->Ci_vente_model->getJoin(['commandes', 'lignes_commandes'],['cmd_id'],
                ['lignes_commandes.nom_client' => $cmd->nom_client]) as $cl){

                $tout_client [$cmd->cmd_id] = $this->Ci_vente_model->getJoin(['commandes', 'lignes_commandes'],
                    ['cmd_id'], ['lignes_commandes.nom_client' => $cl->nom_client, 'lignes_commandes.cmd_id' => $cmd->cmd_id]) ;

            }
        }

        $this->data($this->session->role_ut . '/' . $this->session->role_ut, array_merge(
            $this->view_result('materiaux'),
            $this->view_result('commandes'),
            ['comm_list' => $tout_client]));
    }

    public function vue_edit_service_client()
    {

        $tout_client = [];

        foreach ($this->Ci_vente_model->getList('commandes') as $cmd) {

            foreach ($this->Ci_vente_model->getJoin(['commandes', 'lignes_commandes'],['cmd_id'],
                ['lignes_commandes.nom_client' => $cmd->nom_client]) as $cl){

                $tout_client [$cmd->cmd_id] = $this->Ci_vente_model->getJoin(['commandes', 'lignes_commandes'],
                    ['cmd_id'], ['lignes_commandes.nom_client' => $cl->nom_client, 'lignes_commandes.cmd_id' => $cmd->cmd_id]) ;

            }
        }
        $this->data('service_client/vue_edit_service_client', array_merge(
            $this->view_result('materiaux'),
            $this->view_result('commandes'),
            ['comm_list' => $tout_client]));
    }

    public function edit_service_client(){
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

    function cmd_id(){
        $al = '0123456789abcdefghijklmnopqrstuvwxyzBCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($al, 10)), 0, 50);
    }

    function valider ()
    {
        $cmd_id = $this->input->get('cmd_id');
        $materiaux = ($this->Ci_vente_model->getJoin(['commandes', 'lignes_commandes', 'materiaux'], ['cmd_id', 'name']));
        $drapeau = true;
        $statut = "Votre commande est acceptée";

        foreach ($materiaux as $materiel){
            if (intval($materiel->qty) > intval($materiel->qte_stock)){

                $drapeau = false;
            }

        }

        if ($statut) {

            $this->Ci_vente_model->setUpdate('commandes', compact('statut'), compact('cmd_id'));
            foreach ($materiaux as $materiel) {

                $this->Ci_vente_model->setUpdate('materiaux', ['qte_stock' =>  intval($materiel->qte_stock) - intval($materiel->qty)],
                    ['name' => $materiel->name]);
            }

            $this->setMsg("Validation de la commande effectuée avec succes", 'success');
        }
        else{

            $this->setMsg("La qualité en stock est insuffisante");
        }

        redirect('Service_client');
    }

    function invalider ()
    {
        $cmd_id = $this->input->get('cmd_id');
        $statut = "Votre commande est réfusée";

        if ($this->Ci_vente_model->setUpdate('commandes', compact('statut'), compact('cmd_id'))){

            $this->setMsg("Inalidation de la commande effectuée avec succes", 'success');
        }
        else{

            $this->setMsg("Inalidation de la commande a échoué");
        }

        redirect('Service_client');
    }

    function vue_control_cat(){
        $this->data("service_client/vue_control_cat", $this->view_result('materiaux'));
    }

    function ajout_materiaux ()
    {

        if ($this->form_validation->run()){

            $name = $this->input->post('name');
            $qte_stock = $this->input->post('qte_stock');
            $prix_unitaire = $this->input->post('prix_unitaire');
            $desc_mat = $this->input->post('desc_mat');

            $data = compact('name', 'qte_stock', 'prix_unitaire', 'desc_mat');

            if ($this->Ci_vente_model->setInsert('materiaux', $data)){

                $this->setMsg("Enregistrement effectué avec succès", 'success');
                redirect('service_client/vue_control_cat');
            }
            else{

                $this->setMsg("Impossible d'enregistrer le materiel !");
                redirect('service_client/vue_control_cat');
            }
        }
        else {

            $this->setMsg();
            redirect('service_client/vue_control_cat');
        }
    }

    function suppr_mat ()
    {
        $code_mat = $this->input->get('code_mat');

        if ($this->Ci_vente_model->setDelete('materiaux', compact('code_mat'))){

            $this->setMsg("Le matériel a bien été supprimé!", 'success');
            redirect('service_client/vue_control_cat');
        }
        else{

            $this->setMsg("Impossible de supprimer ce matériel");
            redirect('service_client/vue_control_cat');
        }
        redirect('Service_client/vue_control_cat');
    }
}
