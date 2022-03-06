<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo link_tag('assets/css/inscription.css');
    ?>
    <title>Statistiques</title>
</head>
<body>
<div class="container">
            <header class="header">
                <h1 id="title" class="text-center">Affichage des conférences</h1>
                <h3 id="description" class="description text-center">
                    Bienvenue <?php echo $this->session->userdata('login'); ?> 
                </h3>
            </header>
            <table class="container">
                <thead>
                    <tr>
                        <th><h1>Id</h1></th>
                        <th><h1>Durée</h1></th>
                        <th><h1>Places</h1></th>
                        <th><h1>Date</h1></th>
                        <th><h1>Salle</h1></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($queryy as $item) {?>
                    <tr>
                        <td><?php echo $item->id;?></td>
                        <td><?php echo $item->duree;?></td>
                        <td><?php echo $item->nbPlace;?></td>
                        <td><?php echo $item->dateP;?></td>
                        <td><?php echo $item->codeSalle;?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <table class="container">
                <thead>
                    <tr>
                        <th><h1>Id visiteur</h1></th>
                        <th><h1>Id conférence</h1></th>
                        <th><h1>Id thème</h1></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($inscriis as $item) {?>
                    <tr>
                        <td><?php echo $item->id;?></td>
                        <td><?php echo $item->code;?></td>
                        <td><?php echo $item->CodeC;?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>   
        </div>
</body>
</html>