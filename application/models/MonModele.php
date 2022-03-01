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
    }
?>