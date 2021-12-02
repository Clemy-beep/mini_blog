<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link rel="stylesheet" href="../../style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once '../templates/anonHeader.html';
    ?>
    <div id="body">
        <img src="../../resources/hey.jpg" alt="Hi" id="hi">
        <div class="container" id="register-container">
            <h1>Register</h1>
            <h2>New here ? Create an account !</h2>
            <form action="../../controller/accountController.php" method="post">
                <i class="fas fa-user"></i>
                <label>Username <br></label>
                <input type="text" name="username" required>
                <br>
                <i class="fas fa-key"></i>
                <label>Password <br></label>
                <input type="password" name="password" required>
                <br>
                <i class="fas fa-envelope-open-text"></i>
                <label>Email <br></label>
                <input type="email" name="email" required>
                <br>
                <input type="submit" value="Sign up" id="sign-up">
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