<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="
                width=device-width,
                user-scalable=no,
                initial-scale=1.0,
                shrink-to-fit=no" />
        <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card-aula1e2"
                                arias-control="card-aula1e2">
                            Aulas 1 e 2: Declaração de tipos
                            (function soma(int $a, int$b):int {return $a + $b;})
                        </button>
                    </div>
                    <div id="card-aula1e2" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div>
                                <p>Introdução com somas!</p>
                                <?php
                                class Numero
                                {
                                    private $num;

                                    public function __construct($num = 0)
                                    {
                                        $this->num = $num;
                                    }

                                    public function getNum()
                                    {
                                        return $this->num;
                                    }
                                }

                                function somar(int $a, int $b):int
                                {
                                    return $a + $b;
                                }

                                function somarDepInj(Numero $n, int $b):int
                                {
                                    return $n->getNum() + $b;
                                }

                                echo "Soma: ".somar(1, 2)."<br/>";

                                $n = new Numero(20);

                                echo "Soma com DependencyInjection: ".somarDepInj($n, 40)
                                        ."<br/>";
                                ?>
                                <pre>
    function somar(int $a, int $b):int
    {
        return $a + $b;
    }
                                </pre>
                            </div><br/><br/>
                            <div>
                            Aprofundando tipos com Dependency Injection.
                            Conexão com Banco de Dados
                            <pre>
    class ClasseQualquer
    {
        private $pdo;

        // Garante que somente objetos PDO serão passados
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }
    }
                            </pre>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card-aula3"
                                arias-control="card-aula3">
                            Aula 3: Classe anônima
                            ($var = new class {public function getNome(){return "Nome";}}; echo $var->getNome(); )
                        </button>
                    </div>
                    <div id="card-aula3"
                         class="collapse"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                Instancia a classe em apenas um único objeto
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Pré-PHP7 <br/>
                                    <?php
                                    class Carro
                                    {
                                        public function getName()
                                        {
                                            return "Carro 1.0";
                                        }
                                    }
                                    $carro = new Carro();
                                    echo $carro->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    class Carro
    {
        public function getName()
        {
            return "Carro 1.0";
        }
    }
    $carro = new Carro();
    echo $carro->getName();
                                    </pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    A partir do PHP7<br/>
                                    <?php
                                    $carro = new class {
                                        public function getName()
                                        {
                                            return "Carro 2.0";
                                        }
                                    };
                                    echo $carro->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    $carro = new class {
        public function getName()
        {
            return "Carro 2.0";
        }
    };
    echo $carro->getName();
                                    </pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Ex: função que cria classe! Uma Factory!<br/>
                                    <?php
                                    function criar_carro() {
                                        return new class {
                                            public function getName()
                                            {
                                                return "Carro 3.0";
                                            }
                                        };
                                    }
                                    $carro = criar_carro();
                                    echo $carro->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    function criar_carro() {
        return new class {
            public function getName()
            {
                return "Carro 3.0";
            }
        };
    }
    $carro = criar_carro();
    echo $carro->getName();
                                    </pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Ex: Factory com Dependency Injection PHP-5!<br/>
                                    <?php
                                    class AutomovelDependency
                                    {
                                        private $carro;
                                        
                                        public function setCarro($carro)
                                        {
                                            $this->carro = $carro;
                                        }
                                        
                                        public function getName()
                                        {
                                            return $this->carro->getName();
                                        }
                                    }
                                    
                                    class Carro2
                                    {
                                        public function getName()
                                        {
                                            return "Carro 4.0";
                                        }
                                    }
                                    $meuCarro = new Carro2();
                                    $meuAutomovel = new AutomovelDependency();
                                    $meuAutomovel->setCarro($meuCarro);
                                    echo $meuAutomovel->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    class AutomovelDependency
    {
        private $carro;

        public function setCarro($carro)
        {
            $this->carro = $carro;
        }

        public function getName()
        {
            return $this->carro->getName();
        }
    }

    class Carro2
    {
        public function getName()
        {
            return "Carro 4.0";
        }
    }
    $meuCarro = new Carro2();
    $meuAutomovel = new AutomovelDependency();
    $meuAutomovel->setCarro($meuCarro);
    echo $meuAutomovel->getName();
                                    </pre>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-4">
                                    Ex: Factory com Dependency Injection PHP-7!<br/>
                                    <?php
                                    $meuAutomovel = new AutomovelDependency();
                                    $meuAutomovel->setCarro(
                                        new class {
                                            public function getName()
                                            {
                                                return "Carro 5.0";
                                            }
                                        }
                                    );
                                    echo $meuAutomovel->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    $meuAutomovel = new AutomovelDependency();
    $meuAutomovel->setCarro(
        new class {
            public function getName()
            {
                return "Carro 5.0";
            }
        }
    );
    echo $meuAutomovel->getName();
                                    </pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Ex: Factory com Dependency Injection PHP-7!<br/>
                                    Somente classes anonimas!!<br/>
                                    <?php
                                    $meuAutomovel2 = new class {
                                        private $carro;
                                        public function setCarro($carro)
                                        {
                                            $this->carro = $carro;
                                        }
                                        public function getName()
                                        {
                                            return $this->carro->getName();
                                        }
                                    };
                                    $meuAutomovel2->setCarro(new class {
                                        public function getName()
                                        {
                                            return "Carro 6.0";
                                        }
                                    });
                                    echo $meuAutomovel2->getName();
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
    $meuAutomovel2 = new class {
        private $carro;
        public function setCarro($carro)
        {
            $this->carro = $carro;
        }
        public function getName()
        {
            return $this->carro->getName();
        }
    };
    $meuAutomovel2->setCarro(new class {
        public function getName()
        {
            return "Carro 6.0";
        }
    });
    echo $meuAutomovel2->getName();
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card-aula4"
                                aria-controls="card-aula4">
                            Aula 4: Operador NULL ( $nome = $meuArray['nome'] ?? ''; )
                        </button>
                    </div>
                    <div id="card-aula4"
                         class="collapse"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    Pré-PHP7<br/>
                                    <pre>
    $pessoa = array(
        'nome'=>'Vicente'
        ,'idade'=>36);
    if (isset($pessoa['idade'])) {
        $idade = $pessoa['idade'];
    }
    else {
        $idade = '';
    }

<hr/>
    $idade = (isset($pessoa['idade']) ? $pessoa['idade'] : '');
    echo "IDADE: ".$idade;
                                    </pre>
                                </div>
                                <div class="col-4">
                                    <?php
                                        $pessoa = array(
                                            'nome'=>'Vicente'
                                            ,'idade'=>36);
                                        if (isset($pessoa['idade'])) {
                                            $idade = $pessoa['idade'];
                                        }
                                        else {
                                            $idade = '';
                                        }
                                        $idade = (isset($pessoa['idade']) ? $pessoa['idade'] : '');
                                        echo "IDADE: ".$idade;
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    PHP-7<br/>
                                    <pre>
    $idade = $pessoa['idade'] ?? '';
                                    </pre>
                                </div>
                                <div class="col-4">
                                    <?php
                                    $idade = $pessoa['idade'] ?? '';
                                    
                                    echo "IDADE: ".$idade;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card-aula5"
                                aria-controls="card-aula5">
                            Aula 5: Operador Spaceship ($r = $a <=> $b)</button>
                    </div>
                    <div id="card-aula5"
                         class="collapse"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?php
                                    $a = 10; $b= 20;
                                    $r = $a <=> $b;
                                    echo $r;
                                    ?>
                                </div>
                                <div class="col-8">
                                    <pre>
                                    Para comparação:

                                    $a = 10; $b= 20;
                                    $r = $a <=> $b;
                                    echo $r;
                                    
                                    $a  < $b ? $r = -1
                                    $a  > $b ? $r = 1
                                    $a == $b ? $r = 0
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link"
                                data-toggle="collapse"
                                data-target="#card-aula6"
                                aria-controls="card-aula6">
                            Aula 6: Throwable Errors (catch(Throwable $e) {$e->getMessage()}</button>
                    </div>
                    <div id="card-aula6"
                         class="collapse"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                <?php
                                    try {
                                        asdljfasdc();
                                    } catch(Throwable $e) {
                                        $msg = $e->getMessage()."\n";
                                        $msg .= $e->getFile()."\n";
                                        $msg .= "Linha:".$e->getLine()."\n";
                                        file_put_contents('aula6-throwable_errors.txt',$msg);
                                        
                                    }
                                ?>
                                </div>
                                <div class="col-7">
                                    <pre>
    try {
        asdljfasdc();
    } catch(Throwable $e) {
        echo $e->getMessage();
        echo 
    }
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="bootstrap4/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    </body>
</html>