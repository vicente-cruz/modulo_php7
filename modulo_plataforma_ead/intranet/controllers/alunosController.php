<?php
class alunosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function index()
    {
        $dados = array(
            'alunos' => array()
        );
        
        $alunos = new Alunos();
        $dados['alunos'] = $alunos->buscarAlunos();
        
        $this->loadTemplate('alunos',$dados);
    }
    
    public function excluir($id_aluno = "")
    {
        if ( ! empty($id_aluno)) {
            $id_aluno = addslashes($id_aluno);
            
            $alunos = new Alunos();
            $alunos->excluirCursosAluno($id_aluno);
            $alunos->excluirAluno($id_aluno);
        }
        
        header("Location: ".BASE_URL."alunos");
    }
    
    public function adicionar()
    {
        $dados = array();
        
        $aluno_form = filter_input_array(INPUT_POST);
        if (isset($aluno_form['nome']) && ( ! empty($aluno_form['nome']))) {
            $nome = addslashes($aluno_form['nome']);
            $email = addslashes($aluno_form['email']);
            $senha = md5($aluno_form['senha']);
            
            $aluno = new Alunos();
            $aluno->adicionarAluno($nome,$email,$senha);
            
            header("Location: ".BASE_URL."alunos");
        }
        
        $this->loadTemplate('aluno_adicionar',$dados);
    }
    
    public function editar($id_aluno = "")
    {
        if ( ! empty($id_aluno)) {
            $id_aluno = addslashes($id_aluno);
            
            $dados = array(
                'aluno' => array()
               ,'cursos' => array()
               ,'inscrito' => array()
            );
            
            $aluno_form = filter_input_array(INPUT_POST);
            if (isset($aluno_form['nome']) && ( ! empty($aluno_form['nome']))) {
                $nome = addslashes($aluno_form['nome']);
                $email = addslashes($aluno_form['email']);
                $aluno_cursos = $aluno_form['cursos'];

                $aluno = new Alunos();
                $aluno->editarAluno($id_aluno,$nome,$email,$aluno_cursos);

                header("Location: ".BASE_URL."alunos");
            }
            
            $aluno = new Alunos();
            $cursos = new Cursos();
            $dados['aluno'] = $aluno->buscarAluno($id_aluno);
            $dados['cursos'] = $cursos->buscarCursos();
            $dados['inscrito'] = $cursos->buscarCursosInscrito($id_aluno);
            
            $this->loadTemplate('aluno_editar',$dados);
        }
        else {
            header("Location: ".BASE_URL."alunos");
        }
    }
}
?>