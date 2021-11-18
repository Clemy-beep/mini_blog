<?php
require_once '../config/config.php';
require_once 'log_infos.php';

$title = isset($_POST["title"]) ? $_POST['title'] : null;
$content = isset($_POST["content"]) ? $_POST['content'] : null;

    try{
        if(isset($title) && isset($content)){
        $stmt = $pdo->prepare("INSERT INTO `articles`(`title`, `content`, `published_on`, `author`) VALUES (:title, :content,NOW(), :author)");
        $stmt->execute(['title' => $title , 'content' => $content, 'author' =>  $loggeduser,]);
        echo "success";
        }
        else{
            echo"<span>Plese fill all the fields before submitting your article.</span>";
        }
    }
    catch(Exception $err){
        echo $err;
    }
?>