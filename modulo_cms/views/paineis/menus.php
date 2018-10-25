<h1>Menus</h1>

<a href="<?php echo BASE_URL; ?>painel/menus_adicionar" class="btn btn-success">Adicionar</a><br/><br/>

<table class="table table-bordered table-striped">
    <tr>
        <th width="50">ID</th>
        <th>Nome</th>
        <th>URL</th>
        <th>Ações</th>
    </tr>
    <?php foreach($menus as $menu): ?>
    <tr>
        <td><?php echo $menu['id']; ?></td>
        <td><?php echo utf8_encode($menu['nome']); ?></td>
        <td><?php echo utf8_encode($menu['url']); ?></td>
        <td>
            <a href="<?php echo BASE_URL; ?>painel/menus_editar/<?php echo $menu['id']; ?>" class="btn btn-primary">Editar</a>
            <a href="<?php echo BASE_URL; ?>painel/menus_excluir/<?php echo $menu['id']; ?>" class="btn btn-danger">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>