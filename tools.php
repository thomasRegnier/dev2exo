<?php
function dbConnect(){

    try{
        return  $db = new PDO('mysql:host=localhost;dbname=blogDev2;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

}
$db = dbConnect();
require_once __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
