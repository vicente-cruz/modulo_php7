<?php
class Usuarios extends Model
{
    public function fazerLogin($email, $senha)
    {
        $retorno = "";
        
        $sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha";
        $query = $this->db->prepare($sql);
        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            $_SESSION['lgpainel'] = $resp['id'];
        }
        else {
            $retorno = "E-mail e/ou senha errados!";
        }
        
        return $retorno;
    }
}