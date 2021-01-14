<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


    }

    public function index()
	{
        $this->load->view('auth/accueil');
        $this->load->view('disposition/pied');
	}

	public function login()
	{
        if (isset($this->session->role_ut)){
            $this->setMsg("Connexion automatique", 'success');
            $this->secure();
        }

        $this->load->view('auth/login');
	}

	public function connexion()
	{
        if ($this->form_validation->run()){

            $nom_ut = $this->input->post('nom_ut');
            $mot_pass = $this->input->post('mot_pass');

            $this->conn($nom_ut, $mot_pass);
        }
        else
        {
            $this->setMsg();
            $this->login();
        }
	}

	public function vue_enreg()
    {
        $this->load->view('auth/vue_enreg');
    }

	public function enreg()
    {
        if ($this->form_validation->run()){

            $nom_ut = $this->input->post('nom_ut');
            $mot_pass = md5($this->input->post('mot_pass'));
            $role_ut = 'client';
            $date_creat = date('Y-m-d');
            $nom_client = $this->input->post('nom_client');
            $adresse_client = $this->input->post('adresse_client');
            $telephone_client = $this->input->post('telephone_client');
            $id_utilisateur = $this->input->post('nom_ut');

            $data_ut = compact('nom_ut', 'mot_pass', 'role_ut', 'date_creat');
            $data_ct = compact('nom_client', 'adresse_client', 'telephone_client', 'id_utilisateur');

            if (($this->Ci_vente_model->setInsert('utilisateurs', $data_ut)) AND ($this->Ci_vente_model->setInsert('clients', $data_ct))){

                $this->setMsg("La boucherie MANOAH INVESTISMENTS vous souhaite la bienvenue au sein de son établissement commercial...", 'success');

                $this->conn($nom_ut, $this->input->post('mot_pass'));

            }
            else{

                $this->setMsg("Echec lors de la création du compte");
                redirect('auth/vue_enreg');
            }

        }
        else
        {
            $this->setMsg();
            $this->vue_enreg();
        }
    }

    private function conn($nom_ut, $mot_pass)
    {
        $user_data = $this->Ci_vente_model->connexion($nom_ut, $mot_pass);

        if ($user_data){

            $session_data = [
                'nom_ut' => $user_data->nom_ut,
                'role_ut' => $user_data->role_ut
            ];

            $this->session->set_userdata($session_data);

            if ($this->session->role_ut == 'client'){

                $nom_client = ($this->Ci_vente_model->getUnique('clients', ['id_utilisateur' => $this->session->nom_ut]))->nom_client ;
                $this->session->set_userdata(compact('nom_client'));
            }
            $this->setMsg("La boucherie MANOAH INVESTISMENTS vous souhaite la bienvenue au sein de son établissement commercial...", 'success');
            $this->secure();
        }
        else{

            $this->setMsg("Le nom de l'utilisateur ou le mot de passe est incorrect");
            redirect('auth/login');
        }
    }

    function deconnexion (){

        $this->session->unset_userdata(['nom_ut', 'role_ut']);
        $this->setMsg("Vous êtes déconnecté");
        redirect('auth/login');
    }

}
