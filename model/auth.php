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

function checkLogin($email, $password)
{
    global $error;
    $email =  htmlspecialchars(strip_tags($email));
    $password =  htmlspecialchars(strip_tags($password));

    if ( empty($email) || empty($password)) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["message"] .= "Saisissez un adresse email valide";
        $error["exist"] = true;

        return $error;
    }

    getPasswordUser($email, $password);


    return $error;
}


function getPasswordUser($email, $password){
    global $connexion;
    global $error;

    $query= $connexion->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $query->execute(["email" => $email]);
    $result= $query->fetch(PDO::FETCH_ASSOC);

    $goodpwd= password_verify($password,$result['pwd']);

    if(!$goodpwd){
        $error['message']= "Wrong password";
        $error['exist']=true;
    }

    return $error;
}