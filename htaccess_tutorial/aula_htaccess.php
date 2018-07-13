<!DOCTYPE html>
<html>
    <head>
        <title>Tutorial HTACCESS</title>
        <meta charset="UTF-8" />
        <meta name="viewport"
              content=
                " width=device-width
                , initial-scale=1.0
                , user-scalable=no
                , shrink-to-fit=no" />
        <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card1_options"
                                aria-controls="card1_options">
                            HTACCESS: Options</button>
                    </div>
                    <div id="card1_options"
                         class="collapse show"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Options +Indexes<br/>
                                    IndexOptions FancyIndexing
                                </div>
                                <div class="col-md-6">
                                    Permite navegação da pasta com boa formatação
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    Options -Indexes
                                </div>
                                <div class="col-md-6">
                                    Proibe navegação na pasta.<br/>
                                    Forbidden: Error 403
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    DirectoryIndex aula_htaccess.php
                                </div>
                                <div class="col-md-6">
                                    Troca arquivo principal do diretorio.<br/>
                                    De index.php para aula_htaccess.php
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    IndexIgnore *.txt
                                </div>
                                <div class="col-md-6">
                                    Não mostra arquivos .txt no diretorio.<br/>
                                    <strong>Ainda permite o acesso</strong>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    AddType application/x-httpd-php .vicente
                                </div>
                                <div class="col-md-6">
                                    Interpreta arquivos com extensão .vicente<br/>
                                    como PHP
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <pre>
    &lt;files file1.txt&gt;
        order allow,deny
        deny from all
    &lt;/files&gt;
                                    </pre>
                                </div>
                                <div class="col-md-6">
                                    Não mostra E impede o acesso ao arquivo file1.txt<br/>
                                    <strong>Não deve ter espaço entre a vírgula</strong>:<br/> Gera SERVER INTERNAL ERROR
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <pre>
&lt;FilesMatch "\.(txt|vicente)$"&gt;
        order allow,deny
        deny from all
&lt;/files&gt;
                                    </pre>
                                </div>
                                <div class="col-md-6">
                                    Não mostra E impede acesso a todos os arquivos dentro da RegEx.<br/>
                                    Neste caso, todos os arquivos com extensão .txt e .vicente
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    AddDefaultCharset utf-8
                                </div>
                                <div class="col-md-6">
                                    Define charset padrão do diretorio para UTF-8
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
        <script type="text/javascript" src="../bootstrap4/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php
    
?>