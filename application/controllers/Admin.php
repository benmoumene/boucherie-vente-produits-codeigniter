<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->secure();
    }

    public function index()
    {
        $this->data($this->session->role_ut . '/' . $this->session->role_ut);
    }

    function admin()
    {
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
                $this->setMsg("L'administrateur $nom_ut vos informations ont bien été modifiées !", 'success');
                redirect('admin/');
            }
            else{

                $this->setMsg("Impossible de modifier vos informations personelles !");
            }
            redirect('admin/');
        }
        else {

            $this->setMsg();
            $this->index();
        }


    }

    public function vue_ajout_ut(){
       $this->data('admin/ajout_ut');
    }

    public function ajout_ut ()
    {

        if ($this->form_validation->run()){

            $nom_ut = $this->input->post('nom_ut');
            $role_ut = $this->input->post('role_ut');
            $mot_pass = md5($this->input->post('mot_pass'));
            $date_creat = date('Y-m-d');

            $data_ut = compact('nom_ut', 'role_ut', 'mot_pass', 'date_creat');

            if ($this->Ci_vente_model->setInsert('utilisateurs', $data_ut)){

                $this->setMsg("L'utilisateur $nom_ut a bien été enregistré !", 'success');
            }
            else{

                $this->setMsg("Impossible d'enregistrer l'utilisateur $nom_ut");
            }
            redirect('admin/ajout_ut');
        }
        else {

            $this->setMsg();
            $this->vue_ajout_ut();
        }
    }

    public function list_ut ()
    {
        $this->data('admin/list_ut', $this->view_result('utilisateurs'));
    }

    public function suppr_ut(){

        $id = $this->input->get('id');
        $data = compact('id');

        if ($this->Ci_vente_model->setDelete('utilisateurs', $data)){

           $this->setMsg('l\'utilisateur a bien été supprimé', 'success');
        }
        else{

            $this->setMsg("Impossible de supprimer l'utilisateur");
        }
        redirect('admin/list_ut');
    }




    function test()
    {

        $this->setMsg('le test par ici');
        redirect('admin');
    }

}