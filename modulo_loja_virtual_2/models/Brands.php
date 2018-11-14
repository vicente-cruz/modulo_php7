<?php
class Brands extends Model
{
    public function buscarNomePorId($id)
    {
        $nome_marca = "";
        
        $sql = "SELECT name FROM brands WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            $nome_marca = $resp['name'];
        }
        
        return $nome_marca;
    }
}