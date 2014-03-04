<?php


require_once "../app/Controller.php";
/**
 * 
 */
class CountryApiTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     **/
    public function it_should_return_error_access_denied_for_user()
    {
        $result = array('ERROR'=>'SQLSTATE[28000] [1045] Access denied for user \'antonio\'@\'localhost\' (using password: YES)','results'=>'');
        $result = json_encode($result);
        $controller = new Controller('antonio','antonio');
        /*Pasamos el id 0 que sabemos que no puede existir */
        $this->assertJsonStringEqualsJsonString($result,$controller->getCountries());
    }
    
    /**
     * @test
     */
    public function it_should_return_empty_when_table_is_empty()
    {
        $result = array('ERROR'=>'','results'=>Array());
        $result = json_encode($result);

        $controller = new Controller('root','');
        /*Pasamos el id 0 que sabemos que no puede existir */
        $this->assertJsonStringEqualsJsonString($result,$controller->getCountry(0));
    }


    /**
     * @test
     */
    public function it_should_return_list_countries()
    {
        $result = '{"ERROR":"","results":[{"id_pais":"1","0":"1","nombre":"Alemania","1":"Alemania","code":"DE","2":"DE"},{"id_pais":"2","0":"2","nombre":"Italia","1":"Italia","code":"IT","2":"IT"},{"id_pais":"3","0":"3","nombre":"Francia","1":"Francia","code":"FR","2":"FR"},{"id_pais":"4","0":"4","nombre":"Portugal","1":"Portugal","code":"PT","2":"PT"}]}';
        $controller = new Controller('root','');
        $this->assertJsonStringEqualsJsonString($result,$controller->getCountries());
    }

    /**
     * @test
     **/
    public function it_should_return_only_country()
    {
        $result = '{"ERROR":"","results":[{"id_pais":"1","0":"1","nombre":"Alemania","1":"Alemania","code":"DE","2":"DE"}]}';

        $controller = new Controller('root','');
        $this->assertJsonStringEqualsJsonString($result,$controller->getCountry(1));
    }
}
