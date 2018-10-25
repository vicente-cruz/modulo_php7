<div class="home_banner" style="background-image:url('<?php echo BASE_URL."assets/images/".$this->config['home_banner']; ?>')"></div>
<div class="home_banner_txt"><?php echo $this->config['home_welcome']; ?></div>

<div class="home_depo">
    <h3>Depoimentos</h3>
    <?php foreach($depoimentos as $depoitem): ?>
    <strong><?php echo utf8_encode($depoitem['nome']); ?></strong><br/>
    <?php echo utf8_encode($depoitem['texto']); ?>
    <hr/>
    <?php endforeach; ?>
</div>

<div class="home_cta">
    Deseja conferir nossos serviços?<br/>
    <a href="<?php BASE_URL."servicos"; ?>">
        <div>Conferir nossos serviços</div>
    </a>
</div>