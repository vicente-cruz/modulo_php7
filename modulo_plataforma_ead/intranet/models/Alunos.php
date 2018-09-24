<?php
class Alunos extends Model
{
    public function buscarAlunos()
    {
        $alunos = array();
        
        $sql = " SELECT"
                . " alu.* "
                . ", ("
                . "     SELECT COUNT(*) "
                . "     FROM alunos_cursos AS ac "
                . "     WHERE ac.id_aluno = alu.id"
                . "  ) AS qt_cursos "
                . " FROM "
                . "alunos AS alu";
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $alunos = $query->fetchAll();
        }
        
        return $alunos;
    }

    public function buscarAluno($id)
    {   
        $aluno = array();
        
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $aluno = $query->fetch();
        }
        
        return $aluno;
    }
    
    public function adicionarAluno($nome,$email,$senha)
    {
        $sql = "INSERT INTO alunos(nome,email,senha) VALUES (:nome,:email,:senha)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();
    }
    
    public function excluirAluno($id)
    {
        $sql = "DELETE FROM alunos WHERE id = :id";
        $query = $this->db->query($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    
    public function excluirCursosAluno($id)
    {
        $sql = "DELETE FROM alunos_cursos WHERE id_aluno = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();        
    }
    
    public function adicionarCursosAluno($id,$cursos)
    {
        $sql = " INSERT INTO alunos_cursos (id_aluno,id_curso) VALUES ";
        for ($i=0; $i<count($cursos); $i++) {
            $sql .= "(:id".$i.",:id_curso".$i."),";
        }
        $sql = substr($sql,0,-1);
        
        $query = $this->db->prepare($sql);
        
        for ($i=0; $i<count($cursos); $i++) {
            $query->bindValue(":id".$i,$id);
            $query->bindValue(":id_curso".$i,$cursos[$i]);
        }
        $query->execute();
    }
    
    public function editarAluno($id,$nome,$email,$cursos)
    {
        $sql = " UPDATE alunos "
                . " SET nome = :nome, email = :email "
                . " WHERE id = :id ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":email",$email);
        $query->bindValue(":id",$id);
        $query->execute();
        
        $this->excluirCursosAluno($id);
        $this->adicionarCursosAluno($id,$cursos);
        
    }
}
?>