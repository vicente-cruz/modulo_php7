<?php
class Grupos extends Model
{
    public function buscarGrupos()
    {
        $grupos = array();
        
        $sql = "SELECT id, titulo FROM grupos";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $grupos = $query->fetchAll();
        }
        
        return $grupos;
    }
    
    public function incluirUsuarioGrupo($id_usuario,$id_grupo)
    {
        $sql = "INSERT INTO grupos_membros(id_grupo,id_usuario)"
                . " VALUES (:id_grupo,:id_usuario)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_grupo",$id_grupo);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->execute();
    }
    
    public function criarGrupo($idCriador, $titulo)
    {
        $idGrupo = -1;
        
        $sql = "INSERT INTO grupos(id_usuario,titulo)"
                . " VALUES (:id_usuario,:titulo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_usuario",$idCriador);
        $query->bindValue(":titulo",$titulo);
        $query->execute();
        $idGrupo = $this->db->lastInsertId();
        
        $this->incluirUsuarioGrupo($idCriador,$idGrupo);
        
        return $idGrupo;
    }
    
    public function buscarTotalMembros($id_grupo)
    {
        $total_membros = 0;
        
        $sql = "SELECT COUNT(*) AS total_membros"
                . " FROM grupos_membros"
                . " WHERE id_grupo = :id_grupo";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_grupo",$id_grupo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $retorno = $query->fetch();
            $total_membros = $retorno['total_membros'];
        }
        
        return $total_membros;
    }
    
    public function buscarInfoGrupo($idGrupo)
    {
        $grupo = array();
        
        $sql = "SELECT * FROM grupos WHERE id = :idGrupo";
        $query = $this->db->prepare($sql);
        $query->bindValue(":idGrupo",$idGrupo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $grupo = $query->fetch();
        }
        
        return $grupo;
    }
    
    public function verificarMembro($id_grupo,$id_usuario)
    {
        $membro = FALSE;
        
        $sql = "SELECT * FROM grupos_membros"
                . " WHERE id_grupo = :id_grupo "
                . "     AND id_usuario = :id_usuario";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_grupo",$id_grupo);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $membro = TRUE;
        }
        
        return $membro;
    }
}
?>