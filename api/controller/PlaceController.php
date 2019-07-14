<?php

require_once "bootstrap.php";

class PlaceController extends Api
{

    private $placeRepository;

    function __construct($entityManager) {
        parent::__construct($entityManager);
        $this->placeRepository = $entityManager->getRepository('Place');
    }
    
    private function categExist(){
        
    }

    public function getAll(){
        $places = $this->placeRepository->findAll();

        $searchedPlaces = array();


        foreach ($places as $key => $place) {
            $c = $place->getCategory();

            $found = false;
            foreach ($searchedPlaces as $key => $sp) {
                if($sp->getCategory()->getId() == $c->getId()){
                    $sp->addPlace($place);
                    $found = true;
                    break;
                }
            }

            if(!$found){
                $nsp = new SearchedPlace();
                $nsp->setCategory($c);
                $nsp->addPlace($place);
                $searchedPlaces[] = $nsp;
            }

        }


        Tool::returnJSON($searchedPlaces, 200);
    }

}
