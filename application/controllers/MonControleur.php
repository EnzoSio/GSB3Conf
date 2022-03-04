<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonControleur extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('vue_connexion');  
	}

	public function connexion() {
		$this->load->library('session');
		$this->load->model("MonModele");
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
		$bool = $this->MonModele->seConnecter($login, $mdp);
		if($bool != null){
			$query = $this->MonModele->getTypeVis($login, $mdp);
			if($query == 'V'){
				$data['query'] = $this->affichageBDD();	
				$this->session->set_userdata('login', $login);
				$this->load->view('vue_inscription', $data);


			}
			else{
				$query2 = $this->MonModele->getTypeRes($login, $mdp);
				if($query2 == 'R'){
					$this->load->view('vue_stats');
				}
			}
		}
		else {
			echo 'non';
		}
	}



	public function affichageBDD() {
        $this->load->model('MonModele');
        return $this->MonModele->getConf();
    }

	public function inscriptionConf() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code', 'Code');
		$this->form_validation->set_rules('id', 'Id');
		$this->form_validation->set_rules('CodeC', 'CodeC');
		if ($this->form_validation->run()) {
			$code = $this->input->post('code') ;
			$id = $this->input->post('id');
			$CodeC = $this->input->post('CodeC');
			$this->load->model('Monmodele');  
			$this->MonModele->insertInscri($code, $id, $CodeC);
		}
		$this->index();
	}
}

