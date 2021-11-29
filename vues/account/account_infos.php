<?php 
    require_once '../../config/config.php';

    session_start();
    $username=$_SESSION['user']['username'];
    $email = $_SESSION['user']['email'];
    include_once '../../model/accountInfosModel.php';
    var_dump($response);
    die();
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
    <div class="title">
        <img src="../../resources/ship.png" alt="spaceship icon" id="articles-icon" height="42px" width="42px">*
        <h1>My informations</h1>
    </div>
    <?php 
            

    ?>
    <div id="body">
        <div class="main"></div>
    </div>
</body>
</html>