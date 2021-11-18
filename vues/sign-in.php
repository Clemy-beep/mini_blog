<!DOCTYPE html>
<html lang="en">
<?php
require_once '../config/config.php';
if(session_status()=== PHP_SESSION_ACTIVE) {session_destroy();}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link rel="stylesheet" href="../style.css?<?php echo time(); ?>">
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
        <div class="welcome"> <a id="menuitem1" style="text-decoration:none" href="../index.php">Welcome, dear awake fellow !</a></div>
        <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="sign-in.php">Sign up</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="log-in.php ">Sign in</a></div>
    </div>
    </header>
<div class="forms">
   <div id="register">
       <img src="../resources/hey.jpg" alt="Hi" id="hi">
       <div class="container">
       <h1>Register</h1>
       <h2>New here ? Create an account !</h2>
           <form action="../model/register.php" method="post">
               <i class="fas fa-user"></i>
               <label>Username <br></label>
               <input type="text" name="username" required>
               <br>
               <i class="fas fa-key"></i>
               <label>Password <br></label>
               <input type="password" name="password">
               <br>
               <i class="fas fa-envelope-open-text"></i>
               <label>Email <br></label>
               <input type="email" name="email">
               <br>
               <input type="submit" value="Sign up" id="sign-up">
           </form>
       </div>
   </div>
   </div>
</body>
</html>