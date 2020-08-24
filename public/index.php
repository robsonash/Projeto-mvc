<?php
session_start();
//php -S localhost:8080 comando para abrir um  terminal 
//composer dump-autoload comando para trazer o composer o autoload
require '../vendor/autoload.php';

define ("URL_BASE", "http://cursomvc.com/");
$app = new \App\Core\App();