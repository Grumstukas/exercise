<?php
session_start();
include $_SESSION['DIR'].'/uploader.php';
use controller\Write;
use controller\Read;
use controller\Display;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style/main.css">

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

    <title>Užduotis</title>
</head>
<body>

<?php

if(!empty($_GET)){

    if(isset($_GET['file_type']) && isset($_GET['array'])){

        $_SESSION['file_type'] = $_GET['file_type'];
        $_SESSION['array'] = $_GET['array'];

        header('Location: http://localhost/exercise/views/give/give_response.php');
        die();
    }
}

?>

<div class="section section_write">
    <div class="name">3 variantas - duomenų atidavimas:</div>
    <form action="" method="GET">
        <div>Duomenų atvaizdavimo būdai</div>
        <div class="radio">
            <input type="radio" name="file_type" id="xml" value="xml" checked>
            <label for="xml">xml</label>

            <input type="radio" name="file_type" id="json" value="json">
            <label for="json">json</label>

            <input type="radio" name="file_type" id="csv" value="csv">
            <label for="csv">csv</label>
        </div>

        <div class="file_array">
            <textarea name="array" id="array" cols="30" rows="15" required></textarea>
            <label for="array">asociatyvinis masyvas</label>
        </div>

        <button type="submit">Pasirinkti</button>
    </form>

    <div class="pvz">
        <div>Payzdys</div>
        <pre>
            [
                'first_name' => 'Kiestis',
                'age' => 29,
                'gender' => 'male'
            ],
            [
                'first_name' => 'Vytska',
                'age' => 32,
                'gender' => 'male'
            ],
            [
                'first_name' => 'Karina',
                'age' => 25,
                'gender' => 'female'
            ]
            </pre>
    </div>

    <a href="http://localhost/exercise/index.php">Į pradžią</a>
</div>

</body>
</html>
