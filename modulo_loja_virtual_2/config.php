<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","On");

session_start();
require "environment.php";

global $config;
$config = array();

global $db;
function setGlobalConfigs 
    ($dbtype
    ,$dbhost
    ,$dbname
    ,$dbuser
    ,$dbpass
    ,$base_url
    ,$base_dir)
{
    global $db;
    $db = new PDO($dbtype.":dbname=".$dbname.";host=".$dbhost,$dbuser,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    define("BASE_URL",$base_url);
    define("BASE_DIR",$base_dir);
}

switch (ENVIRONMENT) {
    case "development":
        setGlobalConfigs
            ("mysql"
            ,"localhost"
            ,"projeto_loja2"
            ,"root"
            ,""
            ,"http://cursophp7.pc/modulo_loja_virtual_2/"
            ,"C:/xampp7/htdocs/cursophp7/modulo_loja_virtual_2/");
        break;
    case "testing":
        break;
    case "acceptance":
        break;
    case "production":
        break;
}

$config['default_lang'] = 'pt-br';

function VerificarLogin()
{
    if ( ! isset($_SESSION['lgcliente']) || (empty($_SESSION['lgcliente']))) {
        header("Location: ".BASE_URL."login");
    }
}
?>