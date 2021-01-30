<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeria</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
<?php include 'header.php' ?>

<div class="hero-body">
    <div class="box">
        <h3 class="title has-text-grey-dark has-text-centered">Galeria</h3>

        <?php
        $quantidade_imagens = 5;
        for ($i = 1; $i < $quantidade_imagens; $i++) { ?>
            <div class="modal-card is-centered">
                <figure class="image is-5by3">
                    <img src="../assets/img/imagem<?php echo $i ?>.jpg" alt="Imagem da galeria">
                </figure>
            </div><br>
        <?php } ?>
    </div>
</div>
</body>

