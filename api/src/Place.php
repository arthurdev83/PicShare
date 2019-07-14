<?php

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;


/**
 * @ORM\Entity 
 * @ORM\Table(name="places")
 */
class Place
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
    private $title;

    /** 
    * @ORM\Column(type="string", nullable=true)
    */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category", fetch="EAGER",cascade={"persist"})
     * @ORM\JoinColumn(name="cetegory_id", referencedColumnName="id")
     * @Expose
     */
    private $category;

    public function __construct() {}
    public function getId(){return $this->id;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;} 

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;} 

    public function getCategory(){return $this->category;}
    public function setCategory(Category $category){$this->category = $category;} 

}