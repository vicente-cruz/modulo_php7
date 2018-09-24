<?php
class homeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function index()
    {
        $dados = array();
        
        $this->loadTemplate('home',$dados);
    }
}
?>