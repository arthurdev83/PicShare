<?php
use \Firebase\JWT\JWT;

require_once "bootstrap.php";


class Api
{

    protected $entityManager;
    protected $mailer;

    function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->mailer = new MailManager();
    }

    protected function tokenValidation(){
        $headers = apache_request_headers();

        if(!isset($headers['JWT'])){
            Tool::returnJSON("Access denied", 401);
        }
        $jwt = $headers['JWT'];
        try {
            $decoded = JWT::decode($jwt, JWTKEY, array('HS256'));
            $userRepository = $this->entityManager->getRepository('User');
            $user = $userRepository->findOneById($decoded->data);
            if($user == null){
                Tool::returnJSON("Access denied TRY", 401);
            }
            return $user;
        }
        catch (Exception $e){
            Tool::returnJSON("Access denied CATCH", 401);
        }
    }

    protected function generateJWT($user){
        $iss = "https://www.powercoaching.fr/";
        $aud = "https://getup.agency";
        $iat = 1356999524;
        $nbf = 1357000000;

        $token = array(
            "iss" => $iss,
            "aud" => $aud,
            "iat" => $iat,
            "nbf" => $nbf,
            "data" => $user->getId()
        );
        return JWT::encode($token, JWTKEY);
    }


}