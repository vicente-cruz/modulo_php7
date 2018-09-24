<h1>Adicionar Aluno</h1>

<form method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="descricao">E-mail:</label>
        <input type="text" name="email" required class="form-control" />
    </div>

    <div class="form-group">
        <label for="descricao">Senha:</label>
        <input type="password" name="senha" required class="form-control" />
    </div>
    
    <input type="submit" value="Adicionar aluno" class="btn btn-default" />
    
    <a href="<?php echo BASE_URL; ?>alunos" class="btn btn-primary">Voltar</a>
</form>