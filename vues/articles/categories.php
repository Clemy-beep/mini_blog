
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <header>
    <div class="menu">
        <img src="../../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
        <div class="welcome">Welcome back  <?php if(isset($_SESSION['user']['username'])){echo$_SESSION['user']['username'];} else header("Location: /index.php"); ?>  !

        </div>
        <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="articles_list.php">All articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="users_articles.php ">My articles</a></div>
        <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="add_articles.php">Create an article</a>
        </div>
        <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="categories.php">Categories</a>
        </div>
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt" style="color:white"></i> Disconnect</a></div>

    </div>
    </header>
   
    <div class="title">
        <img id="articles-icon" src="../../resources/stars.png" width="54px" height="54px" />
        <h1>Browse by categories !</h1>
    </div>
    <div class="main">
            <select name="categories" id="categories">
                <option value="Aliens">Aliens</option>
                <option value="Government's plot">Government's plot</option>
                <option value="NASA">NASA</option>
                <option value="Apollo Mission">Apollo Mission</option>
            </select>
            <input type="submit" value="Browse !" id="publish-button" style="cursor: pointer; display: block; margin-left: auto; margin-right: auto;">
        <?php
        
        ?>
    </div>
</body>

<footer>
</footer>

</html>