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
                <ul class="navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle dropdown-toggle-split nav-item nav-link"
                           data-toggle="dropdown"
                           href="#"><?php echo $_SESSION['usuario_nome']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>perfil">Editar perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>login/sair">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <br/>
        <div class="container">
            <?php echo $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>