<?php
class Modulos extends Model
{
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
}
?>