<div class="postitem">
    <?php if ($tipo == 'foto'): ?>
    <img src="<?php echo BASE_URL?>assets/images/posts/<?php echo $url; ?>" border="0" width="100%" />
    <?php endif; ?>
    <div class="postitem_texto">
        <?php echo $texto; ?>
    </div>
    <div class="postitem_info">
        <strong>Post de:</strong> <?php echo $nome; ?>
    </div>
    <div class="postitem_botoes">
        <button class="btn btn-default">Curtir</button>
        <button class="btn btn-default">Comentar</button>
    </div>
</div>