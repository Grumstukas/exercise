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
    <link rel="stylesheet" href="../../style/main.css">

    <title>Skaitymas iš failo</title>
</head>
<body>

<?php

if(!empty($_POST)){

    if(isset($_POST['file_name'])){
        $file_name = $_SESSION['DIR'].'/files/'.$_POST['file_name'];
        $_SESSION['file_name'] = $file_name;

        if (file_exists($file_name)) {
            header('Location: http://localhost/exercise/views/read/read_file.php');
            die();
        } else {
            header('Location: http://localhost/exercise/error/no_file.php');
            die();
        }
    }
}

?>

    <div class="section section_read">
        <div class="name">1 variantas - skaitymas iš failo:</div>
        <form action="" method="POST">

            <div class="file_name">
                <input type="text" name="file_name" id="file_name">
                <label for="file_name">Failo vardas</label>
            </div>

            <button type="submit">Pasirinkti</button>
        </form>
        <a href="http://localhost/exercise/index.php">Į pradžią</a>
    </div>

</body>
</html>
