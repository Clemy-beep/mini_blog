<?php
require_once '../config/config.php';

$title = isset($_POST["title"]) ? $_POST['title'] : null;
$content = isset($_POST["content"]) ? $_POST['content'] : null;
$author= $_SESSION['user'];

    try{
        $stmt = $pdo->prepare("INSERT INTO `articles` (`title`, `content` , `published_on, `author`) VALUES (:title, :content,NOW(), :author)");
        $stmt->execute(['title' => $title , 'content' => $content, 'author' =>  $author,]);
        include('../vues/article_added.html');
    }
    catch(Exception $err){
        echo "$err";
    }
?>