<?php
class Relacionamentos extends Model
{
    public function buscarRelacoes($id,$filtroStatus = "")
    {
        $ids_relacoes = array();
        
        $sql = "SELECT usuario_de AS id"
                . " FROM relacionamentos"
                . " WHERE usuario_para=:id ".$filtroStatus
                . "     UNION "
                . "SELECT usuario_para AS id"
                . " FROM relacionamentos"
                . " WHERE usuario_de=:id ".$filtroStatus;
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $usuarios = $query->fetchAll();
            $ids_relacoes = array_column($usuarios,'id');
        }
        
        return $ids_relacoes;
    }
    
    public function adicionarAmigo($meuId, $idAmigo)
    {
        $sql = "INSERT INTO relacionamentos(usuario_de, usuario_para) VALUES (:meuId, :idAmigo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":meuId",$meuId);
        $query->bindValue(":idAmigo",$idAmigo);
        $query->execute();
    }  
    
    public function buscarReqAmizades($meuId)
    {
        $reqAmizades = array();
        
        $sql = " SELECT "
                . " usu.id"
                . ",usu.nome"
                . " FROM "
                . "relacionamentos AS rel"
                . "     INNER JOIN usuarios AS usu"
                . "     ON usu.id = rel.usuario_de"
                . " WHERE "
                . "rel.usuario_para = :meuId"
                . " AND rel.status = 0 ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":meuId",$meuId);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $reqAmizades = $query->fetchAll();
        }
            
        return $reqAmizades;
    }
    
    public function aceitarAmigo($meuId, $idAmigo)
    {
        $sql = " UPDATE relacionamentos "
                . " SET status = 1 "
                . " WHERE usuario_de = :usuario_de AND usuario_para = :usuario_para ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":usuario_de",$idAmigo);
        $query->bindValue(":usuario_para",$meuId);
        $query->execute();
    }
    
    public function buscarTotalAmigos($meuId)
    {
        
    }
}
?>