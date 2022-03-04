<?php
    class MonModele extends CI_Model {
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
            /*$sql = "SELECT * FROM contacts limit 5";
            $query = $this->db->query($sql);*/
            return $query->result();
        }


        function insertConf($id, $horaire, $duree, $nbPlace, $dateP, $codeC, $code, $codeSalle) {
            $conf = array('id'=>'4', 
            'horaire'=>$horaire, 
            'duree'=>$duree, 
            'nbPlace'=>$nbPlace,
            'dateP'=>$dateP, 
            'codeC'=>'1', 
            'code'=>$code, 
            'codeSalle'=>$codeSalle);
            $this->db->insert('conference', $conf);
    
            /*return $query->result();*/
        }
    }
?>