<?php
class Posts extends Model
{
    public function adicionarFotoPost($foto)
    {
        $dados_foto = array(
            'url' => ''
        ,   'tipo_post' => 'texto'
        );
        
        if (count($foto) > 0) {
            $tipos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($foto['type'], $tipos)) {
                $dados_foto['tipo_post'] = 'foto';
                $dados_foto['url'] = md5(time().rand(0,999));
                switch($foto['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                        $dados_foto['url'] .= '.jpg';
                        break;
                    case 'image/png':
                        $dados_foto['url'] .= '.png';
                        break;
                }
                move_uploaded_file($foto['tmp_name']
                        , 'assets/images/posts/'.$dados_foto['url']);
            }
        }
        
        return $dados_foto;
    }
    
    public function adicionarPost($id_usuario,$post, $foto, $id_grupo = 0)
    {
        $dados_foto = $this->adicionarFotoPost($foto);
        
        $url = $dados_foto['url'];
        $tipo_post = $dados_foto['tipo_post'];
        
        $sql = " INSERT INTO "
                . "posts(id_usuario,data_criacao,tipo,texto,url,id_grupo)"
                . " VALUES "
                . "(:id_usuario,NOW(),:tipo,:texto,:url,:id_grupo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_usuario',$id_usuario);
        $query->bindValue(':tipo',$tipo_post);
        $query->bindValue(':texto',$post);
        $query->bindValue(':url',$url);
        $query->bindValue(':id_grupo',$id_grupo);
        $query->execute();
    }
    
    public function buscarFeeds($id, $id_grupo = 0)
    {
        $feeds = array();
        
        $r = new Relacionamentos();
        $ids = $r->buscarRelacoes($id);
        $ids[] = $id;
        
        $sql = " SELECT pos.*"
                . ", usu.nome AS nome "
                . ", (SELECT "
                . "     COUNT(*) "
                . "     FROM posts_likes AS pl"
                . "     WHERE pl.id_post = pos.id"
                . "  ) AS likes "
                . ", (SELECT "
                . "     COUNT(*)"
                . "     FROM posts_likes AS pl"
                . "     WHERE pl.id_post = pos.id"
                . "         AND pl.id_usuario = :meu_id"
                . "  ) AS liked "
                . " FROM posts AS pos"
                . "     INNER JOIN usuarios AS usu"
                . "     ON usu.id = pos.id_usuario"
                . " WHERE id_usuario IN ";
        $sql_ids = "(";
        for ($i = 0;$i < count($ids); $i++) {
            $sql_ids .= ":id".$i.",";
        }
        $sql_ids = substr($sql_ids,0,-1).")";
        $sql .= $sql_ids;
        $sql .=  " AND id_grupo = :id_grupo ORDER BY data_criacao DESC";
        
        $query = $this->db->prepare($sql);
        for ($i = 0; $i < count($ids); $i++) {
            $query->bindValue(":id".$i,$ids[$i]);
        }
        $query->bindValue(":meu_id",$id);
        $query->bindValue(":id_grupo",$id_grupo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $feeds = $query->fetchAll();
            
            for ($i = 0; $i < count($feeds); $i++) {
                $feeds[$i]['comentarios'] =
                    $this->buscarComentariosPost($feeds[$i]['id']);
            }
        }
        
        return $feeds;
    }
    
    public function buscarComentariosPost($id_post)
    {
        $comentarios = array();
        
        $sql = "SELECT pc.*, usu.nome AS nome_comentario"
                . " FROM posts_comentarios AS pc "
                . "     INNER JOIN usuarios AS usu"
                . "     ON usu.id = pc.id_usuario"
                . " WHERE id_post = :id_post";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_post",$id_post);
        $query->execute();
        if ($query->rowCount() > 0) {
            $comentarios = $query->fetchAll();
        }
        
        return $comentarios;
    }
    
    public function verificarLike($id_post, $id_usuario)
    {
        $liked = FALSE;
        
        $sql = "SELECT COUNT(*) AS liked"
                . " FROM posts_likes"
                . " WHERE id_post = :id_post"
                . "     AND id_usuario = :id_usuario";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_post",$id_post);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            if ($resp['liked'] > 0) {
                $liked = TRUE;
            }
        }
        
        return $liked;
    }
    
    public function removerLike($id_post,$id_usuario)
    {
        $sql = "DELETE FROM posts_likes"
                . " WHERE id_post = :id_post AND id_usuario = :id_usuario";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_post",$id_post);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->execute();
    }
    
    public function adicionarLike($id_post,$id_usuario)
    {
        $sql = "INSERT INTO posts_likes(id_post, id_usuario)"
                . " VALUES (:id_post, :id_usuario)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_post",$id_post);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->execute();
    }
    
    public function adicionarComentario($id_post,$id_usuario,$txt)
    {
        $sql = "INSERT INTO "
                . "posts_comentarios(id_post,id_usuario,data_criacao,texto)"
                . " VALUES "
                . "(:id_post,:id_usuario,NOW(),:txt)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_post",$id_post);
        $query->bindValue(":id_usuario",$id_usuario);
        $query->bindValue(":txt",$txt);
        $query->execute();
    }
}
?>