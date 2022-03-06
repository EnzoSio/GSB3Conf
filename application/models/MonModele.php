<?php
    class MonModele extends CI_Model {

    private $table = "contact";
	
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function seConnecter($login, $mdp) {
            $mdpChiffré = sha1($mdp);
            $this->db->where('login', $login);
            $this->db->where('mdp', $mdpChiffré);
            $query = $this->db->count_all_results('visiteur');
            if($query == 1) {
                $rep = true;
            }
            else {
                $rep = false;
            }
            return $rep;
        }

        function getTypeVis($login, $mdp){
            $mdpChiffré = sha1($mdp);
            $this->db->where('login', $login);
            $this->db->where('mdp', $mdpChiffré);
            $this->db->where('statut', 'V');
            $query = $this->db->count_all_results('visiteur');
            if($query == 1) {
                $rep = true;
            }
            else {
                $rep = false;
            }
            return $rep;
        }

        function getTypeRes($login, $mdp){
            $mdpChiffré = sha1($mdp);
            $this->db->where('login', $login);
            $this->db->where('mdp', $mdpChiffré);
            $this->db->where('statut', 'R');
            $query = $this->db->count_all_results('visiteur');
            if($query == 1) {
                $rep = true;
            }
            else {
                $rep = false;
            }
            return $rep;
        }

        function getConf() {
            $query = $this->db->get('conference');
            return $query->result();
        }

        function insertInscri($idVisiteur, $idConf, $idTheme) {
            $insc = array('code'=>$idVisiteur, 'id'=>$idConf, 'CodeC'=>$idTheme);
            $this->db->insert('inscris', $insc);
	    }

        function recupId($login){
            $req = "SELECT id FROM visiteur WHERE login = ?";
            $query = $this->db->query($req, array($login));
            $query = $query->row();
            return $query;
        }
    }
?>