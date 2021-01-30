<?php
session_start();
require_once '../database/conexao.php';

$sql = "SELECT id, nome FROM cantores";
$query = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Álbum</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
<?php include 'header.php' ?>

<section class="hero is-success is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-black">Cadastro de Álbum</h3>
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
                    <form action="../services/cadastrar_album.php" method="POST">
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
                            <label class="label">Nome do Álbum</label>
                            <div class="control">
                                <input name="nome_do_album" type="text" class="input is-normal"
                                       placeholder="Informe o nome do álbum">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Data de Lançamento</label>
                            <div class="control">
                                <input type="date" id="data_lancamento" name="data_lancamento">
                            </div>
                        </div>
                        <button type="submit" class="button is-block is-link is-normal is-fullwidth">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
