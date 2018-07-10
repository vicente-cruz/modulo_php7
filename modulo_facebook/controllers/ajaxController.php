<?php
class ajaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function adicionarAmigo()
    {
        $idAmigo = filter_input(INPUT_POST,'idAmigo');
        if ( ! empty($idAmigo)) {
            $idAmigo = addslashes($idAmigo);
            
            $r = new Relacionamentos();
            $r->adicionarAmigo($_SESSION['lgsocial'],$idAmigo);
        }
    }
    
    public function aceitarAmigo()
    {
        $idAmigo = filter_input(INPUT_POST,'idAmigo');
        if ( ! empty($idAmigo)) {
            $idAmigo = addslashes($idAmigo);
            
            $r = new Relacionamentos();
            $r->aceitarAmigo($_SESSION['lgsocial'],$idAmigo);
        }
    }
    
    public function like()
    {
        $id_post = filter_input(INPUT_POST,'id');
        if ( ! empty($id_post)) {
            $id_post = addslashes($id_post);
            $id_usuario = $_SESSION['lgsocial'];
            
            $p = new Posts();
            if ($p->verificarLike($id_post, $id_usuario)) {
                $p->removerLike($id_post,$id_usuario);
            }
            else {
                $p->adicionarLike($id_post,$id_usuario);
            }
            
        }
    }
    
    public function comentar()
    {
        $id_post = filter_input(INPUT_POST,'id');
        $txt = filter_input(INPUT_POST,'txt');
        if ( ( ! empty($id_post)) && ( ! empty($txt)) ) {
            $id_post = addslashes($id_post);
            $txt = addslashes($txt);
            $id_usuario = $_SESSION['lgsocial'];
            
            $p = new Posts();
            $p->adicionarComentario($id_post,$id_usuario,$txt);
        }
    }
}
?>