<?php
$error = [
    "message" => "",
    "exist" => false
    ];

    global $connexion;

    try{

        $query = $connexion->prepare("SELECT * FROM `users` WHERE `username` = :username AND `email` = :email");
        $query->execute(["username" => $username, "email" => $email]);
        $response =$query->fetchAll();
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }
