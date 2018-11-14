<?php
class Products extends Model
{
    public function buscarProdutos($offset = 0, $limit = 3)
    {
        $produtos = array();
        $sql = " SELECT prd.*"
                . ", brd.name AS marca_nome"
                . ", cat.name AS categoria_nome "
                . " FROM products AS prd "
                . " INNER JOIN brands AS brd "
                . "     ON brd.id = prd.id_brand "
                . " INNER JOIN categories AS cat "
                . "     ON cat.id = prd.id_category "
                . " LIMIT ".$offset.", ".$limit;
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $produtos = $query->fetchAll();
            
            // Para não fazer INNER JOIN. Util quando info a ser buscada é + complexa
//            $marca = new Brands();
            foreach ($produtos as $key => $produto) {
//                $produtos[$key]['nome_marca'] = $marca->buscarNomePorId($produto['id_brand']);
                $produtos[$key]['images'] = $this->buscarImagensPorIdProduto($produto['id']);
           }
        }
        
        return $produtos;
        
    }
    
    public function buscarNumeroTotal()
    {
        $sql = "SELECT COUNT(*) AS c FROM products";
        $query = $this->db->query($sql);
        $resp = $query->fetch();
        
        return $resp['c'];
    }
    
    public function buscarImagensPorIdProduto($id_produto)
    {
        $imagens = array();
        
        $sql = "SELECT url FROM products_images WHERE id_product = :id_produto";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_produto",$id_produto);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $imagens = $query->fetchAll();
        }
        
        return $imagens;
    }
}
?>