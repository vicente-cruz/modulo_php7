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
        <h1>Questionário</h1>
        <?php if($_SESSION['poll'.$aula_info['id_aula']] > 2): ?>
            <div class="alert alert-danger">Você atingiu o limite de tentativas!</div>
        <?php else: ?>
            <div class="alert alert-info">
                Tentativas: <?php echo $_SESSION['poll'.$aula_info['id_aula']]; ?> de 2
            </div>
            <h3><?php echo $aula_info['pergunta']; ?></h3>

            <form method="POST">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio"
                               name="opcao" value="1" class="form-check-input" />
                        <?php echo $aula_info['opcao1']; ?>
                    </label>
                </div><br/>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio"
                               name="opcao" value="2" class="form-check-input" />
                        <?php echo $aula_info['opcao2']; ?>
                    </label>
                </div><br/>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio"
                               name="opcao" value="3" class="form-check-input" />
                        <?php echo $aula_info['opcao3']; ?>
                    </label>
                </div><br/>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio"
                               name="opcao" value="4" class="form-check-input" />
                        <?php echo $aula_info['opcao4']; ?>
                    </label>
                </div><br/>

                <input type="submit" class="btn btn-default" value="Enviar resposta" />
            </form>
            <br/>
            <?php if(isset($resposta)): ?>
                <?php if($resposta === true): ?>
                    <div class="alert alert-success text-center">
                        <?php echo "Resposta CORRETA!"?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger text-center">
                        <?php echo "Resposta ERRADA!"?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>