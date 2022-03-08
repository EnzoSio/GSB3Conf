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
                <h3 id="description" class="description text-center">
                    Bienvenue <?php echo $this->session->userdata('login'); ?> 
                    <?php
                        //echo form_open('MonControleur/');
                        //echo form_submit("Se déconnecter", "Se déconnecter");
                    ?>
                </h3>
            </header>
            <table class="container">
                <thead>
                    <tr>
                        <th><h1>Identifiant Conférence</h1></th>
                        <th><h1>Horaire</h1></th>
                        <th><h1>Durée</h1></th>
                        <th><h1>Places</h1></th>
                        <th><h1>Date</h1></th>
                        <th><h1>Salle</h1></th>
                        <th><h1>Inscription</h1></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($query as $item) {?>
                    <tr>
                        <td><?php echo $item->id;?></td>
                        <td><?php echo $item->horaire;?></td>
                        <td><?php echo $item->duree;?></td>
                        <td><?php echo $item->nbPlace;?></td>
                        <td><?php echo $item->dateP;?></td>
                        <td><?php echo $item->codeSalle;?></td>
                        <td>
                            <?php
                                echo form_open('MonControleur/inscriptionConf');
                                $idVisiteur = $idVis->id;   
                                echo form_hidden('idVisiteur', $idVisiteur);
                                echo form_hidden('idConf', $item->id);
                                echo form_hidden('idTheme', $item->CodeC);
                                echo form_submit("S'inscrire", "S'inscrire");
                                echo form_close();
                            ?>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <table class="container">
                <thead>
                    <tr>
                        <th><h1>idConf</h1></th>
                        <th><h1>idVis</h1></th>
                        <th><h1>idTheme</h1></th>
                        <th><h1>option</h1></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($inscris as $item) {?>
                    <tr>
                        <td><?php echo $item->id;?></td>
                        <td><?php echo $item->code;?></td>
                        <td><?php echo $item->CodeC;?></td>
                        <td>
                            <?php
                                echo form_open('MonControleur/desinscriptionConf');
                                $idVisiteur = $idVis->id;   
                                echo form_hidden('idVisiteur', $idVisiteur);
                                echo form_hidden('idConf', $item->id);
                                echo form_hidden('idTheme', $item->CodeC);
                                echo form_submit("Se désinscrire", "Se désinscrire");
                                echo form_close();
                            ?>
                        </td>
                    </tr>

                    
                <?php }?>
                
                </tbody>
            </table>   
        </div>
    </body>
</html>