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
        
        $dados['sugestoes'] = $u->buscarSugestoes($_SESSION['lgsocial'], 3);
        $dados['reqAmizades'] = $r->buscarReqAmizades($_SESSION['lgsocial']);
        $dados['totalAmigos'] = count(
                $r->buscarRelacoes($_SESSION['lgsocial'],"AND status = 1")
            );
        $dados['feeds'] = $p->buscarFeeds($_SESSION['lgsocial']);
        
        $this->loadTemplate("home",$dados);
    }
}
?>