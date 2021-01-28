<?php
session_start();
require_once '../database/conexao.php';

$id_cantor = $_POST['id_cantor'];
$data_show = $_POST['data_show'];
$hora_show = $_POST['hora_show'];
$cidade = $_POST['cidade'];

unset($_SESSION['mensagem-de-sucesso']);
unset($_SESSION['mensagem-de-erro']);

if ($data_show == "" || $data_show == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Data não foi preenchido!";
} else if ($hora_show == "" || $hora_show == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Hora não foi preenchido!";
} else if ($cidade == "" || $cidade == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Cidade não foi preenchido!";
} else {
    $sql = "INSERT INTO  shows(id, id_cantor, data_show, hora_show, cidade, ativo) VALUES (null, '$id_cantor', '$data_show', '$hora_show', '$cidade', true)";
    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        $_SESSION['mensagem-de-erro'] = "Não foi possível completar o agendamento. Falha ao submeter ao banco de dados";
    } else {
        $_SESSION['mensagem-de-sucesso'] = "Agendamento realizado com sucesso";
    }

}

header('Location: ../pages/agendamento_de_show.php');

