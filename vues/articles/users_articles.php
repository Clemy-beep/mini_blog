
<?php 

require_once("../../config/config.php");

    session_start();
   $error = [
    "message" => "",
    "exist" => false
    ];

    global $connexion;
    $row = array();
    $title = "";
    $author ="";
    $content="";
    $date = '';
    $category = "";

    try{

        $query = $connexion->prepare("SELECT * FROM `articles` WHERE `author` = :author;");
        $query->execute(["author" => $_SESSION['user']['username']]);
        $response =$query->fetchAll();
        }
         catch(Exception $err){
             $error['message'] = $err;
             $error['exist']=true;
             echo $error['message'];
             die();
         }
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
            <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="add_articles.php">Create an article</a>
        </div>
            <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="categories.php">Categories</a>
            
        </div>
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt" style="color: white;"></i> Disconnect</a></div>

        </div>
    </header>

    <div class="title">
        <img id="articles-icon" src="../../resources/myarticlesicon.svg" height="42px" width="42px" />
        <h1>My articles</h1>
    </div>
    <div class="main">
        <?php 
        if(!empty($response)){
            foreach($response as $row){

                $date= $row['published_on'];
                $timestamp = strtotime($date);
    
                $title= $row['title'];
                $published_on = date("d-m-Y", $timestamp);
                $author= $row["author"];
                $content= $row['content'];
                $category= $row['category'];
                echo ' 
                <article>
                    <div class="article-title">'. $title .'</div>
                    <div class="article-content">'.$content .' </div>
                    <div class="article-infos">
                    <diV class="author"><i class="fas fa-user-edit"></i>'.$author .'</diV>
                    <div class="date"><i class="fas fa-clock"> </i>'. $published_on .'</div>
                    <div class="category"><i class="fas fa-box"> </i> '.$category .'</div>
                    </div>
                </article>';
            }
        } else{
            echo '
            <img src="../../resources/empty.png" alt="emptyalien" id="yo">
            <div class="container2">
            <h1>You haven\'t published anything yet ! <br></h1>
            <h2>We are eager to read your theories, share them with us.</h2>
            <a href="./add_articles.php" style="text-decoration: none;">
                <span id="articleslink">Create your article</span> </a>
            </div>
            ';
        }
        ?>
       
    </div>
</body>

<footer>
</footer>

</html>