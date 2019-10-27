<?php
define('DIR', __DIR__);


session_start();
$_SESSION['DIR'] = __DIR__;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">

    <title>Užduotis</title>
</head>
<body>

<?php

if(!empty($_POST)){

    if(isset($_POST['exercise'])){
        var_dump($_POST);
        if($_POST['exercise'] == 'ex1'){
            header('Location: http://localhost/exercise/views/read/read.php');
            die();
        } elseif ($_POST['exercise'] == 'ex2') {
            header('Location: http://localhost/exercise/views/write/write.php');
            die();
        } elseif ($_POST['exercise'] == 'ex3') {
            header('Location: http://localhost/exercise/views/give/give.php');
            die();
        }
    }
}

?>

    <div class="section">
        <div class="name">Užduotis</div>
        <form action="" method="POST">

            <div class="input">
                <input type="radio" name="exercise" id="ex1" value="ex1">
                <label for="ex1">Skaitymas iš failo</label>
            </div>

            <div class="input">
                <input type="radio" name="exercise" id="ex2" value="ex2">
                <label for="ex2">Rašymas į failą</label>
            </div>

            <div class="input">
                <input type="radio" name="exercise" id="ex3" value="ex3">
                <label for="ex3">Duomenų atidavimas</label>
            </div>

            <button type="submit">Pasirinkti</button>
        </form>
    </div>

</body>
</html>
