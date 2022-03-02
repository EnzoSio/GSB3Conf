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
		$this->load->model("MonModele");
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
		$bool = $this->MonModele->seConnecter($login, $mdp);
		if($bool != null){
			$query = $this->MonModele->getTypeVis($login, $mdp);
			if($query == 'V'){
				$this->load->view('vue_inscription');
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
	public function inscriptionConf() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('horaire', 'horaire', 'required');
		$this->form_validation->set_rules('duree', 'duree', 'required');
		$this->form_validation->set_rules('nbPlace', 'nbPlace', 'required');
		$this->form_validation->set_rules('dateP', 'dateP', 'required');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$horaire = $this->input->post('horaire');
			$duree = $this->input->post('duree');
			$nbPlace = $this->input->post('nbPlace');
			$dateP = $this->input->post('dateP');
			$codeC = $this->input->post('codeC');
			$code = $this->input->post('code');
			$codeSalle = $this->input->post('codeSalle');
			$this->load->model('MonModele');  
			$this->MonModele->insertConf($id, $horaire, $duree, $nbPlace, $dateP, $codeC, $code, $codeSalle);
		}
	}
}
