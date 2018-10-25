<!DOCTYPE html>
<html>
    <head>
        <title>Painel administrativo</title>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>../bootstrap4/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/painel.css" />
    </head>
    <body>
        <div class="menu">
            <ul>
                <a href="<?php echo BASE_URL; ?>painel">
                    <li>Páginas</li>
                </a>
                <a href="<?php echo BASE_URL; ?>painel/menus">
                    <li>Menus</li>
                </a>
                <a href="<?php echo BASE_URL; ?>painel/config">
                    <li>Configurações</li>
                </a>
                <a href="<?php echo BASE_URL; ?>login/logout">
                    <li>Sair</li>
                </a>
            </ul>
        </div>
        <div class="nucleo">
            <?php $this->loadViewInTemplate($viewName,$viewData); ?>
        </div>
        <!-- <div class="container-fluid"> -->
            <?php // $this->loadViewInTemplate($viewName,$viewData); ?>
        <!-- </div> -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../bootstrap4/js/jquery.min.js">
        </script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../bootstrap4/js/bootstrap.bundle.min.js">
        </script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>