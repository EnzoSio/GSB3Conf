<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connexion : </title>

	<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');


body{
    background: #A62626;
    font-family: 'Comfortaa', cursive;
}
#container{
    width:400px;
    margin-left:auto;
    margin-right:auto;
    margin-top:10%;
}
/* Bordered form */
form {
    width:100%;
    
    padding: 30px;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
#container h1{
    width: 38%;
    margin: 0 auto;
    padding-bottom: 10px;
}

label {
    font-size:12px;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit] {
    background-color: #A62626;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
input[type=submit]:hover {
    background-color: white;
    color: #A62626;
    border: 1px solid #A62626;
}

	</style>
</head>
<body>
	<div id="container">
            <!-- zone de connexion -->
            
            <?php
                echo form_open('MonControleur/connexion');
                echo heading("Connexion", 1);
                echo form_label("Login : ");
                echo form_input('Login');
                echo form_label("Mdp : ");
                echo form_password('Mdp');                
                echo form_submit("Valider", "Valider");
                echo form_close();
            ?>
	</div>
</body>
</html>