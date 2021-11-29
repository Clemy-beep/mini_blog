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

        $query = $connexion->prepare(" SELECT COUNT(*) FROM `articles` WHERE `author`=:username;");
        $query->execute(["username" => $username]);
        $total_articles =$query->fetch(PDO::FETCH_LAZY);
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }
