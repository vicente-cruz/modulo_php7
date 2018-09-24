<?php
class aulasController extends Controller
{
    public function excluir($id_aula = "")
    {
        $id_curso = "";
        
        if ( ! empty($id_aula)) {
            $id_aula = addslashes($id_aula);

            $aulas = new Aulas();
            $id_curso = "cursos/editar/".$aulas->getCursoAula($id_aula);

            $aulas->excluirAula($id_aula);
        }
        header("Location: ".BASE_URL.$id_curso);
    }
    
    public function editar($id_aula = "", $id_conteudo = "")
    {
        if ( ! empty($id_aula)) {
            $dados = array(
                'aula' => array()
            );            
            
            $id_aula = addslashes($id_aula);
            $id_conteudo = addslashes($id_conteudo);
            $aula = new Aulas();
            
            $aula_form = filter_input_array(INPUT_POST);
            if (isset($aula_form['url']) && ( ! empty($aula_form['url']))) {
                $nome = addslashes($aula_form['nome']);
                $descricao = addslashes($aula_form['descricao']);
                $url = addslashes($aula_form['url']);
                
                $aula->atualizarVideoAula($id_aula, $id_conteudo, $nome, $descricao, $url);
                
                $id_curso = $aula->getCursoAula($id_aula);
                header("Location: ".BASE_URL."cursos/editar/".$id_curso);
            }
            elseif (isset($aula_form['pergunta']) && ( ! empty($aula_form['pergunta']))) {
                $nome = addslashes($aula_form['nome']);
                $pergunta = addslashes($aula_form['pergunta']);
                $op1 = addslashes($aula_form['op1']);
                $op2 = addslashes($aula_form['op2']);
                $op3 = addslashes($aula_form['op3']);
                $op4 = addslashes($aula_form['op4']);
                $resposta = addslashes($aula_form['resposta']);
                
                $aula->atualizarPollAula(
                        $id_aula, $id_conteudo,
                        $nome, $pergunta, $op1, $op2, $op3, $op4, $resposta);
                
                $id_curso = $aula->getCursoAula($id_aula);
                header("Location: ".BASE_URL."cursos/editar/".$id_curso);
            }
            
            $view = 'curso_edit_aula_';
            $dados['aula'] = $aula->getAula($id_aula,$id_conteudo);
            $view .= ( ($dados['aula']['tipo'] == "video") ? "video" : "poll" );
            
            $this->loadTemplate($view,$dados);
        }
        else {
            header("Location: ".BASE_URL);
        }
    }
}
?>