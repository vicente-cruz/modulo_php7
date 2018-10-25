<?php
class Menu extends Model
{
    public function getItensMenu()
    {
        $itens_menu = array();
        
        $sql = "SELECT * FROM menu";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() >0) {
            $itens_menu = $query->fetchAll();
        }
        
        return $itens_menu;
    }
    
    public function getMenu($id)
    {
        $menu = array();
        
        $sql = "SELECT * FROM menu WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $menu = $query->fetch();
        }
        
        return $menu;
    }
 
    public function atualizar($id,$nome,$url)
    {
        $sql = "UPDATE menu SET nome = :nome, url = :url WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":url",$url);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function excluir($id)
    {
        $sql = "DELETE FROM menu WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function adicionar($nome,$url)
    {
        $sql = "INSERT INTO menu(nome,url) VALUES (:nome,:url)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":url",$url);
        $query->execute();
    }
}
?>