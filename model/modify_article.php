<?php 

require_once("../config/config.php");



$error = [
    "message" => "",
    "exist" => false
];

function modifyArticle($articleId, $title, $content) {
  
    global $connexion;

    global $error;
    try {
        $query = $connexion->prepare("UPDATE `articles` SET `title`=:title, `content`= :content WHERE `article_id`=:id;");
        $response = $query->execute(['id' => $articleId,'title' => $title,'content' => $content,]);

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