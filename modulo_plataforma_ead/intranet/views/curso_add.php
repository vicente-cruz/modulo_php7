<h1>Adicionar curso</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nome">Nome do curso:</label>
        <input type="text" name="nome" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" required class="form-control" />
    </div>
    
    <input type="submit" value="Adicionar curso" class="btn btn-default" />
    
    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Voltar</a>
</form>