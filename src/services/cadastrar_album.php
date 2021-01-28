<?php

session_start();
require_once '../database/conexao.php';

$id_cantor = $_POST['id_cantor'];
$nome_do_album = $_POST['nome_do_album'];
$data_lancamento = $_POST['data_lancamento'];

unset($_SESSION['mensagem-de-sucesso']);
unset($_SESSION['mensagem-de-erro']);

if ($nome_do_album == "" || $nome_do_album == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Nome do Álbum não foi preenchido!";
} else if ($data_lancamento == "" || $data_lancamento == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Data de Lançamento não foi preenchido!";
} else {
    $sql = "INSERT INTO  albuns(id, id_cantor, nome, data_lancamento) VALUES (null, '$id_cantor', '$nome_do_album', '$data_lancamento')";
    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        $_SESSION['mensagem-de-erro'] = "Não foi possível completar o cadastro. Falha ao submeter ao banco de dados";
    } else {
        $_SESSION['mensagem-de-sucesso'] = "Cadastro realizado com sucesso";
    }

}

header('Location: ../pages/cadastro_de_album.php');