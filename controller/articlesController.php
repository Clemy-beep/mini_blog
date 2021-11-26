<?php 

require_once '/home/stagiaire16/Documents/mini_blog/config/config.php';
require_once '/home/stagiaire16/Documents/mini_blog/model/publish_article.php';
require_once '/home/stagiaire16/Documents/mini_blog/model/modify_article.php';
require_once '/home/stagiaire16/Documents/mini_blog/model/deleteModel.php';

if (!isset($_GET['action'])) {
    die("Params needed");
}

$action = $_GET['action'];

switch($action){
    case 'publish':
        publish();
        break;
    case 'modify':
        modify();
        break;
    case 'delete':
        delete();
        break;
    default:
        header('Location: /vues/articles_list.php');
        break;
}

function publish(){
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
}

function modify(){
    if(isset($_POST['id'],$_POST['title'], $_POST['author'], $_POST['content'])){
        $isReadyModify = modifyArticle($_POST['id'], $_POST['title'],$_POST['author'],  $_POST['content']);
        if(!$isReadyModify['exist']){
            header("Location: /vues/articles/modif_success.php");
        } 
        else header("Location: /vues/articles/modif_error.php");
    }
}

function delete(){
    $id= $_GET['id'];
    if(isset($id)){
        $isDelete = deleteArticle($id);
        if($isDelete['exist']){
            header('Location: /vues/articles/delete_error.php');
        }
        else header('Location: /vues/articles/delete_success.php');
    }
    else die('missing id');
}

