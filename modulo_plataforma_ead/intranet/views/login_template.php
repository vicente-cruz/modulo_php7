<!DOCTYPE html>
<html>
    <head>
        <title>Plataforma EAD</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content=
              " width=device-width
              , initial-scale=1.0
              , user-scalable=no
              , shrink-to-fit=no" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>../../bootstrap4/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">
                Plataforma EAD - INTRANET
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarLoginMenu"
                    aria-controls="navbarLoginMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbarLoginMenu" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo BASE_URL; ?>login/entrar">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <?php echo $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../../bootstrap4/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../../bootstrap4/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/scripts.js"></script>
    </body>
</html>