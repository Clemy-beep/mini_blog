<?php
$error = [
    "message" => "",
    "exist" => false
    ];

    global $connexion;
    $row = array();
    $title = "";
    $author ="";
    $content="";
    $date = '';
    $category = "";

    try{

        $query = $connexion->prepare("SELECT * FROM `articles` INNER JOIN `users` ON `articles`.`author_id` = `users`.`id` WHERE `articles`.`author_id` = :id AND `articles`.`isDeleted` = 0 ORDER BY `published_on` DESC;");
        $query->execute(["id" => $_SESSION['user']['id']]);
        $response =$query->fetchAll();
      
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }