<?php

require_once("../config/config.php");

if (!isset($_SERVER["HTTP_REFERER"])) {
    die("access restricted");
}

if(! $_SERVER["HTTP_REFERER"] === "AccountController.php") {
    die("access restricted");
}

$error = [
    "message" => "",
    "exist" => false
];

function browseCategories($categories){
    global $error;
    global $connexion;
    $categories = htmlspecialchars(strip_tags($categories));
    global $response;

   try
   { 
       $query = $connexion->prepare("SELECT * FROM `articles` WHERE `category` = :category;");
       $query->execute(["category" => $categories]);
       $response= $query->fetchAll();
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
    catch(Exception $err){
        $error['message'] = $err;
        $error['exist']=true;
        echo $error['message'];
        die();
    }
    return $error;
}