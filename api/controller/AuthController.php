<?php
require_once "bootstrap.php";

class AuthController extends Api
{

    private $userRepository;

    function __construct($entityManager) {
        parent::__construct($entityManager);

        $this->userRepository = $this->entityManager->getRepository('User');
    }


    public function login(){
        $data = Request::get(null);

        $user = $this->userRepository->findOneBy(array('email' => $data->email, 'password' => md5($data->password)));
        if($user == null){
            Tool::returnJSON(array('message' => "Identifiants incorrectes"), 400);
        }
        $user->setJwt($this->generateJWT($user));
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        Tool::returnJSON($user);
    } 

    public function register(){
        $data = Request::get(null);

        $user = $this->userRepository->findOneBy(array('email' => $data->email, 'password' => md5($data->password)));
        if($user != null){
            $this->login();
        }else{
            $userEmail = $this->userRepository->findOneBy(array('email' => $data->email));
            if($userEmail != null){
                Tool::returnJSON(array('message' => "Adresse mail déjà utilisé"), 400);
            }else{

                $user = new User();
                $user->setName($data->name);
                $user->setEmail($data->email);
                $user->setPassword(md5($data->password));

                $user->setJwt($this->generateJWT($user));

                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $this->login();
            }
        }

    }

}