<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Facebook</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content=
              " width=device-width
              , initial-scale=1.0
              , user-scalable=no
              , shrink-to-fit=no" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Facebook Cover</a>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse"
                    data-target="#navbarMenu"
                    aria-controls="navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarMenu" class="navbar-collapse collapse justify-content-end">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?php echo BASE_URL; ?>login/entrar">Login</a>
                    <a class="nav-item nav-link" href="<?php echo BASE_URL; ?>login/cadastrar">Cadastrar</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="jumbotron text-center">
                <h1>Bem vindo ao Facebook</h1>
                <p>Faça seu login ou crie um cadastro.</p>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>