<!DOCTYPE html>
<html lang="en">

<?php 
    require_once '../model/log_infos.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All articles</title>
    <link rel="stylesheet" href="../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <div class="menu">
        <img src="../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
        <div class="welcome">Welcome back  <?php echo $loggeduser; ?> !

        </div>
        <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="articles_list.php">All articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="users_articles.html ">My articles</a></div>
        <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="../vues/add_articles.php">Create an article</a>
        </div>
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../index.php"><i class="fas fa-sign-out-alt"></i> Disconnect</a></div>

    </div>
    <div class="title">
        <img id="articles-icon" src="https://img.icons8.com/officel/40/000000/alien.png" />
        <h1>Articles list</h1>
    </div>
</body>

<footer>
    <script src="../js/banner.js"></script>
</footer>

</html>