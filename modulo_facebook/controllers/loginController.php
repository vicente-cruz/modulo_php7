<?php
class loginController extends Controller
{
    public function index()
    {
        $dados = array();
        
        $this->loadView('login',$dados);
    }
    
    public function entrar()
    {
        $dados = array(
            'erro' => ''
        );
    
        $email = addslashes(filter_input(INPUT_POST,'email'));
        if ( ! empty($email)) {
            $senha = addslashes(filter_input(INPUT_POST,'senha'));
            
            $u = new Usuarios();
            
            $usuario = $u->logar($email,$senha);
            
            if (count($usuario) > 0) {
                $_SESSION['lgsocial'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header("Location: ".BASE_URL);
            }
            else {
                $dados['erro'] = "E-mail e/ou senha errado!";
            }
        }
        
        $this->loadView('login_entrar',$dados);
    }
    
    public function cadastrar()
    {
        $dados = array(
            'erro' => ''
        );
        
        $email = addslashes(filter_input(INPUT_POST,'email'));
        if ( ! empty($email)) {
            $nome = addslashes(filter_input(INPUT_POST,'nome'));
            $senha = addslashes(filter_input(INPUT_POST,'senha'));
            $sexo = addslashes(filter_input(INPUT_POST,'sexo'));
            
            $u = new Usuarios();
            $novo_usuario = $u->cadastrar($email, $nome, $senha, $sexo);
            if ($novo_usuario['id'] > -1) {
                $_SESSION['lgsocial'] = $novo_usuario['id'];
                $_SESSION['usuario_nome'] = $novo_usuario['nome'];
                header("Location: ".BASE_URL);
            }
            else {
                $dados['erro'] = "E-mail já cadastrado!";
            }
        }
        
        $this->loadView('login_cadastrar',$dados);
    }
    
    public function sair()
    {
        unset($_SESSION['lgsocial']);
        unset($_SESSION['usuario_nome']);
        header("Location: ".BASE_URL."login");
    }
}
?>