<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connexion : </title>
    <?php
        echo link_tag('assets/css/styles.css');
    ?>

</head>
<body>
	<div id="container">
            <!-- zone de connexion -->
            
            <?php
                echo form_open('MonControleur/connexion');
                echo heading("Connexion", 1);
                echo form_label("Login : ");
                echo form_input('login');
                echo form_label("Mot de Passe : ");
                echo form_password('mdp');                
                echo form_submit("Valider", "Valider");
                echo form_close();
            ?>
	</div>
</body>
</html>