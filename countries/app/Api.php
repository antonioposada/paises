<?php

require_once $_SERVER['DOCUMENT_ROOT']."/countries/app/Controller.php";

/**
 * Description of Api
 *
 * @author Antonio
 */
class Api {
    
    public $oController;
    
    public function __construct() {
        $this->oController = new Controller('root','');
    }


    public function processApi($function,$argumentos){
        if((int)method_exists($this,$function) > 0){
            header('Content-type: text/json');
            header('Content-type: application/json');
            $this->$function($argumentos);
        }else{
             header("HTTP/1.1 404 Not Found"); 
             echo 'Error no existe la funcion';
        }
    }
    
    
    public function getcountries(){
        try {
            echo $this->oController->getCountries();
        } catch (Exception $exc) {
            //Si no Existe el objeto
            echo $exc->getTraceAsString();
        }
    }
    
     public function getcountry($id){
        try {
            echo $this->oController->getCountry($id);
        } catch (Exception $exc) {
            //Si no Existe el objeto
            echo $exc->getTraceAsString();
        }
    }
}
