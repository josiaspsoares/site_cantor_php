<?php
session_start();
require_once '../database/conexao.php';

$sql = "SELECT id, data_show, hora_show, cidade FROM shows ORDER BY data_show";
$query = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda de Shows</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
<?php include 'header.php' ?>

<div class="hero-body">
    <div class="box">
        <h3 class="title has-text-grey-dark has-text-centered">Agenda de Shows</h3>

        <?php while ($show = mysqli_fetch_array($query)) { ?>
            <div class="container">
                <div class="notification is-link">
                    <div class="level">
                        <p class="title"> <?php echo $show['data_show'] ?></p>
                        <p class="subtitle"><?php echo $show['cidade'] ?></p>
                        <?php echo $show['hora_show'] ?>
                    </div>
                </div>
            </div><br>
        <?php } ?>

    </div>
</div>
</body>
