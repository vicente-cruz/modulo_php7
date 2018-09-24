<h1>Editar aluno</h1>

<form method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required
               value="<?php echo $aluno['nome']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required
               value="<?php echo $aluno['email']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="cursos">Cursos:</label>
        <select name="cursos[]" class="form-control" multiple required>
            <?php foreach($cursos as $curso): ?>
            <option value="<?php echo $curso['id']; ?>"
            <?php if (in_array($curso['id'],$inscrito)):?>
            selected="selected"
            <?php endif; ?>>
                <?php echo $curso['nome']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-default"/>
    <a href="<?php echo BASE_URL; ?>alunos" class="btn btn-primary">Voltar</a>
</form>