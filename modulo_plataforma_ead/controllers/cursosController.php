<?php
class cursosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function index()
    {
        
    }
    
    public function entrar($id_curso)
    {
        $dados = array(
            'info' => array()
        ,   'curso' => array()
        ,   'modulos' => array()
        );
        
        $aluno = new Alunos();
        $aluno->buscarAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        
        if ($aluno->verificarInscricao($id_curso)) {
            $curso = new Cursos();
            $curso->buscarCurso($id_curso);
            $dados['curso'] = $curso;
            
            $modulos = new Modulos();
            $dados['modulos'] = $modulos->getModulos($id_curso);
            
            $this->loadTemplate('curso_entrar',$dados);
        }
        else {
            header("Location: ".BASE_URL);
        }
    }
    
    public function aula($id_aula)
    {
        $dados = array(
            'info' => array()
        ,   'curso' => array()
        ,   'modulos' => array()
        ,   'aula_info' => array()
        );
        
        $alunos = new Alunos();
        $alunos->buscarAluno($_SESSION['lgaluno']);
        $dados['info'] = $alunos;
        
        $aula = new Aulas();
        $id_curso = $aula->getCursoAula($id_aula);
        
        if ($alunos->verificarInscricao($id_curso)) {
            $curso = new Cursos();
            $curso->buscarCurso($id_curso);
            $dados['curso'] = $curso;
            
            $modulos = new Modulos();
            $dados['modulos'] = $modulos->getModulos($id_curso);
            
            $dados['aula_info'] = $aula->getAula($alunos->getId(),$id_aula);
            
            $view = "curso_aula_";
            $view .= ( $dados['aula_info']['tipo'] == "video" ? "video" : "poll");
            
            $duvida = addslashes(filter_input(INPUT_POST,"duvida"));
            if ( ! empty($duvida)) {
                $aula->insereDuvida($duvida,$alunos->getId());
            }            
            
            $resp_form = filter_input_array(INPUT_POST);
            if (isset($resp_form['opcao']) && ( ! empty($resp_form['opcao']))) {
                $opcao = addslashes($resp_form['opcao']);
                
                $dados['resposta'] = ($opcao == $dados['aula_info']['resposta']
                        ? true : false);
                
                if ($opcao === $dados['aula_info']['resposta']) {
                    $dados['resposta'] = true;
                }
                elseif ($_SESSION['poll'.$id_aula] < 3) {
                    $_SESSION['poll'.$id_aula]++;
                }
            }
            else {
                // Inicializa #Tentativas
                $_SESSION['poll'.$id_aula] = 0;
            }
            
            $this->loadTemplate($view,$dados);
        }
        else {
            header("Location: ".BASE_URL);
        }
    }
}
?>