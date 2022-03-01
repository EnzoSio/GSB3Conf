<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
    <?php
        echo link_tag('assets/css/styles.css');
    ?>

</head>
<body>
	<div id="container">
            <!-- zone de connexion -->
            
            <?php
                echo form_open('MonControleur/inscription');
                echo heading("Inscription", 1);
                echo form_label("Login : ");
                echo form_input('login', set_value('login'));
                echo form_label("Mot de Passe : ");
                echo form_password('mdp', set_value('mdp'));                
                echo form_submit("Valider", "Valider");
                echo form_close();
            ?>
	</div>
</body>
</html>