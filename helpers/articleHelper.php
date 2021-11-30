<?php

function getArticle($id): array
{
    global $connexion;
    global $error;
    try {
        $query = $connexion->prepare("SELECT * FROM `articles` WHERE article_id=:id");
        $query->execute(['id' => $id]);
        
    } catch (\PDOException $err) {
        $error_code = $err->getCode();
        $error_msg = $err->getMessage();
        $error["exist"] = true;
        $error['message']= $error_msg;

        return $error;
    }

    $response = $query->fetchAll();

    if (!$response) {
        $error["message"] = "Aucun article trouvé";
        $error["exist"] = true;

        return $error;
    }

    return $response[0];
}