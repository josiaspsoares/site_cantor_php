<?php

session_start();
require_once '../database/conexao.php';

$id_cantor = $_POST['id_cantor'];
$id_album = $_POST['id_album'];
$nome_da_musica = $_POST['nome_da_musica'];
$arquivo = $_FILES['file'];
$caminho = $_FILES["file"]["tmp_name"];

unset($_SESSION['mensagem-de-sucesso']);
unset($_SESSION['mensagem-de-erro']);

if ($nome_da_musica == "" || $nome_da_musica == null) {
    $_SESSION['mensagem-de-erro'] = "O campo Nome da Música não foi preenchido!";
} else if ($arquivo == "" || $arquivo == null) {
    $_SESSION['mensagem-de-erro'] = "O Arquivo não foi anexado!";
} else {

    $extensoesPermitidas = array("mp3", "wma");
    $nomeArquivo = $_FILES['file']['name'];
    $extensao = substr($nomeArquivo, strrpos($nomeArquivo, '.') + 1);

    if (in_array($extensao, $extensoesPermitidas)) {
        if ($_FILES["file"]["error"] > 0) {
            $_SESSION['mensagem-de-erro'] = "Não foi possível completar o cadastro. Falha ao submeter o arquivo anexado";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
            $caminho = "../upload/" . $_FILES["file"]["name"];
        }
    } else {
        $_SESSION['mensagem-de-erro'] = "Não foi possível completar o cadastro. Arquivo Inválido";
    }

    $sql = "INSERT INTO  musicas(id, id_cantor, id_album, nome, caminho) VALUES (null, '$id_cantor', '$id_album', '$nome_da_musica', '$caminho')";
    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        $_SESSION['mensagem-de-erro'] = "Não foi possível completar o cadastro. Falha ao submeter banco de dados";
    } else {
        $_SESSION['mensagem-de-sucesso'] = "Cadastro realizado com sucesso";
    }

}

header('Location: ../pages/cadastro_de_musica.php');