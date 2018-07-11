<?php
class gruposController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function abrir($id_grupo)
    {
        $dados = array();
        
        $u = new Usuarios();
        $g = new Grupos();
        $p = new Posts();
        
        $dados['usuario_nome'] = $u->buscarNome($_SESSION['lgsocial']);
        
        $post = filter_input(INPUT_POST,'post');
        if ( ! empty($post)) {
            $post = addslashes($post);
            $foto = array();
            
            if (isset($_FILES['foto']) && (! empty($_FILES['foto']['tmp_name']))) {
                $foto = $_FILES['foto'];
            }
            $p->adicionarPost($_SESSION['lgsocial'], $post, $foto,$id_grupo);
        }
        
        $dados['grupo_info'] = $g->buscarInfoGrupo($id_grupo);
        $dados['verificar_membro'] = $g->verificarMembro($id_grupo,$_SESSION['lgsocial']);
        $dados['total_membros'] = $g->buscarTotalMembros($id_grupo);
        $dados['feeds'] = $p->buscarFeeds($_SESSION['lgsocial'],$id_grupo);
        
        $this->loadTemplate('grupo',$dados);
    }
    
    public function entrar($id_grupo)
    {
        $id_usuario = $_SESSION['lgsocial'];
        $g = new Grupos();
        $g->incluirUsuarioGrupo($id_usuario,$id_grupo);
        
        $this->abrir($id_grupo);
    }
}
?>