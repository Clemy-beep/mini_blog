<?php
session_start();
require_once('../../config/config.php');
require_once('../../helpers/articleHelper.php');

if (!isset($_GET['id'])) {
    header("Location: /vues/articles/articles_list.php");
}

$aArticle = getThisArticle($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include '../templates/loggedHeader.php';
    ?>
    <div id="body">
        <div class="title" id="article_title">
            <?php
            switch ($aArticle['category']) {
                case "Aliens":
                    echo '<img src="../../resources/articleicon.png" alt="aliens icon" width="42px" height="42px">';
                    break;
                case "Apollo Mission":
                    echo '<img src="../../resources/appolloicon.png" alt="aliens icon" width="42px" height="42px">';
                    break;
                case "Government's plot":
                    echo '<img src="../../resources/ploticon.png" alt="Plot icon" width="42px" height="42px">';
                    break;
                case "NASA":
                    echo '<img src="../../resources/nasaicon.png" alt="nasa icon" width="42px" height="42px">';
                    break;
                default:
                    echo "";
                    break;
            }
            ?>
            <h1><?= $aArticle['title'] ?></h1>
        </div>
        <div class="article-infos" id="article_infos">
            <diV class="author"><i class="fas fa-user-edit"></i> <?= $aArticle["username"] ?></diV>
            <div class="date"><i class="fas fa-clock"> </i> <?=$aArticle['published_on'] ?></div>
            <div class="category"><i class="fas fa-box"> </i> <?=$aArticle['category'] ?></div>
        </div>
        <article id="article">
            <?= $aArticle['content'] ?>

        </article>
    </div>
    <?php
    include '../templates/footer.html'
    ?>
</body>

</html>