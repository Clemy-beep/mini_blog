<?php
require_once '/home/stagiaire16/Documents/blog/config/config.php';
require_once '/home/stagiaire16/Documents/blog/model/auth.php';

session_start();
$title = isset($_POST["title"]) ? $_POST['title'] : null;
$content = isset($_POST["content"]) ? $_POST['content'] : null;
$category = isset($_POST['category']) ? $_POST['category']: null;
$author= isset($_POST['author']) ? $_POST['author']: null;

$error = [
    "message" => "",
    "exist" => false
];

function checkArticle($title, $content, $category){
    global $error;
    global $connexion;
    global $response;



    if(empty($title) || empty($content) || empty($category)){
        $error['message']= "A field is still empty.";
        $error['exist']= true;

        return $error;
    }

    $query = $connexion->prepare("INSERT INTO `articles`(`title`, `content`, `published_on`, `author_id`, `category`) VALUES (:title, :content,NOW(), :author, :category)");
    $response=$query->execute(['title' => $title , 'content' => $content, 'author' => $_SESSION['user']['id'], 'category' => $category]);
    
    if(!$response){
        $error["message"] .= "Une erreur s'est produite durant l'insertion";
        $error["exist"] = true;
        
        return $error;
    }

    return $error;
}