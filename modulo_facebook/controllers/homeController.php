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
        $u = new Usuarios();
        $p = new Posts();
        $r = new Relacionamentos();
        $g = new Grupos();
        
        $dados['usuario_nome'] = $u->buscarNome($_SESSION['lgsocial']);
        
        // Verifica se foi enviado algum POST
        $post = filter_input(INPUT_POST,'post');
        if ( ! empty($post)) {
            $post = addslashes($post);
            
            $foto = array();
            if (isset($_FILES['foto']) && ( ! empty($_FILES['foto']['tmp_name']))) {
                $foto = $_FILES['foto'];
            }
            
            $p->adicionarPost($_SESSION['lgsocial'], $post, $foto);
        }        
        
        // Verifica se não foi criado nenhum grupo
        $grupo = filter_input(INPUT_POST,'grupo');
        if ( ! empty($grupo)) {
            $grupo = addslashes($grupo);
            $idGrupo = $g->criarGrupo($_SESSION['lgsocial'], $grupo);
            
            if ($idGrupo > 0) {
                header("Location: ".BASE_URL."grupos/abrir/".$idGrupo);
            }
        }
        
        $dados['sugestoes'] = $u->buscarSugestoes($_SESSION['lgsocial'], 3);
        $dados['reqAmizades'] = $r->buscarReqAmizades($_SESSION['lgsocial']);
        $dados['totalAmigos'] = count(
                $r->buscarRelacoes($_SESSION['lgsocial'],"AND status = 1")
            );
        $dados['feeds'] = $p->buscarFeeds($_SESSION['lgsocial']);
        $dados['grupos'] = $g->buscarGrupos();
        
        $this->loadTemplate("home",$dados);
    }
}
?>