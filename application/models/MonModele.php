<?php
    class MonModele extends CI_Model {

    private $table = "contact";
	
        function __construct() {
            parent::__construct();
            $this->load->database();
        }
        //Fonction de connexion avec mot de passe chiffré
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
        //Fonction récupérant et comparant le type du visiteur
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
        //Fonction récupérant et comparant le type du responsable
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
        //Fonction récupérant la table conférence dans la bdd
        function getConf() {
            $query = $this->db->get('conference');
            return $query->result();
        }
        //Fonction récupérant la table inscris dans la bdd
        function getInscris() {
            $query = $this->db->get('inscris');
            return $query->result();
        }
        //Fonction permettant d'inscrire des visiteurs
        function insertInscri($idVisiteur, $idConf, $idTheme) {
            $insc = array('code'=>$idVisiteur, 'id'=>$idConf, 'CodeC'=>$idTheme);
            $this->db->insert('inscris', $insc);
	    }
        //Fonction permettant de supprimer les visiteurs
        function deleteInscri($idVisiteur, $idConf, $idTheme) {
            $insc = array('code'=>$idVisiteur, 'id'=>$idConf, 'CodeC'=>$idTheme);
            $this->db->delete('inscris', $insc);
	    }
        //Fonction permettant de récupérer les id
        function recupId($login){
            $req = "SELECT id FROM visiteur WHERE login = ?";
            $query = $this->db->query($req, array($login));
            $query = $query->row();
            return $query;
        }

        
    }
?>