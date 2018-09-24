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
        $dados = array(
            'cursos' => array()
        );
        
        $cursos = new Cursos();
        $dados['cursos'] = $cursos->buscarCursos();
        
        $this->loadTemplate('curso_home',$dados);
    }
    
    public function excluir($id_curso)
    {
        $id_curso = addslashes($id_curso);
        
        $curso = new Cursos();
        $modulos = new Modulos();
        $aulas = new Aulas();
        
        $id_aulas = $aulas->getIds($id_curso);
        
        $aulas->excluirDuvidasAulas($id_aulas);
        $aulas->excluirHistoricoAulas($id_aulas);
        $aulas->excluirVideosAulas($id_aulas);
        $aulas->excluirQuestionariosAulas($id_aulas);
        $aulas->excluirAulas($id_curso);
        $modulos->excluirModulos($id_curso);
        $curso->excluirCurso($id_curso);
        
        header("Location: ".BASE_URL);
    }
    
    public function adicionar()
    {
        $dados = array();
        
        $novo_curso = filter_input_array(INPUT_POST);
        if (isset($novo_curso['nome']) && ( ! empty($novo_curso['nome']))) {
            $nome = addslashes($novo_curso['nome']);
            $descricao = addslashes($novo_curso['descricao']);
            $imagem = $_FILES['imagem'];
            
            $curso = new Cursos();
            $curso->adicionarCurso($nome,$descricao,$imagem);
            
            header("Location: ".BASE_URL);
        }
        $this->loadTemplate('curso_add', $dados);
    }
    
    public function editar($id_curso = "")
    {
        if ( ! empty($id_curso)) {
            $dados = array(
                'curso' => array()
               ,'modulos' => array()
            );
            $curso = new Cursos();
            $modulos = new Modulos();

            $curso_form = filter_input_array(INPUT_POST);
            if (isset($curso_form['nome']) && ( ! empty($curso_form['nome']))) {
                $nome = $curso_form['nome'];
                $descricao = $curso_form['descricao'];
                $imagem = $_FILES['imagem'];

                $curso->editarCurso($id_curso, $nome, $descricao, $imagem);

                header("Location: ".BASE_URL);
            }

            $modulo_form = filter_input_array(INPUT_POST);
            if (isset($modulo_form['nome_modulo']) && ( ! empty($modulo_form['nome_modulo']))) {
                $nome_modulo = utf8_decode(addslashes($modulo_form['nome_modulo']));
                $modulos->adicionarModulo($id_curso, $nome_modulo);
            }

            $aula_form = filter_input_array(INPUT_POST);
            if (isset($aula_form['nome_aula']) && ( ! empty($aula_form['nome_aula']))) {
                $nome_aula = addslashes($aula_form['nome_aula']);
                $modulo_aula = addslashes($aula_form['modulo_aula']);
                $tipo_aula = addslashes($aula_form['tipo_aula']);

                $aula = new Aulas();
                $aula->adicionarAula($id_curso,$nome_aula, $modulo_aula, $tipo_aula);
            }

            $id_curso = addslashes($id_curso);
            $dados['curso'] = $curso->buscarCurso($id_curso);
            $dados['modulos'] = $modulos->getModulos($id_curso);
            $this->loadTemplate('curso_edit',$dados);
        }
        else {
            header("Location: ".BASE_URL);
        }
    }
    
    public function excluirModulo($id_modulo = "")
    {
        $dados = array(
            'curso' => array()
           ,'modulos' => array()
        );
        
        $id_curso = 0;
        
        if ( ! empty($id_modulo)) {
            $id_modulo = addslashes($id_modulo);
            $modulo = new Modulos();
            $curso = new Cursos();
            
            $id_curso = $modulo->buscarCursoModulo($id_modulo);
            $modulo->excluirModulo($id_modulo);
            
            header("Location: ".BASE_URL."cursos/editar/".$id_curso);
        }
        
        $this->loadTemplate('home',$dados);
    }
    
    public function editarModulo($id_modulo)
    {
        $dados = array(
            'modulo' => array()
           ,'modulos' => array()
           ,'curso' => array()
        );
        
        $modulo = new Modulos();
        
        $modulo_form = filter_input_array(INPUT_POST);
        if (isset($modulo_form['modulo']) && ( ! empty($modulo_form['modulo']) )) {
            $modulo_nome = utf8_decode(addslashes($modulo_form['modulo']));
            $modulo->atualizarModulo($id_modulo, $modulo_nome);
            
            $modulos = new Modulos();
            $curso = new Cursos();
            
            $id_curso = $modulo->buscarCursoModulo($id_modulo);
            header("Location: ".BASE_URL."cursos/editar/".$id_curso);
        }
        
        $dados['modulo'] = $modulo->buscarModulo($id_modulo);
        $this->loadTemplate('curso_edit_modulo',$dados);
    }
}
?>