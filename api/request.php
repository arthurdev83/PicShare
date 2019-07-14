<?php
use \Firebase\JWT\JWT;

class Request
{

    public static function get($n, $d = null) {
        $data = json_decode(file_get_contents("php://input"));
        if($n == null){
            return $data;
        }
        if(isset($_POST[$n])){
            return $_POST[$n];
        }else if(isset($data->$n)){
            return $data->$n;
        }
        else if(isset($_GET[$n])){
            return $_GET[$n];
        }
        else if(isset($_FILES[$n])){
            return $_FILES[$n];
        }else{
            return $d;
        }
    }

}

?>