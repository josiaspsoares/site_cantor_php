<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site do Cantor</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar is-link" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
            </a>
        </div>
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
                    Home
                </a>

                <a class="navbar-item" href="pages/agenda.php">
                    Agenda
                </a>

                <a class="navbar-item" href="pages/discografia.php">
                    Discografia
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Mais
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="pages/cadastro_de_album.php">
                            Cadastro de Álbum
                        </a>
                        <a class="navbar-item" href="pages/cadastro_de_musica.php">
                            Cadastro de Música
                        </a>
                        <a class="navbar-item" href="pages/agendamento_de_show.php">
                            Agendamento de Show
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="pages/galeria.php">
                            Galeria
                        </a>
                    </div>
                </div>
            </div>
    </nav>

    <figure class="image is-4by3">
        <img src="assets/img/capa.jpg" alt="Capa">
    </figure>

</body>
