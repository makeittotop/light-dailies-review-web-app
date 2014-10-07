<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    ini_set('html_errors', true);

# Connecting
require 'Predis/Autoloader.php';
Predis\Autoloader::register();

$client = new Predis\Client();
$client->set('foo', 'bar');
$value = $client->get('foo');

echo($value);
?>


