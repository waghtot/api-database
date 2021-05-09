<?php
class ScurityCheck extends Controller{

    public function __construct(){
        return $this->index();
    }

    public function index(){
        $data = apache_request_headers();
        if(isset($data['APP-SECURITY-AUTH'])){
            $signature = base64_encode(hash_hmac('sha256', file_get_contents('php://input'), SIGNATURE, true));
            if($data['APP-SECURITY-AUTH'] !== $signature){
                die;
            }
        }else{
            die;
        }
    }
}