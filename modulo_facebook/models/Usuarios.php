<?php
class Usuarios extends Model
{
    public function verificarLogin()
    {

    }
    
    public function logar($email, $senha)
    {
        $usuario = array();
        
        $sql = "SELECT id,nome FROM"
                . " usuarios "
                . "WHERE"
                . " email = :email "
                . "AND senha = :senha";
        $query = $this->db->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':senha',md5($senha));
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $usuario = $query->fetch();
        }
        
        return $usuario;
    }
    
    public function cadastrar($email, $nome, $senha, $sexo)
    {
        $novo_usuario = array(
             'id' => -1
            ,'nome' => ''
        );
        
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->bindValue(":email",$email);
        $query->execute();
        
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO"
                    . " usuarios(email,nome,senha,sexo) "
                    . "VALUES"
                    . " (:email,:nome,:senha,:sexo) ";
            $query = $this->db->prepare($sql);
            $query->bindValue(":email",$email);
            $query->bindValue(":nome",$nome);
            $query->bindValue(":senha",md5($senha));
            $query->bindValue(":sexo",$sexo);
            $query->execute();
            
            $novo_usuario['id'] = $this->db->lastInsertId();
            $novo_usuario['nome'] = $nome;
        }
        
        return $novo_usuario;
    }
    
    public function buscarNome($id)
    {
        $nome = "";
        
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $usuario = $query->fetch();
            $nome = $usuario['nome'];
        }
        
        return $nome;
    }
    
    public function buscarUsuario($id)
    {
        $usuario = array();
        
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $usuario = $query->fetch();
        }
        
        return $usuario;
    }
    
    public function atualizar($id, $atualizado = array())
    {
        if (count($atualizado) > 0) {
            $sql = "UPDATE usuarios SET ";
            
            $campos = array_keys($atualizado);
            for ($i = 0; $i < count($campos); $i++) {
                $sql .= $campos[$i]." = :".$campos[$i].",";
            }
            $sql = substr($sql,0,-1);
            
            $sql .= " WHERE id = :id";
            
            $query = $this->db->prepare($sql);
            foreach ($atualizado as $campo => $valor) {
                $query->bindValue(":".$campo,$valor);
            }
            $query->bindValue(":id",$id);
            $query->execute();
        }
    }
    
    public function buscarSugestoes($meuId, $limit = 5)
    {
        $sugestoes = array();
        
        $r = new Relacionamentos();
        
        $ids_nao_sugeridos = $r->buscarRelacoes($meuId);
        $ids_nao_sugeridos[] = $meuId;
        
        $sql_ids = "(";
        for ($i=0; $i<count($ids_nao_sugeridos); $i++)
        {
            $sql_ids .= ":id".$i.",";
        }
        $sql_ids = substr($sql_ids,0,-1).")";
        
        $sql = " SELECT "
                . "id,nome"
                . " FROM "
                . "usuarios"
                . " WHERE "
                . "id NOT IN ".$sql_ids.""
                . " ORDER BY "
                . "RAND()"
                . " LIMIT ".$limit;
        $query = $this->db->prepare($sql);
        for ($i=0; $i<count($ids_nao_sugeridos); $i++) {
            $query->bindValue(":id".$i,$ids_nao_sugeridos[$i]);
        }
        $query->execute();
        if ($query->rowCount() > 0) {
            $sugestoes = $query->fetchAll();
        }
        
        return $sugestoes;
    }
}
?>