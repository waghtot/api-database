<?php
class doRequest extends Controller{

    public function __construct($data){
        $this->setConnection($data->connection);

        if(!empty($data->connection) && !empty($data->procedure)){
            if(!empty($data->params)){
                $parameters = '(';
                foreach($data->params as $value){
                        if(isset($value->value)){
                            $val = $value->value;
                        }else{
                            $val = $value;  
                        }

                    $parameters .= '\''.$val.'\', ';
                }
                $parameters = substr($parameters, 0, strlen($parameters)-2);
                $parameters .= ')';
            }else{
                $parameters = '()';
            }
	    //error_log('connection: '.$this->getConnection().' '.$data->connection);
            $call = 'CALL '.$this->getConnection().'.'.$data->procedure.$parameters;
            error_log($call);
            $data = new Database();
            $data->query($call);
            $this->res = $data->resultset();
            echo json_encode($this->res);
        }
    }

}

?>
