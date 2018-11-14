<?php
class Categories extends Model
{
    public function buscarCategorias()
    {
        $categorias = array();
        
        $sql = "SELECT * FROM categories ORDER BY sub DESC";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            foreach ($query->fetchAll() as $item) {
                $item['subs'] = array();
                $categorias[$item['id']] = $item;
            }
            
            while($this->verificarOrganizacao($categorias)) {
                $this->organizaSubcategoria($categorias);
            }
        }
        
        return $categorias;
    }
    
    private function verificarOrganizacao($categorias) {
        foreach ($categorias as $item) {
            if ( ! empty($item['sub'])) {
                return true;
            }
        }
        
        return false;
    }
    
    private function organizaSubcategoria(&$categorias)
    {
        foreach ($categorias as $id => $item) {
            if (isset($categorias[$item['sub']])) {
                $categorias[$item['sub']]['subs'][$item['id']] = $item;
                unset($categorias[$id]);
                break;
            }
        }
    }
}
?>