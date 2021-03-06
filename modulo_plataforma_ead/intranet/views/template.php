<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport"
              content=
              " width=device-width
              , user-scalable=no
              , initial-scale=1.0
              , shrink-to-fit=no"
        />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>../../bootstrap4/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Plataforma EAD - INTRANET</a>
            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarMenu"
                    aria-controls="navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbarMenu" class="navbar-collapse collapse justify-content-end">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="navbar-text nav-link"
                           href="<?php echo BASE_URL; ?>cursos">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-text nav-link"
                           href="<?php echo BASE_URL; ?>alunos">Alunos</a>
                    </li>
                </ul>
                <div class="nav-item">
                    <a class="navbar-text nav-link"
                       href="<?php echo BASE_URL; ?>login/logout">Sair</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <?php echo $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../../bootstrap4/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../../bootstrap4/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>