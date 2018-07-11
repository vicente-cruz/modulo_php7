<h1><?php echo $grupo_info['titulo']; ?> (<?php echo $total_membros; ?> membro<?php echo ($total_membros == 1 ? "" : "s"); ?>)</h1>
<?php if ($verificar_membro): ?>

<div class="post_area">
    <form method="POST" enctype="multipart/form-data">
        <h4>Inserir comentário:</h4>
        <textarea name="post" class="form-control"></textarea><br/>
        <input type="file" name="foto" /><br/><br/>
        <input type="submit" value="Enviar" class="btn btn-default">
    </form><br/>
</div>
<div class="feed">
    <?php foreach ($feeds as $postItem) {
        $this->loadView('post_item',$postItem);
    } ?>
</div>
<?php else: ?>

<h3>Você não é membro deste grupo.</h3>
<a class="btn btn-primary"
   href="<?php echo BASE_URL; ?>grupos/entrar/<?php echo $grupo_info['id']; ?>">
    Entrar no Grupo
</a>
<a href="<?php echo BASE_URL; ?>" class="btn btn-success">Voltar</a>

<?php endif; ?>