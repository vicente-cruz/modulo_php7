<?php
class Controller
{
    private $config;
    
    public function __construct()
    {
        $config = new Config();
        $this->config = $config->getConfig();
    }
    
    public function loadView($viewName, $viewData = array())
    {
        extract($viewData);
        include "views/".$viewName.".php";
    }
    
    public function loadTemplate($viewName, $viewData = array())
    {
        include "views/templates/".$this->config['site_template'].".php";
    }
    
    public function loadTemplateInPainel($viewName, $viewData = array())
    {
        include "views/painel.php";
    }
    
    public function loadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        include "views/".$viewName.".php";
    }
    
    public function loadMenu()
    {
        $itensMenu = array();
        $menu = new Menu();
        
        $itensMenu['menu'] = $menu->getItensMenu();
        
        $this->loadView("menu",$itensMenu);
    }
}
?>