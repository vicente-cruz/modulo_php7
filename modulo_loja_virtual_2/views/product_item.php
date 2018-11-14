<div class="product_item">
    <a href="#">
        <div class="product_tags">
            <?php if ($sale): ?>
            <div class="product_tag product_tag_red"><?php $this->lang->get('SALE'); ?></div>
            <?php endif; ?>
            <?php if ($bestseller): ?>
            <div class="product_tag product_tag_green"><?php $this->lang->get('BESTSELLER'); ?></div>
            <?php endif; ?>
            <?php if ($new_product): ?>
            <div class="product_tag product_tag_blue"><?php $this->lang->get('NEW'); ?></div>
            <?php endif; ?>
        </div>
        <div class="product_image">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $images[0]['url']; ?>" width="100%" />
        </div>
        <div class="product_name"><?php echo $name; ?></div>
        <div class="product_brand"><?php echo $marca_nome; ?></div>
        <div class="product_price_from"><?php echo "R$ ".($price_from > 0 ? number_format($price_from,2,',','.') : ""); ?></div>
        <div class="product_price">R$ <?php echo number_format($price,2,',','.'); ?></div>
        <div style="clear:both;"></div>
    </a>
</div>