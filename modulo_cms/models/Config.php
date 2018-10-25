<?php
class Config extends Model
{
    public function getConfig()
    {
        $config = array();
        
        $sql = "SELECT * FROM config";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            foreach ($query->fetchAll() as $c) {
                $config[$c['nome']] = $c['valor'];
            }
        }
        
        return $config;
    }
    
    public function definirPropriedade($nome,$valor)
    {
        if ($nome == "home_banner") {
            $md5name = "";
            if ( ! empty($valor['tmp_name'])
            && in_array(
                    $valor['type'],
                    array('image/jpg','image/jpeg','image/png'))) {
                $md5name = md5(time().rand(0,9999)).".jpg";
                move_uploaded_file($valor['tmp_name'],'assets/images/'.$md5name);
                unset($valor);
                $valor = $md5name;
            }
        }
        
        $sql = "UPDATE config SET valor = :valor WHERE nome = :nome";
        $query = $this->db->prepare($sql);
        $query->bindValue(":valor",$valor);
        $query->bindValue(":nome",$nome);
        $query->execute();
    }
    
}
?>