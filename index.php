<!DOCTYPE html>
<html lang="fr">
<?php
require_once './config/config.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="forms">
    <div id="login">
        <h1>Login</h1>
        <h2>If you already have an account</h2>
        <div class="container">
            <form action="./model/auth.php" method="post">
                <i class="fas fa-user"></i>
                <label class="username">Username <br></label>
                <input type="text" name="username" required>
                <br>
                <i class="fas fa-key"></i>
                <label>Password <br></label>
                <input type="password" name="password" required>
                <br>
                <input type="submit" value="Sign in" id="sign-in">
            </form>
        </div>
    </div>

    <div id="register">
        <h1>Register</h1>
        <h2>New here ? Create an account !</h2>
        <div class="container">
            <form action="./model/register.php" method="post">
                <i class="fas fa-user"></i>
                <label>Username <br></label>
                <input type="text" name="newusername" required>
                <br>
                <i class="fas fa-key"></i>
                <label>Password <br></label>
                <input type="password" name="newpassword">
                <br>
                <label>Email <br></label>
                <input type="email" name="email">
                <br>
                <input type="submit" value="Sign up" id="sign-up">
            </form>
        </div>
    </div>
    </div>
    <footer>
    </footer>
</body>

</html>