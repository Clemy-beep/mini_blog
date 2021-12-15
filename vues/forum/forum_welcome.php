<?php

require_once("../../config/config.php");

session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include '../templates/forum_logged_header.php';
    ?>
    <div id="forum-header">👽🛰️ Welcome to the best space theories forum in the <span style="background-color: transparent; font-size: 28px; color: #FF77EE; font-family:'Genos', sans-serif;">whole world</span> 🚀🛸</div>
    <div id="forum-main">
        <aside id="categories"></aside>
        <div id="forum-torso">
            <h1>Newest topics</h1>
            <article>fefefef</article>
            <h1>Your last comments</h1>
            <article>fdk,kef</article>
            <h1>All topics</h1>
            <article>v,eflkv</article>
        </div>
    </div>
    <?php include'../templates/footer.html'?>
    <script src="../../js/forum_welcome.js"></script>
</body>

</html>