<?php
class perfilController extends Controller
{
    public function index()
    {
        $dados = array();
        $u = new Usuarios();
        
        $nome = addslashes(filter_input(INPUT_POST, 'nome'));
        if ( ! empty($nome)) {
            $bio = addslashes(filter_input(INPUT_POST, 'bio'));
            $atualizado = array(
                'nome' => $nome
               ,'bio' => $bio
            );
            
            $senha = filter_input(INPUT_POST,'senha');
            if ( ! empty($senha)) {
                $atualizado['senha'] = md5($senha);
            }
            
            $u->atualizar($_SESSION['lgsocial'],$atualizado);
        }
        
        $dados['info'] = $u->buscarUsuario($_SESSION['lgsocial']);
        
        $this->loadTemplate('perfil',$dados);
    }
}
?>