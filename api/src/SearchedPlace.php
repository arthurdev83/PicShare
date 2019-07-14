<?php

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Expose;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Groups;


class SearchedPlace
{

    /**
     * @Expose
     */
    private $category;

    /**
     * @Expose
     */
    private $places;

    public function __construct() {
        $this->places = new ArrayCollection();
    }


    public function setPlaces($places){$this->places = $places;} 
    public function addPlace(Place $place){$this->places[] = $place;}

    public function setCategory(Category $category){$this->category = $category;} 
    public function getCategory(){return $this->category;} 

}