<?php
class Modulos extends Model
{
    public function buscarModulo($id_modulo)
    {
        $modulo = array();
        
        $sql = "SELECT * FROM modulos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id',$id_modulo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $modulo = $query->fetch();
        }
        
        return $modulo;
    }
    
    public function getModulos($id_curso)
    {
        $modulos = array();
        
        $sql = "SELECT * FROM modulos WHERE id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $modulos = $query->fetchAll();
            
            $aulas = new Aulas();
            
            foreach ($modulos as $mKey => $mValue) {
                $modulos[$mKey]['aulas'] = $aulas->getAulasModulo($mValue['id']);
            }
        }
        
        return $modulos;
    }
    
    public function excluirModulos($id_curso)
    {
        $sql = "DELETE FROM modulos WHERE id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();
    }

    public function excluirModulo($id)
    {
        $sql = "DELETE FROM modulos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function adicionarModulo($id_curso,$nome_modulo)
    {
        $sql = "INSERT INTO modulos(id_curso, nome)"
                . "VALUES (:id_curso,:nome)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_curso",$id_curso);
        $query->bindValue(":nome",$nome_modulo);
        $query->execute();
    }
    
    public function atualizarModulo($id_modulo, $nome_modulo)
    {
        $sql = "UPDATE modulos SET nome = :nome WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':nome',$nome_modulo);
        $query->bindValue(':id',$id_modulo);
        $query->execute();
    }
    
    public function buscarCursoModulo($id_modulo)
    {
        $id_curso = "";
        
        $sql = "SELECT id_curso FROM modulos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id_modulo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            $id_curso = $resp['id_curso'];
        }
        
        return $id_curso;
    }
}
?>