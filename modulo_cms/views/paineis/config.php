<h1>Configurações</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="site_titulo">Titulo do site:</label>
        <input type="text" name="site_titulo"
               value="<?php echo $this->config['site_titulo']; ?>"
               class="form-control" />
    </div>

    <div class="form-group">
        <label for="home_welcome">Mensagem de boas-vindas:</label>
        <input type="text" name="home_welcome"
               value="<?php echo $this->config['home_welcome']; ?>"
               class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="site_template">Template do site:</label>
        <select name="site_template" class="form-control">
            <option></option>
            <option value="default" <?php echo
            ($this->config['site_template'] == "default" ?
                    "selected='selected'" : ""); ?>>
                Padrão
            </option>
            <option value="exemplo" <?php echo
            ($this->config['site_template'] == "exemplo" ?
                    "selected='selected'" : ""); ?>>
                Versão de natal
            </option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="home_banner">Banner do site:</label>
        <input type="file" name="home_banner" class="form-control" />
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-default" />
    <a href="<?php echo BASE_URL; ?>painel" class="btn btn-outline-warning">Voltar</a>
</form>