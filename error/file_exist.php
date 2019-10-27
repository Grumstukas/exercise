<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/main.css">

    <title>Užduotis</title>
</head>
<body>

    <div class="section section_read">
        <div class="name">Klaida</div>
        <div>Failas pavadinimu: <b><?= $_SESSION['file_name'] ?? '' ?>.<?= $_SESSION['file_type'] ?? '' ?></b> sukurti nepavyko</div>

        <?php
            unset($_SESSION['file_name']);
            unset($_SESSION['file_type']);
        ?>

        <a href="http://localhost/exercise/index.php">Į pradžią</a>
    </div>

</body>
</html>
