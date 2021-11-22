
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
    $author = "";
    $content="";
    $date = '';
    $category = "";

    try{

    $query = $connexion->prepare("SELECT * FROM `articles`;");
    $query->execute();
    $response =$query->fetchAll();
    
        foreach($response as $row){
            $date= $row['published_on'];
            $timestamp = strtotime($date);

            $title= $row['title'];
            $published_on = date("d-m-Y", $timestamp);
            $author= $row["author"];
            $content= $row['content'];
            $category= $row['category'];
        }
    }
     catch(Exception $err){
         $error['message'] = $err;
         $error['exist']=true;
         echo $err;
         die();
     }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All articles</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
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
        <div class="welcome">Welcome back  <?php if(isset($_SESSION['user']['username'])){echo$_SESSION['user']['username'];} else header("Location: /index.php"); ?>  !

        </div>
        <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="articles_list.php">All articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="users_articles.php ">My articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="add_articles.php">Create an article</a></div>
        <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="categories.php">Categories</a>
        </div>
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt"></i> Disconnect</a></div>

    </div>
    </header>
   
    <div class="title">
        <img id="articles-icon" src="../../resources/telescop.svg" width="54px" height="54px" />
        <h1>Articles list</h1>
    </div>
    <div class="main">
        <article>
            <div class="article-title">Article title</div>
            <div class="article-content">Content Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content ontent Content Content </div>
            <div class="article-infos">
                <diV class="author"><i class="fas fa-user-edit"></i> Author</diV>
                <div class="date"><i class="fas fa-clock"> </i> Publication date</div>
                <div class="category"><i class="fas fa-box"> </i> Category</div>
            </div>
        </article>
       
       
    </div>

</body>

<footer>
</footer>

</html>