<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;
/**
 * @ORM\Entity
 * @ExclusionPolicy("all")
 * @ORM\Table(name="users")
 **/
class User
{

    /** @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @Expose
     **/
    private $id;

    /** @ORM\Column(type="string") @Expose**/
    private $name;


    /** @ORM\Column(type="string") @Expose **/
    private $email;

    /** @ORM\Column(type="string") **/
    private $password;

    
    /** @Expose **/
    private $jwt;



    public function __construct() {

    }

 
    public function getId(){return $this->id;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;} 

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;} 

    public function getJwt(){return $this->jwt;}
    public function setJwt($jwt){$this->jwt = $jwt;}


}