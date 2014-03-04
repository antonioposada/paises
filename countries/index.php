<?php
ini_set('error_reporting',
    E_ALL ^ E_NOTICE ^ E_USER_NOTICE ^ E_WARNING ^ E_CORE_WARNING ^
        E_COMPILE_WARNING ^ E_USER_WARNING ^ E_DEPRECATED);
ini_set('display_errors', 1);

require_once "app/Api.php";

$url = explode('/', trim($_REQUEST['url'])); 
$url = array_filter($url);  
$metodo = strtolower(array_shift($url));  
$argumentos = $url;  

if(!$metodo){
    //Por defecto se pide todos los paises
    $metodo = 'getcountries';
}

$oApi = new Api();
$oApi->processApi($metodo,$argumentos[0]);
