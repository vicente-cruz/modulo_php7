<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->config['site_titulo']; ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>../bootstrap4/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/default.css" />
    </head>
    <body>
        <div class="topo"></div>
        <div class="menu"><?php $this->loadMenu(); ?></div>
        <div class="nucleo">
            <?php $this->loadViewInTemplate($viewName,$viewData); ?>
        </div>
        <div class="rodape"></div>
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