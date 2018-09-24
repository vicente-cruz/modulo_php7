<h1>Editar curso</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nome">Nome do curso:</label>
        <input type="text" name="nome" required
               value="<?php echo $curso['nome']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required
               value="<?php echo $curso['descricao']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" class="form-control" />
        <img src="<?php echo BASE_URL; ?>assets/images/cursos/<?php echo $curso['imagem']; ?>" width="80" />
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-default"/>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Voltar</a>
</form>

<hr/>

<h2>Aulas</h2>

<fieldset>
    <legend>Adicionar módulo</legend>
    <form method="POST">
        <div class="form-group">
            <label for="nome_modulo">Nome do módulo:</label>
            <input type="text" name="nome_modulo" class="form-control" />
        </div>
        
        <input type="submit" value="Adicionar módulo" class="btn btn-default" /><br/><br/>
    </form>
</fieldset><br/>

<fieldset>
    <legend>Adicionar aula</legend>
    <form method="POST">
        <div class="form-group">
            <label for="nome_aula">Nome da aula:</label>
            <input type="text" name="nome_aula" class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="modulo_aula">Módulo da aula:</label>
            <select name="modulo_aula" class="form-control" required>
                <option value=""></option>
                <?php foreach($modulos as $modulo): ?>
                <option value="<?php echo $modulo['id']; ?>">
                    <?php echo utf8_encode($modulo['nome']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        Tipo da aula:<br/>
        <div class="form-check">
            <input type="radio"
                   name="tipo_aula" checked="checked"
                   id="tipo_aula1" value="video" class="form-check-input"/>
            <label for="tipo_aula1" class="form-check-label">Vídeo</label>
        </div>
        <div class="form-check">
            <input type="radio"
                   name="tipo_aula"
                   id="tipo_aula2" value="poll" class="form-check-input"/>
            <label for="tipo_aula2" class="form-check-label">Questionário</label>
        </div><br/>
        
        <input type="submit" value="Adicionar aula" class="btn btn-default" /><br/><br/>
    </form>    
</fieldset><br/>

<?php foreach($modulos as $modulo): ?>
<h4><?php echo utf8_encode($modulo['nome']); ?>
    - <a href="<?php echo BASE_URL; ?>cursos/editarModulo/<?php echo $modulo['id']; ?>" class="badge badge-pill badge-primary">editar</a>
    - <a href="<?php echo BASE_URL; ?>cursos/excluirModulo/<?php echo $modulo['id']; ?>" class="badge badge-pill badge-danger">excluir</a></h4>

    <?php foreach ($modulo['aulas'] as $aula): ?>
        <?php foreach ($aula['aula_conteudos'] as $conteudo): ?>
<h5><?php echo $conteudo['nome']; ?>
    - <a href="<?php echo BASE_URL; ?>aulas/editar/<?php echo $aula['id']; ?>/<?php echo $conteudo['id']; ?>"
         class="badge badge-pill badge-primary">editar</a>
    - <a href="<?php echo BASE_URL; ?>aulas/excluir/<?php echo $aula['id']; ?>/<?php echo $conteudo['id']; ?>"
         class="badge badge-pill badge-danger">excluir</a></h5>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endforeach; ?>