<?php 

require_once("../config/config.php");

session_start();


$error = [
    "message" => "",
    "exist" => false
];

function modifyArticle($id, $title, $content, $author) {
  
    global $connexion;

    global $error;
    try {
        $query = $connexion->prepare("UPDATE `articles` SET `title`=:title, `content`= :content WHERE (`author`=:author AND `id`=:id);");
        $response = $query->execute(['id' => $id, 'content' => $content, 'title' => $title, 'author' => $author]);

    } catch ( Exception $err) {
        $error["message"] .= $err;
        $error["exist"] = true;
        var_dump($error);
        die();
        return $error;
    }

    if (!$response) {
        $error["message"] = "An error occured during article modification";
        $error["exist"] = true;
        return $error;
    }
    return $error;
}