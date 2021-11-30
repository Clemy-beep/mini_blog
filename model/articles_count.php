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

        $query = $connexion->prepare(" SELECT COUNT(*) FROM `articles` INNER JOIN `users` ON `articles`.`author_id` = `users`.`id` WHERE `articles`.`author_id` = :id AND `articles`.`isDeleted` = 0;");
        $query->execute(["id" => $_SESSION['user']['id']]);
        $total_articles =$query->fetch(PDO::FETCH_LAZY);
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }
