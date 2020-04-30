<?php

class Controller
{

    private $request;
    private $client;
    private $project;
    private $user;
    private $password;
    private $sendData;
    private $connection;
    private $api;

    // section setter
    public function setRequest()
    {
        $this->request = json_decode(file_get_contents('php://input'));
        error_log('Controller::setRequest: '.print_r($this->request, 1));
    }

    public function setData(){
        $this->sendData = new stdClass();
        $this->sendData->request = json_encode($this->request);
    }

    public function setClient($input)
    {
        $this->client = $input; 
    }

    public function setProject($input)
    {
        $this->project = $input;
    }

    public function setUser($input)
    {
        $this->user = $input;
    }

    public function setPassword($input)
    {
        $this->password = $input;
    }

    public function setConnection($string)
    {

        $this->connection = self::getConnectionConfig($string);
    }


    // section getter

    public function getRequest()
    {
        return $this->request;
    }

    public function getData()
    {
        return $this->sendData;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getProject()
    {
        return $this->project;

    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getConnectionConfig($string)
    {
        return parse_ini_file('/etc/config/dbc.ini')[$string];
    }

    public function getConfiguration()
    {
        return parse_ini_file('/etc/config/dbc.ini')['dbcon'];
    }
}