<?php
class Aulas extends Modulos
{
    public function getAula($id_aluno,$id_aula)
    {
        $aula = array();
        
        // Verifica se o aluno assistiu a aula.
        $sql = " SELECT "
                . "a.tipo"
                . ", ( SELECT "
                . "     COUNT(*)"
                . "    FROM "
                . "     historico h"
                . "    WHERE"
                . "     h.id_aluno = :id_aluno"
                . "         AND h.id_aula = a.id"
                . "  ) AS assistido"
                . " FROM "
                . "aulas a"
                . " WHERE"
                . " a.id = :id_aula";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aula',$id_aula);
        $query->bindValue(':id_aluno',$id_aluno);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            
            $tabela = ( $resp['tipo'] == 'video' ? "videos" : "questionarios");
            
            $sql = "SELECT * FROM ".$tabela." WHERE id_aula = :id_aula";
            $query = $this->db->prepare($sql);
            $query->bindValue(':id_aula',$id_aula);
            $query->execute();

            if ($query->rowCount() > 0) {
                $aula = $query->fetch();
            }
            $aula['assistido'] = $resp['assistido'];
            $aula['tipo'] = $resp['tipo'];
        }
        
        return $aula;
    }
    
    public function getAulasModulo($id_modulo)
    {
        $aulas = array();
        
        $sql = "SELECT * FROM aulas WHERE id_modulo = :id_modulo ORDER BY ordem";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_modulo",$id_modulo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $aulas = $query->fetchAll();
            
            foreach ($aulas as $aKey => $aValue) {
                if ($aValue['tipo'] == 'video') {
                    $sql = "SELECT nome FROM videos WHERE id_aula = :id_aula";
                    $query = $this->db->prepare($sql);
                    $query->bindValue(":id_aula",$aValue['id']);
                    $query->execute();
                    
                    if ($query->rowCount() > 0) {
                        $video = $query->fetch();
                        
                        $aulas[$aKey]['nome'] = $video['nome'];
                    }
                }
                else if ($aValue['tipo'] == 'poll') {
                    $aulas[$aKey]['nome'] = "Questionário";
                }
            }
        }
        
        return $aulas;
    }
    
    public function getCursoAula($id_aula)
    {
        $id_curso = 0;
        
        $sql = "SELECT id_curso FROM aulas WHERE id = :id_aula";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_aula",$id_aula);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            
            $id_curso = $resp['id_curso'];
        }
        
        return $id_curso;
    }
    
    public function insereDuvida($duvida,$id_aluno)
    {
        $sql = " INSERT INTO "
                . "duvidas(data_duvida,duvida,id_aluno)"
                . " VALUES "
                . "(NOW(),:duvida,:id_aluno)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':duvida',$duvida);
        $query->bindValue(':id_aluno',$id_aluno);
        $query->execute();
    }
    
    public function marcarAssistida($id_aluno,$id_aula)
    {
        $sql = " INSERT INTO "
                . "historico(data_viewed, id_aluno, id_aula)"
                . " VALUES "
                . "(NOW(),:id_aluno,:id_aula)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aluno',$id_aluno);
        $query->bindValue(':id_aula',$id_aula);
        $query->execute();
    }
}
?>