<?php
session_start();
include $_SESSION['DIR'].'/uploader.php';
use controller\Write;
use controller\Read;


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

    <title>Rašymas į failą</title>
</head>
<body>

<?php

if(!empty($_POST)){

    if(isset($_POST['file_name']) && isset($_POST['file_type']) && isset($_POST['array'])){

        $file_name = $_SESSION['DIR'].'/files/'.$_POST['file_name'].'.'.$_POST['file_type'];
        $_SESSION['file_name'] = $_POST['file_name'];
        $_SESSION['file_type'] = $_POST['file_type'];

        $myWrite = new Write;
        $myWrite->writeToFile($file_name, $_POST['file_type'],$_POST['array']);

        if (file_exists($file_name)) {
            header('Location: http://localhost/exercise/views/write/write_file.php');
            die();

        } else {
            header('Location: http://localhost/exercise/error/file_exist.php');
            die();
        }
    }
}

?>

    <div class="section section_write">
        <div class="name">2 variantas - rašymas į failą:</div>
        <form action="" method="POST">

            <div class="file_name">
                <input type="text" name="file_name" id="file_name" required>
                <label for="file_name">Failo vardas</label>
            </div>

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
                <label for="array">asociatyvinio masyvas</label>
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
