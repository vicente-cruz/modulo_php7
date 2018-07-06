<?php
class Posts extends Model
{
    public function adicionarPost($id,$post, $foto)
    {
        $tipo_post = 'texto';
        $url = '';
        
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
    
    public function buscarFeeds($id)
    {
        $feeds = array();
        
        $r = new Relacionamentos();
        $ids = $r->buscarRelacoes($id);
        $ids[] = $id;
        
        $sql = " SELECT pos.*, usu.nome AS nome "
                . " FROM posts AS pos"
                . "     INNER JOIN usuarios AS usu"
                . "     ON usu.id = pos.id_usuario"
                . " WHERE id_usuario IN ";
        $sql_ids = "(";
        for ($i = 0;$i < count($ids); $i++) {
            $sql_ids .= ":id".$i.",";
        }
        $sql_ids = substr($sql_ids,0,-1).") ORDER BY data_criacao DESC ";
        $sql .= $sql_ids;
        
        $query = $this->db->prepare($sql);
        for ($i = 0; $i < count($ids); $i++) {
            $query->bindValue(":id".$i,$ids[$i]);
        }
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $feeds = $query->fetchAll();
        }
        
        return $feeds;
    }
}
?>