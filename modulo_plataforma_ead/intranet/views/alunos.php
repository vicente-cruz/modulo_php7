<h1>Alunos</h1>

<a href="<?php echo BASE_URL; ?>alunos/adicionar"
   class="btn btn-success">Adicionar aluno</a><br/><br/>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th width="150">Qt. de cursos</th>
            <th width="255">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($alunos as $aluno): ?>
        <tr>
            <td><?php echo $aluno['nome']; ?></td>
            <td class="text-center"><?php echo $aluno['qt_cursos']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>alunos/editar/<?php echo $aluno['id']; ?>"
                   class="btn btn-primary">Editar aluno</a>
                <a href="<?php echo BASE_URL; ?>alunos/excluir/<?php echo $aluno['id']; ?>"
                   class="btn btn-danger">Excluir aluno</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>