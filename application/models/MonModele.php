<?php
    class MonModele extends CI_Model {
        function seConnecter($login, $mdp) {
            $this->db->where('login', $login);
            $this->db->where('mdp', $mdp);
            $query = $this->db->count_all_results('visiteur');
            if($query = 1) {
                $rep = true;
            }
            else {
                $rep = false;
            }
            return $rep;
        }
    }
?>