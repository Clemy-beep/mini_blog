<?php
$error = [
    "message" => "",
    "exist" => false
    ];
    
    $username=$_SESSION['user']['username'];
    $email = $_SESSION['user']['email'];
    $total_articles =0;
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
