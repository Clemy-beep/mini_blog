<?php

require_once '../config/config.php';

session_start();

$error = [
    "message" => "",
    "exist" => false
];

function verifypwd($ancientpwd, $newpwd)
{
    global $connexion;
    global $error;

    try {
        $query = $connexion->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $query->execute(['id' => $_SESSION['user']['id']]);
        $response = $query->fetchAll();
        $decryptpwd = password_verify($ancientpwd, $response[0]['pwd']);
    } catch (Exception $err) {
        $error['message'] = $err->getMessage();
        $error['exist'] = true;
        var_dump($error);
        die;
    }

    if ($decryptpwd) {
        modifypwd($newpwd);
    } else {
        $error['message'] = "wrong password";
        $error["exist"] = true;
        return $error;
    }
    return $error;
}

function modifypwd($pwd)
{
    global $connexion;
    global $error;

    $pwd= password_hash($pwd, PASSWORD_DEFAULT);

    try {
        $query = $connexion->prepare("UPDATE `users` SET `pwd`=:pwd WHERE id=:id");
        $result = $query->execute(["pwd" => $pwd, "id" => $_SESSION['user']['id']]);
    } catch (Exception $err) {
        $error['message'] = $err->getMessage();
        $error['exist'] = true;
        var_dump($error);
        die;
    }
    if (!$result) {
        $error['message'] = "an error occured while modification";
        $error['exist'] = true;
        return $error;
    }
    return $error;
}
