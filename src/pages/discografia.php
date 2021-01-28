<?php
session_start();
require_once '../database/conexao.php';

$sql_album = "SELECT id, nome, data_lancamento FROM albuns ORDER BY data_lancamento DESC ";
$query_album = mysqli_query($conexao, $sql_album);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discografia</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar is-link" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
            </a>
        </div>
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="../index.php">
                    Home
                </a>

                <a class="navbar-item" href="agenda.php">
                    Agenda
                </a>

                <a class="navbar-item" href="discografia.php">
                    Discografia
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Mais
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="cadastro_de_album.php">
                            Cadastro de Álbum
                        </a>
                        <a class="navbar-item" href="cadastro_de_musica.php">
                            Cadastro de Música
                        </a>
                        <a class="navbar-item" href="agendamento_de_show.php">
                            Agendamento de Show
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="galeria.php">
                            Galeria
                        </a>
                    </div>
                </div>
            </div>
    </nav>
    <div class="hero-body">
        <div class="box">
            <h3 class="title has-text-grey-dark has-text-centered">Discografia</h3>

            <?php while ($album = mysqli_fetch_array($query_album)) { ?>
                <div class="container">
                    <div class="notification is-link">
                        <h1 class="title is-4 is-centered"> <?php echo $album['nome'] ?></h1>
                        <p class="subtitle">Lançamento: <?php echo $album['data_lancamento'] ?></p>
                        <?php
                        $sql_musica = "SELECT id, id_album, nome, caminho FROM musicas WHERE id_album = {$album['id']}";
                        $query_musica = mysqli_query($conexao, $sql_musica);
                        ?>
                        <?php while ($musica = mysqli_fetch_array($query_musica)) { ?>
                            <div class="level">
                                <p class="subtitle"><?php echo $musica['nome'] ?></p>
                                <audio controls="controls">
                                    <source src="<?php echo $musica['caminho'] ?>" type="audio/mp3"/>
                                </audio>
                            </div>
                        <?php } ?>
                    </div>
                </div><br>
            <?php } ?>

        </div>
    </div>
</body>
