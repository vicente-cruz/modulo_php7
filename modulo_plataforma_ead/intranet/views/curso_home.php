<h1>Cursos</h1>

<a href="<?php echo BASE_URL; ?>cursos/adicionar"
   class="btn btn-success">Adicionar curso</a><br/><br/>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="150">Imagem</th>
            <th>Nome</th>
            <th width="80">Qt. de Alunos</th>
            <th width="255">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($cursos as $curso): ?>
        <tr>
            <td><img src="<?php echo BASE_URL; ?>assets/images/cursos/<?php echo $curso['imagem']?>" class="avatar"></td>
            <td><?php echo $curso['nome']; ?></td>
            <td class="text-center"><?php echo $curso['qt_alunos']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>cursos/editar/<?php echo $curso['id']; ?>"
                   class="btn btn-primary">Editar curso</a>
                <a href="<?php echo BASE_URL; ?>cursos/excluir/<?php echo $curso['id']; ?>"
                   class="btn btn-danger">Excluir curso</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>