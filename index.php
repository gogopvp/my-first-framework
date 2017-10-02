<?php
session_start();
$massageForUser="Вы вошли как гость";
$requestURI = $_SERVER["REQUEST_URI"];
$needle = ".php";
$position = strripos ( $requestURI , $needle);

if ($position){
    //foo($requestURI);
    $requestURI = str_replace(".php", "", "$requestURI");
    header("Location:". $requestURI);
}
$requestURI= explode('/', $requestURI);

$controller = $requestURI['1'];
$action = $requestURI['2'];

switch ($controller){

    case "authentication":
        include("/controllers/authentication.php"); break;
    case "registration":
        include("/controllers/registration.php"); break;
    case "catalog":
        include ("/controllers/catalog.php"); break;
    case "basket":
        include ("/controllers/basket.php"); break;
    case "":
        header("Location: authentication/index"); break;
    default: header("Location: authentication/index");
}
?>