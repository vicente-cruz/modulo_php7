<?php
class loginController extends Controller
{
    public function login()
    {
        $dados = array(
            'erro' => ''
        );
        
        $login_form = filter_input_array(INPUT_POST);
        if (isset($login_form['email']) && ( ! empty($login_form['email']))) {
            $email = addslashes($login_form['email']);
            $senha = md5($login_form['senha']);
            
            $usuario = new Usuarios();
            $dados['erro'] = $usuario->fazerLogin($email, $senha);
            
            if (empty($dados['erro'])) {
                header("Location: ".BASE_URL."painel");
            }
        }
        
        $this->loadView("paineis/login",$dados);
    }
    
    public function logout()
    {
        unset($_SESSION['lgpainel']);
        header("Location: ".BASE_URL."login/login");
        exit;
    }
}
?>