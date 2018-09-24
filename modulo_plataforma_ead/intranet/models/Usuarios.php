<?php
class Usuarios extends Model
{
    public function fazerLogin($email, $senha)
    {   
        $usuario = array();
        
        $sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha";
        $query = $this->db->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':senha',$senha);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $usuario = $query->fetch();
        }
        
        return $usuario;
    }
}
?>