<?php
class Cursos extends Model
{
    private $info;
    
    public function buscarCursosAluno($id)
    {
        $cursos = array();
        
        $sql = "SELECT"
                . " ac.id_curso "
                . ",cur.nome "
                . ",cur.imagem "
                . ",cur.descricao "
                . "FROM alunos_cursos AS ac "
                . "     INNER JOIN cursos AS cur "
                . "         ON cur.id = ac.id_curso "
                . "WHERE ac.id_aluno = :id ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $cursos = $query->fetchAll();
        }
        
        return $cursos;
    }
    
    public function buscarCurso($id)
    {   
        $sql = "SELECT * FROM cursos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $this->info = $query->fetch();
        }
    }
    
    public function getNome()
    {
        return $this->info['nome'];
    }
    
    public function getImagem()
    {
        return $this->info['imagem'];
    }
    
    public function getDescricao()
    {
        return $this->info['descricao'];
    }
}
?>