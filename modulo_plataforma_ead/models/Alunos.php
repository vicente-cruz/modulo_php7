<?php
class Alunos extends Model
{
    private $info;
    
    public function fazerLogin($email, $senha)
    {   
        $aluno = array();
        
        $sql = "SELECT id,nome FROM alunos WHERE email = :email AND senha = :senha";
        $query = $this->db->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':senha',$senha);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $aluno = $query->fetch();
        }
        
        return $aluno;
    }
    
    public function buscarAluno($id)
    {
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $this->info = $query->fetch();
        }
    }
    
    public function verificarInscricao($id_curso)
    {
        $inscrito = FALSE;
        
        $sql = "SELECT * "
                . "FROM alunos_cursos "
                . "WHERE id_aluno = :id_aluno AND id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_aluno",$this->info['id']);
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $inscrito = TRUE;
        }
        
        return $inscrito;
    }
    
    public function getId()
    {
        return $this->info['id'];
    }
    
    public function getNome()
    {
        return $this->info['nome'];
    }
    
    public function buscarNumAulasAssistidas($id_curso)
    {
        $aulas_assistidas = 0;
        
        $sql = " SELECT COUNT(*) AS aulas_assistidas"
                . " FROM historico "
                . " WHERE id_aluno = :id_aluno "
                . "     AND id_aula IN"
                . "     (SELECT aulas.id FROM aulas WHERE aulas.id_curso = :id_curso) ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_aluno",$this->getId());
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            $aulas_assistidas = $resp['aulas_assistidas'];
        }
        
        return $aulas_assistidas;
    }
}
?>