<?php
session_start();
require_once('../../config/config.php');
require_once('../../helpers/articleHelper.php');

if (!isset($_GET['id'])) {
    header("Location: /vues/articles_list.php");
}

$aArticle = getArticle($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify article</title>
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
            <img id="articles-icon" src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-ufo-space-icongeek26-linear-colour-icongeek26.png" />
            <h1>Modify your awesome article</h1>
        </div>
        <div class="container">
            <form method="POST" action="../../controller/articlesController.php?action=modify">
                <div class="label">
                    <label><i class="fas fa-space-shuttle" style="font-size: 24px; padding-top: 2em;"></i> Title</label>
                </div>
                <br>
                <input type="text" name="title" id="title" required value="<?= $aArticle['title'] ?>">
                <br>
                <div class="label">
                    <label><i class="fas fa-atom" style="font-size: 24px;"></i> Content</label>
                </div>
                <br>
                <textarea name="content" id="content" cols="20" rows="10" required>
                <?= $aArticle['content'] ?>
            </textarea>
                <br>
                <input type="hidden" name="id" value="<?= $aArticle['id'] ?>">
                <input type="hidden" name="author" value="<?= $aArticle['author'] ?>">
                <input type="submit" value="Modify !" id="publish-button" style="cursor: pointer;">
            </form>
        </div>
    </div>
    <footer>
        <?php 
        include_once '../templates/footer.html';
        ?>
    </footer>




</body>

</html>