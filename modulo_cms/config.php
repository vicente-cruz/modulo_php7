<?php
require 'environment.php';
session_start();

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","On");

global $config;
$config = array();

function setGlobalConfigs($dbtype,$dbhost,$dbname,$dbuser,$dbpass,$baseurl,$basedir)
{
    global $config;
    $config['dbtype'] = $dbtype;
    $config['dbhost'] = $dbhost;
    $config['dbname'] = $dbname;
    $config['dbuser'] = $dbuser;
    $config['dbpass'] = $dbpass;
    define("BASE_URL",$baseurl);
    define("BASE_DIR",$basedir);
}

switch (ENVIRONMENT) {
    case "development":
        setGlobalConfigs(
            "mysql"
        ,   "localhost"
        ,   "projeto_cms"
        ,   "root"
        ,   ""
        ,   "http://cursophp7.pc/modulo_cms/"
        ,   "/modulo_cms/"
        );
        break;
}

function VerificarLogin()
{   
    if (( ! isset($_SESSION['lgpainel'])) || empty($_SESSION['lgpainel'])) {
        header("Location: ".BASE_URL."login/login");
        exit;
    }
}
?>