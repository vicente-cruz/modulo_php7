<?php
class ajaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function marcar_assistida($id_aula)
    {
        $aulas = new Aulas();
        $aulas->marcarAssistida($_SESSION['lgaluno'], $id_aula);
    }
}
?>