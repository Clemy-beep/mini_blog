<?php

require_once("../../config/config.php");

session_start();
include '../../model/usersArticlesModel.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My articles</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once '../templates/loggedHeader.php';
    ?>

    <div class="title">
        <img id="articles-icon" src="../../resources/myarticlesicon.svg" height="42px" width="42px" />
        <h1>My articles</h1>
    </div>
    <div id="body">
        <div class="main">
            <?php
            if (!empty($response)) {
                foreach ($response as $row) {

                    $date = $row['published_on'];
                    $timestamp = strtotime($date);
                    $id = $row['id'];
                    $article_id = $row['article_id'];
                    $title = $row['title'];
                    $published_on = date("d-m-Y", $timestamp);
                    $author = $row["username"];
                    $content = $row['content'];
                    $category = $row['category'];
                    echo ' 
                <article>
                    <div class="article-title">' . $title . '</div>
                    <div class="article-options">
                        <div class="isUserAuthor" onclick="location.href=\'modify_article.php?id=' . $article_id . '\';"><i class="fa-solid fa-pen-to-square"></i> Edit</div>
                        <div class="isUserAuthor" id= "deleteButton' . $article_id . '"onclick="deleteArticle(' . $article_id . ')" ><i class="far fa-trash-alt"></i> Delete</div>
                    </div>
                    <div class="article-content" id="id' . $article_id . '">' . $content . ' </div>
                    <div class="article-infos">
                        <diV class="author"><i class="fas fa-user-edit"></i>' . $author . '</diV>
                        <div class="date"><i class="fas fa-clock"> </i>' . $published_on . '</div>
                        <div class="category"><i class="fas fa-box"> </i> ' . $category . '</div>
                        <div style="cursor: pointer;" class="deployButton" title="Double click to show content." id= "deployButton' . $article_id . '" onclick="deployText(' . $article_id . ')" ><i class="fas fa-caret-down"> See more</i> </div>
                    </div>
                </article>';
                }
            } else {
                echo '
            <img src="../../resources/empty.png" alt="emptyalien" id="yo">
            <div class="container2">
                <h1>You haven\'t published anything yet ! <br></h1>
                <h2>We are eager to read your theories, share them with us.</h2>
                <a href="./add_articles.php" style="text-decoration: none;">
                <span id="articleslink">Create your article</span> </a>
            </div>
            ';
            }
            ?>
        </div>
    </div>


    <footer>
        <script src="../../js/deploytext.js"></script>
        <script src="../../js/deleteArticle.js"></script>
        <?php
        include_once '../templates/footer.html';
        ?>
    </footer>
</body>



</html>