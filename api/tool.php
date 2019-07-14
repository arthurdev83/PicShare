<?php

class Tool
{

    public static function returnJSON($data = "", $code = 200) {
        header('Content-type: application/json');
        http_response_code($code);

        /*echo (json_encode($data));*/

        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($data, 'json');
        echo $jsonContent;

        exit;
    }

}

?>