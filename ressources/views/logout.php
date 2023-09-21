<?php

session_start(); //on récupère la session à détruire

$_SESSION = array(); //on récupère les informations contenues dans session 
session_destroy();
header('Location:/index.php ');
die();
