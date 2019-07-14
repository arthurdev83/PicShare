<?php

require_once "bootstrap.php";

class CategoryController extends Api
{

    private $categoryRepository;

    function __construct($entityManager) {
        parent::__construct($entityManager);
        $this->categoryRepository = $entityManager->getRepository('Category');
    }
    
    public function getAll(){
        $categories = $this->categoryRepository->findAll();
        Tool::returnJSON($categories);
    }

}
