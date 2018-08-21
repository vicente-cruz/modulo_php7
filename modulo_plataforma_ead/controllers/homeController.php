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
        $dados = array(
            'info' => array()
        ,   'cursos' => array()
        );
        
        $aluno = new Alunos();
        $aluno->buscarAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        
        $cursos = new Cursos();
        $dados['cursos'] = $cursos->buscarCursosAluno($aluno->getId());
        
        $this->loadTemplate('home',$dados);
    }
}
?>