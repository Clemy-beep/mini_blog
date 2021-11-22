<!DOCTYPE html>
<html lang="en">

<?php 
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Error in publication</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <header>
    <div class="menu">
            <img src="../../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
            <div class="welcome">Welcome back  <?php if(isset($_SESSION['user']['username'])){echo$_SESSION['user']['username'];} else header("Location: /index.php"); ?>  !</div>
            <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="articles_list.php">All articles</a></div>
            <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="users_articles.php ">My articles</a></div>
            <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="categories.php">Categories</a></div>
            <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt"></i> Disconnect</a></div>
    </div>
    </header>

    <main>
        <div id="main">
            <img src="../resources/sad.png" alt="sadalien" id="yo">
            <div class="container2">
            <h1>Oh no ! <br></h1>
            <h2>Your article couldn't be published. Please try again later.</h2>
            <a href="./articles_list.php" style="text-decoration: none;">
                <span id="articleslink">Seel all articles</span> </a>
        </div>
        </div>
       
</main>
</body>

<footer>
</footer>

</html>