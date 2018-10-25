<h1>Editar Menu</h1>
<form method="POST">
    <div class="form-group">
        <label for="nome">Nome do menu:</label>
        <input type="text" name="nome"
               value="<?php echo $menu['nome']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="url">URL:</label>
        <input type="text" name="url"
               value="<?php echo $menu['url']; ?>" class="form-control" />
    </div>
    
    <input type="submit" value="Enviar" class="btn btn-default" />
</form>