<?php

$error = [
    "message" => "",
    "exist" => false
    ];

    global $connexion;
    $row = array();
    $title = "";
    $author = "";
    $content="";
    $date = '';
    $category = "";
    $id;

    try{

    $query = $connexion->prepare("SELECT * FROM `articles` INNER JOIN `users` ON `users`.`id`=`articles`.`author_id` WHERE  isDeleted = 0 ORDER BY `published_on` DESC;");
    $query->execute();
    $response =$query->fetchAll();
    }
     catch(Exception $err){
         $error['message'] = $err;
         $error['exist']=true;
         echo $err;
         die();
     }