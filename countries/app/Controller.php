<?php

require_once "model/Model.php";
/**
 * Description of Controller
 *
 * @author antonio
 */
class Controller {
    
    /**
     *
     * @var Model 
     */
    public $model;
    
    /**
     * 
     * @param type $user
     * @param type $pass
     */
    public function __construct($user,$pass) {
        $this->model = new Model($user,$pass);
    }
    
    
    /**
     * 
     * @return type
     */
    public function errorMsg(){
        $result = array('ERROR'=>$this->model->except,'results'=>'');
        return json_encode($result);
    }
    
    /**
     * 
     * @param type $ListCountries
     * @return type
     */
    public function successMsg($ListCountries){
        $result = array('ERROR'=>'','results'=>$ListCountries);
        if (is_array($ListCountries)){
                return json_encode($result);
        }else{
            $result = array('ERROR'=>$ListCountries,'results'=>'');
            return json_encode($result);
        }
    }
    
    /**
     * 
     * @return string
     */
    public function getCountries(){
        if (empty($this->model->except)){
            $ListCountries = $this->model->getListCountries();
            return $this->successMsg($ListCountries);
        }else{
            return $this->errorMsg();
        }
    }
   
    /**
     * 
     * @param int $id
     * @return string
     */
    public function getCountry($id = 0){
        if (empty($this->model->except)){
            $ListCountries = $this->model->getCountry($id);
            return $this->successMsg($ListCountries);
        }else{
             return $this->errorMsg();
        }
    }
}
