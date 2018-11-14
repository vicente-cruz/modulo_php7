<!DOCTYPE html>
<html>
    <head>
        <title>Loja 2.0</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="
              width=device-width
              , initial-scale=1.0
              , user-scalable=no
              , shrink-to-fit=no" />
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800"
              rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar topnav navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a href="<?php echo BASE_URL; ?>" class="nav-link"><?php $this->lang->get('HOME'); ?></a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>contact" class="nav-link"><?php $this->lang->get('CONTACT'); ?></a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="languageDropdown"
                           class="nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <?php $this->lang->get('LANGUAGE'); ?><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li class="dropdown-item"><a class="nav-link" href="<?php echo BASE_URL; ?>lang/set/en">Inglês</a></li>
                            <li class="dropdown-item"><a class="nav-link" href="<?php echo BASE_URL; ?>lang/set/pt-br">Português</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>login" class="nav-link"><?php $this->lang->get('LOGIN'); ?></a></li>
                </ul>
            </div>
        </nav>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 logo">
                        <a href="<?php echo BASE_URL; ?>">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo.png" />
                        </a>
                    </div>
                    <div class="col-sm-7">
                        <div class="head_help">(11) 9999-9999</div>
                        <div class="head_email">contato@<span>loja2.com.br</span></div>
                        
                        <div class="search_area">
                            <form method="GET">
                                <input type="text" name="s" required
                                       placeholder="<?php $this->lang->get('SEARCHFORANITEM'); ?>" />
                                <select name="category">
                                    <option value=""><?php $this->lang->get('ALLCATEGORIES'); ?></option>
                                </select>
                                <input type="submit" value="" />
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo BASE_URL; ?>cart">
                            <div class="cartarea">
                                <div class="carticon">
                                    <div class="cartqt">9</div>
                                </div>
                                <div class="carttotal">
                                    <?php $this->lang->get('CART'); ?><br/>
                                    <span>R$ 999,99</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="categoryarea">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               id="categoryDropdown" data-toggle="dropdown" href="#">
                                <?php $this->lang->get('SELECTCATEGORY'); ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="nav-link" href="#">Page 1-1</a></li>
                                <li class="dropdown-item"><a class="nav-link" href="#">Page 1-2</a></li>
                                <li class="dropdown-item"><a class="nav-link" href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Categoria X</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <aside>
                            <h1><?php $this->lang->get('FILTER'); ?></h1>
                            <div class="filterarea"></div>
                            <div class="widget">
                                <h1><?php $this->lang->get('FEATUREDPRODUCTS'); ?></h1>
                                <div class="widget_body">
                                    ...
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-sm-9">
                        <?php echo $this->loadViewInTemplate($viewName,$viewData); ?>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="widget">
                            <h1><?php $this->lang->get('FEATUREDPRODUCTS'); ?></h1>
                            <div class="widget_body">
                                ...
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="widget">
                            <h1><?php $this->lang->get('ONSALEPRODUCTS'); ?></h1>
                            <div class="widget_body">
                                ...
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="widget">
                            <h1><?php $this->lang->get('TOPRATEDPRODUCTS'); ?></h1>
                            <div class="widget_body">
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subarea">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                            <form method="POST">
                                <input class="subemail" name="email" placeholder="<?php $this->lang->get('SUBSCRIBETEXT'); ?>" />
                                <input type="submit" value="<?php $this->lang->get('SUBSCRIBEBUTTON'); ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="links">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo BASE_URL; ?>">
                                <img width="150" src="<?php echo BASE_URL; ?>assets/images/logo.png"/>
                            </a><br/><br/>
                            <strong>Slogan da Loja Virtual</strong><br/><br/>
                            Endereço da Loja Virtual
                        </div>
                        <div class="col-sm-8 linkgroups">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3><?php $this->lang->get('CATEGORIES'); ?></h3>
                                    <ul>
                                        <li><a href="#">Categoria X</a></li>
                                        <li><a href="#">Categoria X</a></li>
                                        <li><a href="#">Categoria X</a></li>
                                        <li><a href="#">Categoria X</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h3><?php $this->lang->get('INFORMATION'); ?></h3>
                                    <ul>
                                        <li><a href="#">Menu 1</a></li>
                                        <li><a href="#">Menu 2</a></li>
                                        <li><a href="#">Menu 3</a></li>
                                        <li><a href="#">Menu 4</a></li>
                                        <li><a href="#">Menu 5</a></li>
                                        <li><a href="#">Menu 6</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h3><?php $this->lang->get('INFORMATION'); ?></h3>
                                    <ul>
                                        <li><a href="#">Menu 1</a></li>
                                        <li><a href="#">Menu 2</a></li>
                                        <li><a href="#">Menu 3</a></li>
                                        <li><a href="#">Menu 4</a></li>
                                        <li><a href="#">Menu 5</a></li>
                                        <li><a href="#">Menu 6</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">© <span>Loja 2.0</span> - <?php $this->lang->get('ALLRIGHTSPRESERVED'); ?></div>
                        <div class="col-sm-6">
                            <div class="payments">
                                <img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
                                <img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
                                <img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
                                <img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>