<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Proxy\AbstractProxyFactory;
use Doctrine\DBAL\Logging\DebugStack;


$hhh = $_SERVER['HTTP_HOST'];

define("BASE", "/PicShare/api");


define("STRIPE_KEY", "sk_test_1zWFnyKGUFIGSbWJb7BrqnMV00ZNt83BGI");

define("BASE_MEDIAS", "medias/");
define("JWTKEY", "mASUperCLe");


require_once "tool.php";
require_once "request.php";
require_once "vendor/autoload.php";

//Import Code
foreach (scandir('core/') as $filename) {
    $path = 'core/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

//Import all controllers
foreach (scandir('controller/') as $filename) {
    $path = 'controller/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

// Create a simple "default" Doctrine ORM configuration for Annotations
Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, null, null, false);



// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn  = array(
    'dbname' => 'quevisiter',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    'charset'  => 'utf8mb4'
);
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
