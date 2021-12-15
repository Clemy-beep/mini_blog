<?php
require_once '../config/config.php';


$error = [
    "message" => "",
    "exist" => false
];

$aReponse = [];
$aReponse= getForumCat();

print(json_encode($aReponse));

function getForumCat():array{
    global $connexion;
    global $error;

try {
    $query = $connexion->prepare("SELECT * FROM `forum_categories`;");
    $query->execute();
} catch (Exception $err) {
    $error['message'] = $err;
    $error['exist'] = true;
    echo $error['message'];
    die();
}
$response = $query->fetchAll();


return $response;
}