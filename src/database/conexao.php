<?php

define('host', '127.0.0.1');
define('usuario', 'teste');
define('senha', '123456');
define('database', 'banco_site_do_cantor');

$conexao = mysqli_connect(host, usuario, senha, database) or die ('Não foi possível conectar');

//$sql = "INSERT INTO  musicas(id, id_cantor, id_album, nome, duracao) VALUES (null, 1, 2, 'Vida e vitória', '00:04:12')";
//mysqli_query($conexao, $sql);