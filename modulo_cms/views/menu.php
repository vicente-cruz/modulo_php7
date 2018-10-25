<ul>
    <?php foreach($menu as $menu_item): ?>
    <a href="<?php echo BASE_URL.$menu_item['url']; ?>"><li><?php echo utf8_encode($menu_item['nome']); ?></li></a>
    <?php endforeach; ?>
</ul>