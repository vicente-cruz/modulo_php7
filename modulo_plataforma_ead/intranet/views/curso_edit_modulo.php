<h1>Editar Módulo</h1>
<form method="POST">
    <div class="form-group">
        <label for="modulo">Nome do módulo:</label>
        <input type="text"
               name="modulo"
               value="<?php echo utf8_encode($modulo['nome']); ?>"
               class="form-control"/>
    </div>
    
    <input type="submit" value="Atualizar" class="btn btn-success" />
</form>