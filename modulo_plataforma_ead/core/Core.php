<?php
class Core
{
    public function run()
    {
        $currentController = "homeController";
        $action = "index";
        $params = array();
        
        $raw_url = "/".filter_input(INPUT_GET,'url');
        
        if ($raw_url != "/") {
            $url = explode("/",$raw_url);
            array_shift($url);
            $currentController = $url[0]."Controller";
            
            array_shift($url);
            if (isset($url[0]) && ( ! empty($url[0]))) {
                $action = $url[0];
                
                array_shift($url);
            }
            
            if (count($url) > 0 && ( ! empty($url[0]))) {
                $params = $url;
            }
            
            if ( ! file_exists("controllers/".$currentController.".php")
               || ! method_exists($currentController,$action)) {
                $currentController = "notfoundController";
                $action = "index";
            }
        }
        
        $controller = new $currentController();
        call_user_func_array(array($controller,$action),$params);
    }
}
?>