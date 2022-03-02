<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
    <?php
        echo link_tag('assets/css/inscription.css');
    ?>

</head>
<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Inscription à une conférence</h1>
            <p id="description" class="description text-center">
            Bienvenue 
            
            <br>
                Veuillez-remplir le formulaire ci-dessous pour vous inscrire à une conférence
            </p>
        </header>
        <form id="survey-form">
            <div class="form-group">
                <label id="" for="horaire">Horaire</label>
                <input type="time" id="appt" name="appt" min="09:00" max="18:00" required>
            </div>
            <div class="form-group">
                <label id="" for="duree">Durée</label>
                <input type="text" name="duree" id="duree" class="form-control" placeholder="Entrez la durée" required />
            </div>
            <div class="form-group">
                <label id="" for="duree">Nombre de Places</label>
                <input type="text" name="nbPlace" id="nbPlace" class="form-control" placeholder="Entrez le nombre de place" required />
            </div>
            <div class="form-group">
                <label id="" for="duree">Durée</label>
                <input type="text" name="duree" id="duree" class="form-control" placeholder="Entrez la durée" required />
            </div>
            <div class="form-group">
                <label id="" for="duree">Date</label>
                <input id="date" type="date" value="2017-06-01">
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="submit-button">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>