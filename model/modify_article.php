<?php 

require_once("../config/config.php");



$error = [
    "message" => "",
    "exist" => false
];

function modifyArticle($id, $title, $author, $content) {
  
    global $connexion;

    global $error;
    try {
        $query = $connexion->prepare("UPDATE `articles` SET `title`=:title, `content`= :content WHERE (`author`=:author AND `id`=:id);");
        $response = $query->execute(['id' => $id,'title' => $title, 'author' => $author,'content' => $content,]);

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