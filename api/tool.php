<?php
use JMS\Serializer\SerializationContext;

class Tool
{

    public static function returnJSON($data = "", $code = 200, $groups = null) {
        header('Content-type: application/json');
        http_response_code($code);

        /*echo (json_encode($data));*/

        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        if($groups != null){
            $jsonContent = $serializer->serialize($data, 'json', SerializationContext::create()->setGroups($groups));
        }else{
            $jsonContent = $serializer->serialize($data, 'json');
        }
        echo $jsonContent;

        exit;
    }

}

?>