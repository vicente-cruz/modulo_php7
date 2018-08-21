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
            
            $a = new Alunos();
            $aluno = $a->fazerLogin($email, $senha);
            
            if (count($aluno) > 0) {
                $_SESSION['lgaluno'] = $aluno['id'];
                $_SESSION['aluno_nome'] = $aluno['nome'];
                
                header("Location: ".BASE_URL);
            }
        }
        
        $this->loadLoginTemplate('login_entrar',$dados);
    }
    
    public function logout()
    {
        unset($_SESSION['lgaluno']);
        header("Location: ".BASE_URL."login");
    }
}
?>