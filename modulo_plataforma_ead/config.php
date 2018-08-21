<?php
session_start();

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors','On');

require 'environment.php';

function setGlobalConfigs($dbtype,$dbhost,$dbname,$dbuser,$dbpass,$base_url,$base_dir)
{
    global $config;
    $config['dbtype'] = $dbtype;
    $config['dbhost'] = $dbhost;
    $config['dbname'] = $dbname;
    $config['dbuser'] = $dbuser;
    $config['dbpass'] = $dbpass;
    define('BASE_URL',$base_url);
    define('BASE_DIR',$base_dir);
}

global $config;
$config = array();

switch (ENVIRONMENT) {
    case 'development':
        setGlobalConfigs(
            "mysql"
        ,   "localhost"
        ,   "projeto_ead"
        ,   "root"
        ,   ""
        ,   "http://cursophp7.pc/modulo_plataforma_ead/"
        ,   "/modulo_plataforma_ead/"
        );
        break;
    case 'acceptance':
        break;
    case 'testing':
        break;
    case 'production':
        break;
}

function VerificarLogin()
{
    if ( ! isset($_SESSION['lgaluno']) || empty($_SESSION['lgaluno'])) {
        
        header("Location: ".BASE_URL."login");
    }
}
?>