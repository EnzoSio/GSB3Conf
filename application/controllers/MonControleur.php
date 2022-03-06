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
				$data['idVis'] = $this->MonModele->recupId($login);
				$this->load->view('vue_inscription', $data);
			}
			else{
				$query2 = $this->MonModele->getTypeRes($login, $mdp);
				if($query2 == 'R'){
					$data['queryy'] = $this->affichageBDD();
					$this->session->set_userdata('login', $login);
					$this->load->view('vue_stats', $data);
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
		$this->form_validation->set_rules('idVisiteur', 'idVisiteur', 'required');
		$this->form_validation->set_rules('idConf', 'idConf', 'required');
		$this->form_validation->set_rules('idTheme', 'idTheme', 'required');
		if ($this->form_validation->run()) {
			$idVisiteur = $this->input->post('idVisiteur');
			$idConf = $this->input->post('idConf');
			$idTheme = $this->input->post('idTheme');
			$this->load->model('MonModele');  
			$this->MonModele->insertInscri($idVisiteur, $idConf, $idTheme);
		}
		$login = $this->session->userdata('login');
		$data['idVis'] = $this->MonModele->recupId($login);
		$data['query'] = $this->affichageBDD();
		$this->load->view('vue_inscription', $data);
	}
}

