<?php

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;


/**
 * @ORM\Entity 
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
    * @ORM\Id 
    * @ORM\Column(type="integer") 
    * @ORM\GeneratedValue
    **/
    private $id;

    /** 
    * @ORM\Column(type="string", nullable=true)
    */
    private $name;

    public function __construct() {}
    public function getId(){return $this->id;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;} 

}