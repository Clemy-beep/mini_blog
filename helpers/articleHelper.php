<?php

function getArticle($id): array
{
    global $connexion;
    global $error;
    try {
        $query = $connexion->prepare("SELECT * FROM `articles` WHERE id=:id");
        $query->execute(['id' => $id]);
        
    } catch (\PDOException $err) {
        $error_code = $err->getCode();
        $error_msg = $err->getMessage();
        $error["exist"] = true;
        $error['message']= $error_msg;

        return $error;
    }

    $response = $query->fetch(PDO::FETCH_ASSOC);

    if (!isset($response['id'])) {
        $error["message"] = "Aucun article trouvé";
        $error["exist"] = true;

        return $error;
    }

    return $response;
}