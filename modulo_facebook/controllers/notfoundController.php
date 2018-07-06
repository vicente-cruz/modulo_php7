<?php
class notfoundController extends Controller
{
    public function index()
    {
        $dados = array();
        
        $this->loadTemplate("notfound",$dados);
    }
}
?>