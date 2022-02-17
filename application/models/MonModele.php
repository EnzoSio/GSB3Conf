<?php
    class MonModele extends CI_Model {
        function getVisiteur() {
            $sql = "SELECT * FROM visiteur limit 2";
            $query = $this->db->query($sql);
            return $query->result_array();
        }





        function insertVisiteur($login, $mdp){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('login', 'Login', 'required');
            $this->form_validation->set_rules('mdp', 'Mot De Passe', 'required');
            $sql = "INSERT INTO visiteur VALUES ('$login', '$mdp')";
            $query = $this->db->query($sql);
        }
    }
?>