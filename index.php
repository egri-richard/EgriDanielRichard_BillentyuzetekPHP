<?php
    require_once 'db.php';
    require_once 'Keyboard.php';

    $data = Keyboard::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billentzűzetek</title>
</head>
<body>
    
<?php

    foreach($data as $e) {
        $retMech = $e->getMechanikus() ? 'igen' : 'nem';
        $retHtv = $e->getHattervil() ? 'van' : 'nincs';

        echo '<div>';
        echo '<h5>'. $e->getNev() .'</h5>';
        echo '<p>Ár: '. $e->getAr() .'</p>';
        echo '<p>Mechanikus: '. $retMech .'</p>';
        echo '<p>Háttérviláítás: '. $retHtv .'</p>';
        echo '<p>Listahoz adva: '. $e->getListAdv()->format('Y-m-d') .'</p>';
    }

?>

</body>
</html>