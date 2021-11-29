<?php
require_once '../../config/config.php';

session_start();
include '../../model/accountInfosModel.php';
include '../../model/articles_count.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My informations</title>
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

    <div id="body">
        <div class="title">
            <img src="../../resources/ship.png" alt="spaceship icon" id="articles-icon" height="42px" width="32px">
            <h1>My informations</h1>
        </div>
        <div class="main">

            <?php


            if (!empty($response) && !empty($total_articles)) {
                $total_articles = $total_articles[0];
                echo '
                <article>
                    <div class="article-title"> <i class="fab fa-reddit-alien"></i> Username</div>
                    <div class="article-content">' . $response[0]['username'] . '</div>
                    <br>
                    <div class="article-title"><i class="fas fa-envelope-open-text"></i> Email</div>
                    <div class="article-content">' . $response[0]['email'] . '</div>
                    <br>
                    <div class="article-title"> <i class="far fa-newspaper"></i> Articles published</div>
                    <div class="article-content">' . $total_articles . '</div>
                </article>
                ';
            }
            ?>
            <article>
                <div class="article-title"><i class="far fa-edit"></i> Edit my informations</div>
                <form action="../../controller/accountInfosController.php" method="POST">
                    <div class="label" style="font-size: 24px;"><label> Username</label></div>
                    <input style="font-size: 16px;" type="text" id="title" name="username" value="<?= $response[0]['username'] ?? $_SESSION['user']['username'] ?>">
                    <input type="hidden" name="userid" value="<?= $_SESSION['user']['id'] ?>">
                    <div class="label" style="font-size: 24px;"><label>Email</label></div>
                    <input style="font-size: 16px;" type="text" id="title" name="email" value="<?= $response[0]['email'] ?? $_SESSION['user']['email'] ?>">
                    <input type="submit" id="publish-button" style="cursor: pointer; height: 44px; font-size: 18px; width: 128px; margin-left: auto; display: block; margin-right: auto;" value="Modify">
                </form>
            </article>

        </div>
    </div>
</body>
<?php include '../templates/footer.html'; ?>

</html>