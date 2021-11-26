<?php
session_start();
unset($_SESSION["user"]["username"]);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
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
        <main>
            <div id="login">
                <img src="../../resources/happy.jpg" alt="happyalien" id="yo">
                <div class="container">
                    <h1>User created ! <br></h1>
                    <a href="log-in.php" style="text-decoration: none;">
                        <span id="loginlink">Return to login page</span> </a>
                </div>

            </div>

        </main>
    </div>
    <footer>
        <?php
        include_once '../templates/footer.html'
        ?>
    </footer>
</body>

</html>