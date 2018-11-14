<?php
class Language
{
    private $l;
    private $ini;
    
    public function __construct()
    {
        global $config;
        $this->l = (
                (! empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini'))
                ? $_SESSION['lang'] : $config['default_lang']
            );
        
        $this->ini = parse_ini_file('lang/'.$this->l.'.ini');
    }
    
    public function get($word,$return = false)
    {
        $text = (isset($this->ini[$word]) ? $this->ini[$word] : $word);
        
        if ($return) {
            return $text;
        }
        else {
            echo $text;
        }
    }
}
?>