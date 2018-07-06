<?php
class Posts extends Model
{
    public function adicionarPost($id,$post, $foto)
    {
        $tipo_post = 'texto';
        
        if (count($foto) > 0) {
            $tipos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($foto['type'], $tipos)) {
                $tipo_post = 'foto';
                $url = md5(time().rand(0,999));
                switch($foto['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                        $url .= '.jpg';
                        break;
                    case 'image/png':
                        $url .= '.png';
                        break;
                }
                move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url);
            }
        }
        
        $sql = " INSERT INTO "
                . "posts(id_usuario,data_criacao,tipo,texto,url,id_grupo)"
                . " VALUES "
                . "(:id_usuario,NOW(),:tipo,:texto,:url,:id_grupo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_usuario',$id);
        $query->bindValue(':tipo',$tipo_post);
        $query->bindValue(':texto',$post);
        $query->bindValue(':url',$url);
        $query->bindValue(':id_grupo',0);
        $query->execute();
    }
}
?>