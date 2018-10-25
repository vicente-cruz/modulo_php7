<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport"
              content="width=device-width
              , initial-scale=1.0
              , user-scalable=no" />
        <link rel="stylesheet"
              href="<?php echo BASE_URL; ?>../bootstrap4/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <?php if ( ! empty($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control"/>
                </div>

                <input type="submit" value="Enviar" class="btn btn-default"/>
            </form>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../bootstrap4/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>../bootstrap4/js/bootstrap.bundle.min.js"></script>
    </body>
</html>