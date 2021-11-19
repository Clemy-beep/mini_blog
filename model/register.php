<?php
require_once("../config/config.php");

if (!isset($_SERVER["HTTP_REFERER"])) {
    die("access restricted");
}

if(! $_SERVER["HTTP_REFERER"] === "AccountController.php") {
    die("access restricted");
}

$error = [
    "message" => "",
    "exist" => false
];

function checkSignUp($username, $password, $email)
{
    global $error;
    $username =  htmlspecialchars(strip_tags($username));
    $password =  htmlspecialchars(strip_tags($password));
    $email =  htmlspecialchars(strip_tags($email));

 
    if (
        empty($username) || empty($password) || empty($email)
    ) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["message"] .= "Saisissez un adresse email valide";
        $error["exist"] = true;
        echo $email;
        die();
        return $error;
    }

    $password = passwordHash($password);

    addUser($username, $password, $email);
    
    return $error;
}

function addUser($username, $password, $email)
{
    global $connexion;
    global $error;

    $query = $connexion->prepare("INSERT INTO `users`(`username`,`pwd`,`email`)  VALUES (:username, :pwd, :email)");
    $response = $query->execute(["username" => $username,"pwd" => $password,  "email" => $email]);
    if (!$response) {
        $error["message"] .= "Une erreur s'est produite durant l'insertion";
        $error["exist"] = true;
    }
}

function passwordHash($password) {
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    return $hash_password;
}