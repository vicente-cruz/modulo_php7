<h1>Editar aula(questionário)</h1>
<form method="POST">
    <div class="form-group">
        <label for="nome">Nome do Questionario:</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $aula['nome']; ?>" />
    </div>
    
    <div class="form-group">
        <label for="pergunta">Pergunta:</label>
        <input type="text" name="pergunta"
               class="form-control" value="<?php echo $aula['pergunta']; ?>" />
    </div>
    
    <div class="form-group">
        <label for="op1">Opção 1:</label>
        <input type="text" name="op1"
               class="form-control" value="<?php echo $aula['opcao1']; ?>"/>
    </div>

    <div class="form-group">
        <label for="op2">Opção 2:</label>
        <input type="text" name="op2"
               class="form-control" value="<?php echo $aula['opcao2']; ?>"/>
    </div>

    <div class="form-group">
        <label for="op3">Opção 3:</label>
        <input type="text" name="op3"
               class="form-control" value="<?php echo $aula['opcao3']; ?>"/>
    </div>
    
    <div class="form-group">
        <label for="op4">Opção 4:</label>
        <input type="text" name="op4"
               class="form-control" value="<?php echo $aula['opcao4']; ?>"/>
    </div>

    <div class="form-group">
        <label for="resposta">Resposta:</label>
        <select name="resposta" class="form-control">
            <option value="1" <?php echo ($aula['resposta'] == 1 ? "selected='selected'" : ""); ?>>Opção 1</option>
            <option value="2" <?php echo ($aula['resposta'] == 2 ? "selected='selected'" : ""); ?>>Opção 2</option>
            <option value="3" <?php echo ($aula['resposta'] == 3 ? "selected='selected'" : ""); ?>>Opção 3</option>
            <option value="4" <?php echo ($aula['resposta'] == 4 ? "selected='selected'" : ""); ?>>Opção 4</option>
        </select>
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-primary" />
</form>