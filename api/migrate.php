<?php # index.php
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Migrations\Migration;
use Doctrine\DBAL\Migrations\OutputWriter;

require_once 'vendor/autoload.php';

$nl = PHP_SAPI == 'cli' ? PHP_EOL : '<br>'; // Optional will be used for output

$to = null; // Optional integer - migrate to version, if null - will migrate to latest available version
#region Optional get argument
$index = PHP_SAPI == 'cli' ? 1 : 'to';
$arguments = PHP_SAPI == 'cli' ? $argv : $_REQUEST;
$to = isset($arguments[$index]) && filter_var($arguments[$index], FILTER_VALIDATE_INT) ? intval($arguments[$index]) : null;
#endregion

#region Doctrine Connection
// Silex: $app['db']
// Symfony controller: $this->get('database_connection')
$db = DriverManager::getConnection(array(
    'dbname' => 'quevisiter',
    'user' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    'charset' => 'utf8',
    'driverOptions' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
));

#endregion

#region Config
$config = new Configuration($db /*, new OutputWriter(function ($message) { echo $message . PHP_EOL; })*/); // OutputWriter is optional and by default do nothing, accepts closure for writing logs

//$config->setName('My Migrations'); // Optional name for your migrations
$config->setMigrationsTableName('doctrine_migration_versions'); // Table name that will store migrations log (will be created automatically, default name is: doctrine_migration_versions)
$config->setMigrationsNamespace('GoApero\\Migrations'); // Namespace of your migration classes, do not forget escape slashes, do not add last slash
$config->setMigrationsDirectory('migrations'); // Directory where your migrations are located
$config->registerMigrationsFromDirectory($config->getMigrationsDirectory()); // Load your migrations
#endregion

$migration = new Migration($config); // Create Migration based on provided configuration

$versions = $migration->getSql($to); // Retrieve SQL queries that should be run to migrate you schema to $to version, if $to == null - schema will be migrated to latest version

#region Some dummy output
foreach ($versions as $version => $queries) {
    echo 'VERSION: ' . $version . $nl;
    echo '----------------------------------------------' . $nl . $nl;

    foreach ($queries as $query) {
        echo $query . $nl . $nl;
    }

    echo $nl . $nl;
}
#endregion

try {
    $migration->migrate($to); // Execute migration!
    echo 'DONE' . $nl;
} catch (Exception $ex) {
    echo 'ERROR: ' . $ex->getMessage() . $nl;
}