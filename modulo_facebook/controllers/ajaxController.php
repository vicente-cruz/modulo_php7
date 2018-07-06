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
}
?>