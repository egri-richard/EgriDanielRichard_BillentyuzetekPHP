<?php
    require_once 'db.php';
    require_once 'Keyboard.php';

    $passedId = $_GET['id'] ?? null;
    $nevErr = false;
    $arErr = false;
    $mechErr = false;
    $htvErr = false;
    
    if($passedId == null) {
        header('Location: index.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(empty($_POST['newNev'])) {
            $nevErr = true;
        } else {
            $nev = $_POST['newNev'];
        }

        if(empty($_POST['newAr'])) {
            $arErr = true;
        } else {
            $ar = $_POST['newAr'];
        }

        $mech = $_POST['newMech'] ?? null;
        if($mech == null) {
            $mechErr = true;
        }

        $htv = $_POST['newHtv'] ?? null;
        if($htv == null) {
            $htvErr = true;
        }

        if(!$nevErr && !$arErr && !$mechErr && !$htvErr) {
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
                <div class="container d-grid gap-3">
                    <label class="form-label" for="nev">Adja meg az új billentyűzet nevét: </label>
                    <input class="form-control" id="nev" name="newNev" type="text">
                    <?php if($nevErr) echo "hiba"?>

                    <br>
                    <label class="form-label" for="ar">Adja meg az új billentyűzet árát:</label>
                    <input class="form-control" id="ar" name="newAr" type="number">
                    <?php if($arErr) echo "hiba"?>

                    <div id="isMech" class="container-fluid d-inline">
                        <span>Mechanikus ?</span><?php if($mechErr) echo " HIBA" ?>

                        <label class="form-check-label" for="mechIgen">Igen</label><input class="form-check-input" name="newMech" type="radio" value="1">

                        <label class="form-check-label" for="mechNem">Nem</label><input class="form-check-input" name="newMech" type="radio" value="0">

                    </div>

                    <div id="isHtv" class="container-fluid d-inline">
                        <span>Van háttérvilágítás ?</span><?php if($htvErr) echo " HIBA" ?>

                        <label class="form-check-label" for="htvIgen">Igen</label><input class="form-check-input" id="htvIgen" name="newHtv" type="radio" value="1">

                        <label class="form-check-label" for="htvNem">Nem</label><input class="form-check-input" id="htvNem" name="newHtv" type="radio" value="0">

                    </div>

            <div class="container">
                <input class="btn btn-primary" type="submit" value="Szerkesztés befejezése">
            </div>

        </form>

    </div>
</body>
</html>