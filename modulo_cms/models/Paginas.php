<?php
class Paginas extends Model
{
    public function getPagina($url)
    {
        $paginas = array();
        
        $sql = "SELECT titulo, corpo FROM paginas WHERE url = :url";
        $query = $this->db->prepare($sql);
        $query->bindValue(":url",$url);
        $query->execute();
        if ($query->rowCount() > 0) {
            $paginas = $query->fetch();
        }
        
        return $paginas;
    }
    
    public function getPaginas()
    {
        $paginas = array();
        
        $sql = "SELECT id, url, titulo FROM paginas ";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $paginas = $query->fetchAll();
        }
        
        return $paginas;
    }

    public function getPaginaPorId($id)
    {
        $pagina = array();
        
        $sql = "SELECT * FROM paginas WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $pagina = $query->fetch();
        }
        
        return $pagina;
    }
    
    public function excluir($id)
    {
        $sql = "DELETE FROM paginas WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function atualizar($id,$url,$titulo,$corpo)
    {
        $sql = "UPDATE paginas "
                . " SET url = :url, titulo = :titulo, corpo = :corpo "
                . " WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":url",$url);
        $query->bindValue(":titulo",$titulo);
        $query->bindValue(":corpo",$corpo);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function adicionar($url,$titulo,$corpo)
    {
        $sql = "INSERT INTO paginas(url,titulo,corpo) VALUES (:url,:titulo,:corpo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":url",$url);
        $query->bindValue(":titulo",$titulo);
        $query->bindValue(":corpo",$corpo);
        $query->execute();
    }
}
?>