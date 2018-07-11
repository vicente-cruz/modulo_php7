<?php
class buscaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function index()
    {
        $dados = array();
        
        $u = new Usuarios();
        $dados['usuario_nome'] = $u->buscarNome($_SESSION['lgsocial']);
        
        $q = addslashes(filter_input(INPUT_GET,'q'));
        $dados['sugestoesUsuarios'] = $u->procurar($_SESSION['lgsocial'],$q);
        
        $this->loadTemplate('busca',$dados);
    }
}
?>