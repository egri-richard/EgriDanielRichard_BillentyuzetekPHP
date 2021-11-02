<?php
    require_once 'db.php';
    require_once 'Keyboard.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!empty($_POST['deleteId'])) {
            $delId = $_POST['deleteId'];
            Keyboard::delete($delId);
        }
    }

    $data = Keyboard::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Billentzűzetek</title>
</head>
<body>
    
<?php

    foreach($data as $e) {
        echo '<div class="container border">';
        echo '<form method="POST">';
        echo '<input type="hidden" name="deleteId" value="' . $e->getId() . '">';
        echo '<h4 class="">'. $e->getNev() .'       <button id="delBtn" class="btn" type="submit" >X</button></h4>';
        echo '</form>';
        echo '<p>Ár: '. $e->getAr() .' Ft-tól</p>';
        echo '<p>Mechanikus: '. $e->getMechanikus() .'</p>';
        echo '<p>Háttérvilágítás: '. $e->getHattervil() .'</p>';
        echo '<small class="text-muted">Listahoz adva: '. $e->getListAdv()->format('Y-m-d') .'</small><br>';
        echo '<a class="link-light" href="editKeyboard.php?id='. $e->getId() .'">Szerkesztés</a>';
        echo '</div>';
        
    }

?>

<div class="container border">
    <a class="h6 link-light" href="addKeyboard.php">Új billentyűzet hozzáadása a listához</a>
</div>

</body>
</html>