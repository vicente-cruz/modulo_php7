<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","On");

session_start();
require "environment.php";

global $config;
$config = array();

function setGlobalConfigs($dbtype, $dbhost, $dbname, $dbuser,$dbpass,$base_url,$base_dir)
{
    global $config;
    $config["dbtype"] = $dbtype;
    $config["dbhost"] = $dbhost;
    $config["dbname"] = $dbname;
    $config["dbuser"] = $dbuser;
    $config["dbpass"] = $dbpass;
    define("BASE_URL",$base_url);
    define("BASE_DIR",$base_dir);
}

switch (ENVIRONMENT) {
    case "development":
        setGlobalConfigs
            ("mysql"
            ,"localhost"
            ,"projeto_facebook"
            ,"root"
            ,""
            ,"http://cursophp7.pc/modulo_facebook/"
            ,"C:/xampp7/htdocs/cursophp7/modulo_facebook/");
        break;
    case "testing":
        setGlobalConfigs("","","","","","","");
        break;
    case "acceptance":
        setGlobalConfigs("","","","","","","");
        break;
    case "production":
        setGlobalConfigs("","","","","","","");
        break;
}

function VerificarLogin()
{
    if ( ! isset($_SESSION['lgsocial']) || empty($_SESSION['lgsocial'])) {
        header("Location: ".BASE_URL."login");
    }
}
?>