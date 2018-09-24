<?php
class Aulas extends Modulos
{
    public function getAula($id_aula,$id_conteudo)
    {
        $aula = array();
        
        // Verifica se o aluno assistiu a aula.
        $sql = " SELECT "
                . "a.tipo"
                . " FROM "
                . "aulas a"
                . " WHERE"
                . " a.id = :id_aula";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aula',$id_aula);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            
            $tabela = ( $resp['tipo'] == 'video' ? "videos" : "questionarios");
            
            $sql = " SELECT * "
                    . " FROM ".$tabela.""
                    . " WHERE id_aula = :id_aula AND id = :id_conteudo";
            $query = $this->db->prepare($sql);
            $query->bindValue(':id_aula',$id_aula);
            $query->bindValue(':id_conteudo',$id_conteudo);
            $query->execute();

            if ($query->rowCount() > 0) {
                $aula = $query->fetch();
            }
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
                $tabela = (($aValue['tipo'] == 'video') ? "videos" : "questionarios" );
                
                $sql = "SELECT id, nome FROM ".$tabela." WHERE id_aula = :id_aula";
                $query = $this->db->prepare($sql);
                $query->bindValue(":id_aula",$aValue['id']);
                $query->execute();

                if ($query->rowCount() > 0) {
                    $aulas[$aKey]['aula_conteudos'] = $query->fetchAll();
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
                . "duvidas(data_duvida,duvida,id_aluno,id_aula)"
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
    
    public function getIds($id_curso)
    {
        $ids = array();
        
        $sql = "SELECT id FROM aulas WHERE id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_curso",$id_curso);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetchAll();
            foreach($resp as $aula) {
                $ids[] = $aula['id'];
            }
        }
        
        return $ids;
    }
    
    public function excluirDuvidasAulas($id_aulas)
    {
        $sql = "DELETE FROM duvidas WHERE id_aula IN (:id_aulas)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aulas',implode(",",$id_aulas));
        $query->execute();
    }
    
    public function excluirHistoricoAulas($id_aulas)
    {
        $sql = "DELETE FROM historico WHERE id_aula IN (:id_aulas)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aulas',implode(",",$id_aulas));
        $query->execute();        
    }
    
    public function excluirVideosAulas($id_aulas)
    {
        $sql = "DELETE FROM videos WHERE id_aula IN (:id_aulas)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aulas',implode(",",$id_aulas));
        $query->execute();        
    }
    
    public function excluirQuestionariosAulas($id_aulas)
    {
        $sql = "DELETE FROM questionarios WHERE id_aula IN (:id_aulas)";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_aulas',implode(",",$id_aulas));
        $query->execute();        
    }
    
    public function excluirAulas($id_curso)
    {
        $sql = "DELETE FROM aulas WHERE id_curso = :id_curso";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id_curso',$id_curso);
        $query->execute();        
    }
    
    public function excluirAula($id)
    {
        $this->excluirVideosAulas(array($id));
        $this->excluirQuestionariosAulas(array($id));
        $this->excluirHistoricoAulas(array($id));
        
        $sql = "DELETE FROM aulas WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id',$id);
        $query->execute();
    }
    
    public function adicionarAula($id_curso,$nome_aula, $id_modulo, $tipo)
    {
        $ordem = 1;
        $sql = " SELECT ordem "
                . " FROM aulas "
                . " WHERE id_modulo = :id_modulo "
                . " ORDER BY ordem DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_modulo",$id_modulo);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            $resp = $query->fetch();
            $ordem = $ordem + intval($resp['ordem']);
        }
        
        $sql = "INSERT INTO aulas(id_modulo, id_curso, ordem, tipo)"
                . "VALUES (:id_modulo, :id_curso, :ordem, :tipo)";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_modulo",$id_modulo);
        $query->bindValue(":id_curso",$id_curso);
        $query->bindValue(":ordem",$ordem);
        $query->bindValue(":tipo",$tipo);
        $query->execute();
        
        $id_aula = $this->db->lastInsertId();
        
        // Adicionar Video ou Pergunta
        $tabela = (($tipo == 'video') ? "videos" : "questionarios" );
        $sql = " INSERT INTO ".$tabela."(id_aula, nome) "
                . " VALUES (:id_aula, :nome) ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id_aula",$id_aula);
        $query->bindValue(":nome",$nome_aula);
        $query->execute();
    }
    
    public function atualizarVideoAula($id_aula, $id_conteudo, $nome, $descricao, $url)
    {
        $sql = " UPDATE videos"
                . " SET nome = :nome, descricao = :descricao, url = :url"
                . " WHERE id = :id_conteudo AND id_aula = :id_aula ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":descricao",$descricao);
        $query->bindValue(":url",$url);
        $query->bindValue(":id_conteudo",$id_conteudo);
        $query->bindValue(":id_aula",$id_aula);
        $query->execute();
    }
    
    public function atualizarPollAula($id_aula, $id_conteudo
            ,$nome, $pergunta, $op1, $op2, $op3, $op4, $resposta)
    {
        $sql = " UPDATE questionarios "
                . " SET "
                . "  nome = :nome "
                . ", pergunta = :pergunta "
                . ", opcao1 = :opcao1 "
                . ", opcao2 = :opcao2 "
                . ", opcao3 = :opcao3 "
                . ", opcao4 = :opcao4 "
                . ", resposta = :resposta "
                . " WHERE "
                . " id = :id_conteudo AND id_aula = :id_aula ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":nome",$nome);
        $query->bindValue(":pergunta",$pergunta);
        $query->bindValue(":opcao1",$op1);
        $query->bindValue(":opcao2",$op2);
        $query->bindValue(":opcao3",$op3);
        $query->bindValue(":opcao4",$op4);
        $query->bindValue(":resposta",$resposta);
        $query->bindValue(":id_conteudo",$id_conteudo);
        $query->bindValue(":id_aula",$id_aula);
        $query->execute();
    }
}
?>