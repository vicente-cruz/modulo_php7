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
        <button class="btn btn-default" onclick="curtir(this)" data-id="<?php echo $id; ?>" data-likes="<?php echo $likes; ?>" data-liked="<?php echo $liked; ?>">(<?php echo $likes?>) <?php echo ($liked == '0') ? "Curtir" : "Descurtir" ?></button>
        <button class="btn btn-default" onclick="mostrarCampoComentario(this)">Comentar</button>
        <div class="postitem_comentario">
            <br/>
            <input type="text" class="postitem_txt form-control" /><br/>
            <button class="btn btn-default" data-id="<?php echo $id; ?>" onclick="comentar(this)">Enviar</button>
        </div>
    </div>
    <div class="postitem_comentarios">
        <?php if (count($comentarios) > 0): ?>
            <strong>Comentários</strong><br/>
            <?php foreach($comentarios as $comentario):?>

                <strong><?php echo $comentario['nome_comentario']; ?> </strong>
                (<?php echo date("d/m/Y - H:i", strtotime($comentario['data_criacao'])); ?>):
                <?php echo $comentario['texto']; ?><br/>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>