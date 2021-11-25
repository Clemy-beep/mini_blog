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

        $query = $connexion->prepare("SELECT * FROM `articles` WHERE `author` = :author AND isDeleted = 0 ORDER BY `published_on` DESC;");
        $query->execute(["author" => $_SESSION['user']['username']]);
        $response =$query->fetchAll();
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }