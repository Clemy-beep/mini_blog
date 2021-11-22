<?php 

require_once '../config/config.php';
require_once '../model/publish_article.php';
require_once '../model/fetch_articles.php';

if(isset(
    $_POST['title'],
    $_POST['content'],
    $_POST['category']
)){
    $isValid= checkArticle(
        $_POST['title'],
        $_POST['content'],
        $_POST['category']
    );
    if($isValid['exist']){
        header("Location: /vues/articles/publish_error.php");
    }
    else header("Location: /vues/articles/article_added.php");
}