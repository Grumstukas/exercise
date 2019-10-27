<?php

session_start();

include __DIR__.'/../../uploader.php';
use controller\Read;

$myRead = new Read;

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
        <div class="name">Failo <b><?= $_SESSION['file_name'] ?? '' ?> turinys</b></div>

        <div class="content">
        <?php

        $fileInfo = $myRead->readTheFile($_SESSION['file_name']);

        echo '<pre>';
        print_r($fileInfo);
        echo '</pre>';

        unset($_SESSION['file_name']);
        ?>
        </div>

        <a href="http://localhost/exercise/index.php">Į pradžią</a>
    </div>

</body>
</html>
