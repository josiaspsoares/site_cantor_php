<?php
session_start();
require_once '../database/conexao.php';

$sql = "SELECT id, nome FROM cantores";
$query = mysqli_query($conexao, $sql);
?>

<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agendamento de Show</title>
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

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Agendamento de Show</h3>

                    <?php
                    $mensagem_de_erro = isset($_SESSION['mensagem-de-erro']) ? $mensagem_de_erro = $_SESSION['mensagem-de-erro'] : $mensagem_de_erro = '';
                    if (!empty($mensagem_de_erro)) {
                        ?>
                        <div class="notification is-warning">
                            <p><?php echo $mensagem_de_erro ?></p>
                        </div>
                        <?php
                        unset($_SESSION['mensagem-de-erro']);
                    }
                    ?>

                    <?php
                    $mensagem_de_sucesso = isset($_SESSION['mensagem-de-sucesso']) ? $mensagem_de_sucesso = $_SESSION['mensagem-de-sucesso'] : $mensagem_de_sucesso = '';
                    if (!empty($mensagem_de_sucesso)) {
                        ?>
                        <div class="notification is-success">
                            <p><?php echo $mensagem_de_sucesso ?></p>
                        </div>
                        <?php
                        unset($_SESSION['mensagem-de-sucesso']);
                    }
                    ?>

                    <div class="box">
                        <form action="../services/agendar_show.php" method="POST">

                            <div class="field">
                                <label class="label">Cantor</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="id_cantor" id="id_cantor">
                                            <?php while ($cantor = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $cantor['id'] ?>"><?php echo $cantor['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Data</label>
                                <div class="control">
                                    <input type="date" id="data_show" name="data_show" min= <?php echo $today ?>>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Hora</label>
                                <div class="control">
                                    <input type="time" id="hora_show" name="hora_show">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Cidade</label>
                                <div class="control">
                                    <input name="cidade" type="text" class="input is-normal" placeholder="Caratinga-MG">
                                </div>
                            </div>

                            <button type="submit" class="button is-block is-link is-normal is-fullwidth">Agendar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
