<?php
    require_once 'db.php';
    require_once 'Keyboard.php';

    $passedId = $_GET['id'] ?? null;
    $inputError = false;
    
    if($passedId === null) {
        header('Location: index.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nev = null;
        $ar = null;
        $mech = null;
        $htv = null;

        if(empty($_POST['newNev'])) {
            $inputError = true;
        } else {
            $nev = $_POST['newNev'];
        }

        if(empty($_POST['newAr'])) {
            $inputError = true;
        } else {
            $ar = $_POST['newAr'];
        }

        if(empty($_POST['newMech'])) {
            $inputError = true;
        } else {
            $mech = $_POST['newMech'];
        }

        if(empty($_POST['newHtv'])) {
            $inputError = true;
        } else {
            $htv = $_POST['newHtv'];
        }

        if( $nev != null &&
            $ar != null &&
            $mech != null &&
            $htv != null) {
                Keyboard::updateAt($passedId, $nev, $ar, $mech, $htv);
                header('Location: index.php');
            }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Selected Keyboard</title>
</head>
<body>
    <div class="container">
        <h3><?php echo $passedId ?>. billentyűzet szerkesztése</h3>
    </div>
    <div class="container">
        <form method="POST">

            <div class="container">
                <label for="nev">Adja meg a megváltozott nevet: </label><input id="nev" name="newNev" type="text">
                <br>
                <label for="ar">Adja meg a megváltozott árat:</label><input id="ar" name="newAr" type="number">
            </div>

            <label for="isMech">Mechanikus ?</label><div id="isMech" class="container">
                <label for="mechIgen">Igen</label><input name="newMech" type="radio"><br>
                <label for="mechNem">Nem</label><input name="newMech" type="radio">
                // TODO: GET INT INSTEAD OF STRING 
            </div>

            <label for="isHtv">Van háttérvilágítás ?</label><div id="isHtv" class="container">
                <label for="htvIgen">Igen</label><input id="htvIgen" name="newHtv" type="radio"><br>
                <label for="htvNem">Nem</label><input id="htvNem" name="newHtv" type="radio">
            </div>

            <div class="container">
                <input type="submit" value="Szerkesztés befejezése">
            </div>

        </form>
        <?php
                if($inputError) {
                    echo '<h1>Ne hagyjon mezőt üresen!!/h1>';
                }
            ?>
    </div>
</body>
</html>