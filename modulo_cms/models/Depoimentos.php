<?php
class Depoimentos extends Model
{
    public function getDepoimentos($limit = 0)
    {
        $depoimentos = array();
        
        $sql = "SELECT * FROM depoimentos ORDER BY RAND()".($limit > 0 ? " LIMIT ".$limit : "");
        $query = $this->db->query($sql);
        if ($query->rowCount() > 0) {
            $depoimentos = $query->fetchAll();
        }
        
        return $depoimentos;
    }
}
?>