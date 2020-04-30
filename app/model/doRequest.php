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

            $call = 'CALL '.$this->getConnection().'.'.$data->procedure.$parameters;

            error_log('show me call: '.$call);
            // die;
            $data = new Database();
            $data->query($call);
            $this->res = $data->resultset();
            error_log($call.' response: '.print_r($this->res, 1));
            echo json_encode($this->res);
        }
    }

}

?>
