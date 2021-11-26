<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="menu">
            <img src="../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
            <div class="welcome"> <a id="menuitem1" style="text-decoration:none" href="index.php">Welcome, dear awake fellow !</a></div>
            <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="./vues/account/sign-in.php">Sign up</a></div>
            <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="./vues/account/log-in.php ">Sign in</a></div>


        </div>
    </header>
    <div id="body">
        <div id="welcome">
            <div class="welcome-container">
                <h1>Roswell's blog</h1>
                <h2>The one and only blog for those who know better. </h2>
                <p>Hi visitor ! Do you think the Moon Landing is a hoax ? Do you believe aliens are the ones who inspired angels and demons in the Bible ? Do you know for sure that Crop Circles are an alien message ? You are in the right place, friend !</p>
            </div>
            <img src="./resources/aliens.png" alt="Aliens" class="alien">

        </div>
    </div>
    <footer>
        <?php 
        include_once './vues/templates/footer.html';
        ?>
    </footer>
</body>

</html>