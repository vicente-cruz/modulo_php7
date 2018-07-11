<div class="row">
    <div class="col-sm-8">
        <div class="post_area">
            <form method="POST" enctype="multipart/form-data">
                <h4>O que você está pensando?</h4>
                <textarea name="post" class="form-control"></textarea><br/>
                <input type="file" name="foto" /><br/><br/>
                <input type="submit" value="Enviar" class="btn btn-default" />
            </form><br/>
        </div>
        
        <div class="feed">
            <?php foreach ($feeds as $postItem) {
                $this->loadView('post_item',$postItem);
            } ?>
        </div>
        
    </div>
    <div class="col-sm-4">
        <?php if (count($reqAmizades) > 0): ?>
        <div class="widget">
            <h4>Requisições de amizade</h4>
            <?php foreach($reqAmizades as $req): ?>
            <div class="row requisicaoitem justify-content-between">
                <div class="col-sm-4">
                    <strong><?php echo $req['nome']; ?></strong>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-default" onclick="aceitarAmigo(<?php echo $req['id']?>,this)">+</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if ($totalAmigos > 0): ?>
        <div class="widget">
            <h4>Total de amigos</h4>
            <div class="row">
                <div class="col">
                    <?php echo $totalAmigos; ?> amigo<?php echo ($totalAmigos > 1 ? 's' : '');?>  
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (count($sugestoes) > 0): ?>
        <div class="widget">
            <h4>Sugestões de amigos</h4>
            <?php foreach($sugestoes as $pessoa): ?>
            <div class="row sugestaoitem justify-content-between">
                <div class="col-sm-4">
                    <strong><?php echo $pessoa['nome']; ?></strong>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-default"
                            onclick="adicionarAmigo(<?php echo $pessoa['id']; ?>, this)">+</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <div class="widget">
            <h4>Grupos</h4>
            <form method="POST">
                <div class="input-group">
                    <input type="text" name="grupo" class="form-control"
                           placeholder="Nome do grupo"/>
                    <div class="input-group-append">
                        <input type="submit" value="Criar"
                               class="btn btn-outline-secondary" />
                    </div>
                </div>
            </form>
            <?php foreach($grupos as $grupo): ?>
            <a href="<?php echo BASE_URL; ?>grupos/abrir/<?php echo $grupo['id']; ?>"><?php echo $grupo['titulo']; ?></a><br/>
            <?php endforeach; ?>
        </div>
    </div>
</div>