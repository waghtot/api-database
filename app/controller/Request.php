<?php

class Request extends Controller{
    public $data = array();
    public $conection;
    public $procedure;
    public $params = array();
    public $response;

    public function __construct(){
        $this->setRequest();
        $data = new stdClass();
        $data = $this->getRequest();
        if(!empty($data))
        {
            new doRequest($data);
        }else{
            return false;
        } 
    }
}

?>
