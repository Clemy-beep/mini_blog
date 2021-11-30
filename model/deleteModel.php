<?php

require_once "../config/config.php";

$error= [
    "message" => "",
    "exist" => false
];

function deleteArticle($articleId){
    global $connexion;
    global $error;

    try {
        $query = $connexion->prepare("UPDATE `articles` SET `isDeleted` = 1 WHERE `article_id`= :id;");
        $response = $query->execute(['id' => $articleId]);

    } catch ( Exception $err) {
        $error["message"] .= $err;
        $error["exist"] = true;
        return $error;
    }

    if (!$response) {
        $error["message"] = "An error occured during article deletion";
        $error["exist"] = true;
        return $error;
    }
    return $error;
}