<h1>Páginas</h1>

<a href="<?php echo BASE_URL; ?>painel/paginas_adicionar" class="btn btn-success">Adicionar</a><br/><br/>

<table class="table table-bordered table-striped">
    <tr>
        <th width="50">ID</th>
        <th>Título</th>
        <th>URL</th>
        <th>Ações</th>
    </tr>
    <?php foreach($paginas as $pagina): ?>
    <tr>
        <td><?php echo $pagina['id']; ?></td>
        <td><?php echo utf8_encode($pagina['titulo']); ?></td>
        <td><?php echo utf8_encode($pagina['url']); ?></td>
        <td>
            <a href="<?php echo BASE_URL; ?>painel/paginas_editar/<?php echo $pagina['id']; ?>" class="btn btn-primary">Editar</a>
            <a href="<?php echo BASE_URL; ?>painel/paginas_excluir/<?php echo $pagina['id']; ?>" class="btn btn-danger">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>