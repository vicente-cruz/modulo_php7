<h1>Busca</h1>
<?php foreach($sugestoesUsuarios as $pessoa): ?>
<div class="row sugestaoitem justify-content-start">
    <div class="col-sm-2"><strong><?php echo $pessoa['nome']; ?></strong></div>
    <div class="col-sm-2">
        <button class="btn btn-default"
                onclick="adicionarAmigo(<?php echo $pessoa['id']; ?>,this)">+</button>
    </div>
</div>
<?php endforeach; ?>