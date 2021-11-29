<?php
require_once '../config/config.php';

$error = [
    "message" => "",
    "exist" => false
];

function updateAccount($username, $id, $email)
{
    global $connexion;
    global $error;

    try {
        $query = $connexion->prepare("UPDATE `users` SET `username` = :username, `email` = :email WHERE `id`= :id;");
        $response = $query->execute(["username" => $username, "id" => $id, "email" => $email]);
        session_start();
        unset($_SESSION['user']['username'], $_SESSION['user']['email']);
        $_SESSION['user']['username']= $username;
        $_SESSION['user']['email']=$email;
    } catch (Exception $err) {
        $error['message'] = $err;
        $error['exist'] = true;
        return $error;
    }

    if (!$response) {
        $error['message'] = "An error occured while updating your account. Please try again later";
        $error['exist'] = true;
    }
   
    return $error;
}
