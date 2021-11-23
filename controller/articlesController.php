<?php 

require_once '../config/config.php';
require_once '../model/publish_article.php';
require_once '../model/categoriesModel.php';

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

if (isset($_POST['categories'])){
    $isValid = browseCategories(
        $_POST['categories']
    );
    if($isValid['exist']){
        echo '<img src="../resources/empty.png" alt="emptyalien" id="yo">
        <div class="container2">
        <h1>Oh no ! <br></h1>
        <h2>Something went wrong during browsing. Please try again later.</h2>
        <a href="../vues/articles/articles_list.php" style="text-decoration: none;">
            <span id="articleslink">See all articles</span> </a>
        </div>';
    }
    else{
        $row = array();
        $title = "";
        $author ="";
        $content="";
        $date = '';
        $category = "";

        if(!empty($response)){
            foreach($response as $row){

                $date= $row['published_on'];
                $timestamp = strtotime($date);
    
                $title= $row['title'];
                $published_on = date("d-m-Y", $timestamp);
                $author= $row["author"];
                $content= $row['content'];
                $category= $row['category'];
                echo ' 
                <article>
                    <div class="article-title">'. $title .'</div>
                    <div class="article-content">'.$content .' </div>
                    <div class="article-infos">
                    <diV class="author"><i class="fas fa-user-edit"></i>'.$author .'</diV>
                    <div class="date"><i class="fas fa-clock"> </i>'. $published_on .'</div>
                    <div class="category"><i class="fas fa-box"> </i> '.$category .'</div>
                    </div>
                </article>';
            }
        } else{

            echo '
            <img src="../../resources/empty.png" alt="emptyalien" id="yo">
            <div class="container2">
            <h1>No article found ! <br></h1>
            <h2> There isn\'t any article in this category yet. But feel free to create one : </h2>
            <a href="./add_articles.php" style="text-decoration: none;">
                <span id="articleslink">Create your article</span> </a>
            </div>
            ';
        }
    }
}