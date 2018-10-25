<?php
class homeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {   
        $dados = array(
            'depoimentos' => array()
        );
        
        // Busca os depoimentos
        $depo = new Depoimentos();
        $dados['depoimentos'] = $depo->getDepoimentos(2);
        
        $this->loadTemplate('home',$dados);
    }
    
    public function teste($par1 = "", $par2 = "")
    {
        echo "homeController::teste -> parametro 1:".$par1.", parametro 2:".$par2;
    }
}
?>