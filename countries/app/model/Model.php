<?php

/**
 * Description of Model
 *
 * @author antonio
 */
class Model {
    
    private $conn = null;
    public $except = '';
            
    public function __construct($user,$pass) {
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=TestCountries', $user, $pass);
        }catch(PDOException $e){
            $this->except = $e->getMessage();
        }
         
    }
    
    
    public function getListCountries(){
        try{
            $sql = $this->conn->prepare('SELECT id_pais,nombre,code FROM paises');
            $sql->execute();
            $resultado = $sql->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
     public function getCountry($id){
        try{
            $sql = $this->conn->prepare('SELECT id_pais,nombre,code FROM paises WHERE id_pais=:Id');
            $sql->execute(array('Id' => $id));
            $resultado = $sql->fetchAll();
            return $resultado;
        }catch(PDOException $e){
             return $e->getMessage();
        }
    }
    
    
    
}
