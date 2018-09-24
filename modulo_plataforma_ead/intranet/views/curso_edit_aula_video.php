<h1>Editar aula (vídeo)</h1>
<form method="POST">
    <div class="form-group">
        <label for="nome">Nome da aula:</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $aula['nome']; ?>" />
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" class="form-control">
            <?php echo $aula['descricao']; ?>
        </textarea>
    </div>
    
    <div class="form-group">
        <label for="url">URL do vídeo:</label>
        <input type="text" name="url" class="form-control"
               value="<?php echo $aula['url']; ?>" required />
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-primary" />
</form>