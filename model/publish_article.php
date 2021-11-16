<?php
require_once '../config/config.php';
require_once 'log_infos.php';

$title = isset($_POST["title"]) ? $_POST['title'] : null;
$content = isset($_POST["content"]) ? $_POST['content'] : null;

    try{
        $stmt = $pdo->prepare("INSERT INTO `articles` (`title`, `content` , `published_on, `author`) VALUES (:title, :content,NOW(), :author)");
        $stmt->execute(['title' => $title , 'content' => $content, 'author' =>  $loggeduser,]);
        include('../vues/article_added.html');
    }
    catch(Exception $err){
        echo $err;
    }
?>