<div class="row">
<?php $count = 0; ?>
<?php foreach($produtos as $produto): ?>
    <div class="col-sm-4">
        <?php $this->loadView('product_item',$produto); ?>
    </div>
    <?php
    $count = $count + 1;
    if ($count % 3 == 0): ?>
</div>
<div class="row">
<?php $count = 0; endif; ?>
<?php endforeach; ?>
</div>

<div class="pagination_area">
    <?php for($q = 1; $q <= $totalPaginas; $q++): ?>
    <div class="pagination_item <?php echo ($q == $paginaAtual ? 'pagina_ativa' : ''); ?>"><a href="<?php echo BASE_URL; ?>?p=<?php echo $q; ?>"><?php echo $q; ?></a></div>
    <?php endfor; ?>
</div>