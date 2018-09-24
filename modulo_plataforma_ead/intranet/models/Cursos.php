<?php
class Cursos extends Model
{   
    public function buscarCurso($id)
    {   
        $curso = array();
        
        $sql = "SELECT * FROM cursos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $curso = $query->fetch();
        }
        
        return $curso;
    }

    public function buscarCursos()
    {   
        $cursos = array();
                
        $sql = " SELECT"
                . " cur.* "
                . ", ("
                . "     SELECT COUNT(*) "
                . "     FROM alunos_cursos AS ac "
                . "     WHERE ac.id_curso = cur.id"
                . "  ) AS qt_alunos "
                . " FROM "
                . "cursos AS cur";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $cursos = $query->fetchAll();
        }
        
        return $cursos;
    }
    
    public function buscarCursosInscrito($id_aluno)
    {
        $inscrito = array();
        
        $sql = "SELECT * FROM alunos_cursos WHERE id_aluno = :id_aluno";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_aluno",$id_aluno);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resps = $query->fetchAll();
            foreach($resps as $resp) {
                $inscrito[] = $resp['id_curso'];
            }
        }
        
        return $inscrito;
    }
    
    public function excluirAlunosCurso($id_curso)
    {
        $sql = "DELETE FROM alunos_cursos WHERE id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();        
    }
    
    public function excluirCurso($id)
    {
        $sql = "DELETE FROM cursos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function adicionarCurso($nome,$descricao,$imagem)
    {
        $md5name = "";
        if ( ! empty($imagem['tmp_name'])
            && (in_array(
                    $imagem['type'],array('image/jpeg', 'image/jpg', 'image/png')))) {
            $md5name = md5(time().rand(0,9999)).'.jpg';
            move_uploaded_file($imagem['tmp_name'],"assets/images/cursos/".$md5name);
        }
        
        $sql = " INSERT INTO "
                . "cursos(nome,descricao,imagem)"
                . " VALUES (:nome,:descricao,:imagem)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":descricao",$descricao);
        $query->bindValue(":imagem",$md5name);
        $query->execute();
    }
    
    public function editarCurso($id, $nome, $descricao, $imagem)
    {
        
        $md5name = "";
        
        if ( ! empty($imagem['tmp_name'])
            && (in_array(
                    $imagem['type'],array('image/jpeg', 'image/jpg', 'image/png')))) {
            $md5name = md5(time().rand(0,9999)).'.jpg';
            move_uploaded_file($imagem['tmp_name'],"assets/images/cursos/".$md5name);
        }
        
        $sql = " UPDATE cursos "
                . " SET nome = :nome, descricao = :descricao, imagem = :imagem "
                . " WHERE id = :id ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":descricao",$descricao);
        $query->bindValue(":imagem",$md5name);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}
?>