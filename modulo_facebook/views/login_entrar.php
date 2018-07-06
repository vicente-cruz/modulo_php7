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
            <h1>Login</h1>
            
            <?php if ( ! empty($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" />
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="password" name="senha" class="form-control" />
                </div>
                
                <input type="submit" class="btn btn-default" value="Entrar" />
            </form>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>