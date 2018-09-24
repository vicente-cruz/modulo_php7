<div class="media">
    <img src="<?php echo BASE_URL; ?>assets/images/cursos/<?php echo $curso->getImagem(); ?>" class="mx-2 avatar align-self-center"/>
    <div class="media-body">
        <h5><?php echo $curso->getNome(); ?></h5>
        <p><?php echo $curso->getDescricao();?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-4 curso-esquerda">
        <ul id="accordion" class="list-group list-group-flush mt-2">
            <?php foreach($modulos as $modulo): ?>
            <li class="card list-group-item p-0 mb-1 rounded border-0">
                <div class="card-header p-0 border-0">
                    <button class="btn btn-secondary btn-block"
                            data-toggle="collapse"
                            data-target="#card-modulo-<?php echo $modulo['id'] ;?>"
                            aria-controls="card-modulo-<?php echo $modulo['id'] ;?>">
                        <?php echo utf8_encode($modulo['nome']); ?>
                    </button>
                </div>
                <div id="card-modulo-<?php echo $modulo['id'] ;?>"
                     class="collapse"
                     data-parent="#accordion">
                    <ul class="list-group card-body p-0">
                        <?php foreach($modulo['aulas'] as $aula): ?>
                        <li class="list-group-item list-group-item-action">
                            <a href="<?php echo BASE_URL;?>cursos/aula/<?php echo $aula['id']; ?>" style="color:#666;text-decoration:none;">
                                <?php echo $aula['nome']; ?>
                                <?php if ($aula['assistido']): ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/cursos/v.jpg" height="20" border="0" />
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-8 curso-direita">
        
    </div>
</div>