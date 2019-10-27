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
        <div>Failo pavadinimu: <?= $_SESSION['file_name'] ?? '' ?> nėra</div>

        <?php
        unset($_SESSION['file_name']);
        ?>

        <a href="http://localhost/exercise/index.php">Į pradžią</a>
    </div>

</body>
</html>
