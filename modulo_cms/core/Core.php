<?php

class Core
{
    public function run()
    {
        $currentController = "homeController";
        $currentAction = "index";
        $params = array();
        
        $raw_url = "/".filter_input(INPUT_GET,"url");
        if ($raw_url !== "/") {
            $url = explode("/",$raw_url);
            array_shift($url);
            $currentController = $url[0]."Controller";
            
            array_shift($url);
            if (isset($url[0]) && ( ! empty($url[0]))) {
                $currentAction = $url[0];
                
                array_shift($url);
                if (isset($url[0]) && count($url) > 0) {
                    $params = $url;
                }                
            }
        }
        
        if (file_exists('controllers/'.$currentController.'.php')) {
            $controller = new $currentController();
        }
        else {
            $controller = new paginaController();
            $pNome = explode("Controller",$currentController);
            $pNome = $pNome[0];
            $params = array($pNome);
        }
        
        if ( ! file_exists('controllers/'.$currentController.'.php') ||
             ! method_exists($currentController,$currentAction)) {
            $currentController = "notfoundController";
            $currentAction = "index";
        }
        
        call_user_func_array(array($controller,$currentAction),$params);
    }
}