<h1>Editar Página</h1>
<form method="POST">
    <div class="form-group">
        <label for="url">URL:</label>
        <input type="text" name="url"
               value="<?php echo $pagina['url']; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo"
               value="<?php echo utf8_encode($pagina['titulo']); ?>"
               class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="corpo">Corpo:</label>
        <textarea id="corpo" name="corpo" class="form-control"><?php echo $pagina['corpo']; ?></textarea>
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-default" />
    <a href="<?php echo BASE_URL; ?>painel" class="btn btn-warning">Voltar</a>
</form>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
window.onload = function() {
    ClassicEditor
            .create(document.querySelector('#corpo'))
            .then(editor => {console.log(editor); })
            .catch(error => {console.error(error); });
};
</script>