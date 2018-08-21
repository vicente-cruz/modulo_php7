<h1>Seus cursos</h1>
<ul class="list-unstyled" >
<?php foreach($cursos as $curso): ?>
    <a href="<?php echo BASE_URL; ?>cursos/entrar/<?php echo $curso['id_curso']; ?>" style="text-decoration:none;" class="curso-link text-dark">
        <li class="media my-2 p-1">
            <img src="<?php echo BASE_URL; ?>assets/images/cursos/<?php echo $curso['imagem']?>"
                 class="mx-2 avatar align-self-center" />
            <div class="media-body">
                <h5><?php echo $curso['nome']; ?></h5>
                <p><?php echo $curso['descricao']; ?></p>
            </div>
        </li>
    </a>
<?php endforeach; ?>
</ul>