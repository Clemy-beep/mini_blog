<?php
session_start();

require_once("../../config/config.php");

include '../../model/articlesModel.php'
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All articles</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once '../templates/loggedHeader.php';
    ?>
    <div id="body">

        <div class="title">
            <img id="articles-icon" src="../../resources/telescop.svg" width="54px" height="54px" />
            <h1>Articles list</h1>
        </div>
        <div class="main">
            <?php

            foreach ($response as $row) {
                $date = $row['published_on'];
                $timestamp = strtotime($date);

                $title = $row['title'];
                $published_on = date("d-m-Y", $timestamp);
                $author = $row["username"];
                $content = $row['content'];
                $category = $row['category'];
                $id = $row['id'];
                $articleId = $row['article_id'];
                echo ' 
                <article>
                    <div class="article-header">
                        <div class="article-title">' . $title . '</div>
                        <div class="isUserAuthor"><i title="Open in a new page" onclick="location.href=\'article.php?id=' . $articleId . '\';" class="fas fa-external-link-alt"></i></div>
                    </div>
               ';
                if ($author === $_SESSION['user']['username']) {
                    echo '        
                    <div class="article-options">
                        <div class="isUserAuthor" onclick="location.href=\'modify_article.php?id=' . $articleId . '\';" ><i class="fa-solid fa-pen-to-square"></i> Edit</div>
                        <div class="isUserAuthor" id= "deleteButton' . $articleId . '"onclick="deleteArticle(' . $articleId . ')" ><i class="far fa-trash-alt"></i> Delete</div>
                    </div>
                    ';
                }
                echo  '
                <div class="article-content" id="id' . $articleId . '">' . $content . ' </div>
                <div class="article-infos">
                    <diV class="author"><i class="fas fa-user-edit"></i>' . $author . '</diV>
                    <div class="date"><i class="fas fa-clock"> </i>' . $published_on . '</div>
                    <div class="category"><i class="fas fa-box"> </i> ' . $category . '</div>
                    <div style="cursor: pointer;" class="deployButton" title="Double click to show content." id= "deployButton' . $articleId . '" onclick="deployText(' . $articleId . ')" ><i class="fas fa-caret-down"> See more</i> </div>
                </div>
            </article>';
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