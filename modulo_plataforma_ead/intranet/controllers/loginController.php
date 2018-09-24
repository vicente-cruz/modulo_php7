<?php
class loginController extends Controller
{
    public function index()
    {
        $dados = array();
        
        $this->loadLoginTemplate('login_home',$dados);
    }
    
    public function entrar()
    {
        $dados = array();
        $email = addslashes(filter_input(INPUT_POST,'email'));
        
        if (isset($email) && ! empty($email)) {
            $senha = md5(filter_input(INPUT_POST,'senha'));
            
            $u = new Usuarios();
            $usuario = $u->fazerLogin($email, $senha);
            
            if (count($usuario) > 0) {
                $_SESSION['lgadmin'] = $usuario['id'];
                
                header("Location: ".BASE_URL);
            }
        }
        
        $this->loadLoginTemplate('login_entrar',$dados);
    }
    
    public function logout()
    {
        unset($_SESSION['lgadmin']);
        header("Location: ".BASE_URL."login");
    }
}
?>