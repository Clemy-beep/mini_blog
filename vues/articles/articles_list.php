
<?php 
require_once("../../config/config.php");

   session_start();
   include '../../model/articlesModel.php'
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
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt" style="color: white;"></i> Disconnect</a></div>

    </div>
    </header>
   
    <div class="title">
        <img id="articles-icon" src="../../resources/telescop.svg" width="54px" height="54px" />
        <h1>Articles list</h1>
    </div>
    <div class="main">
        <?php 
        
        foreach($response as $row){
            $date= $row['published_on'];
            $timestamp = strtotime($date);

            $title= $row['title'];
            $published_on = date("d-m-Y", $timestamp);
            $author= $row["author"];
            $content= $row['content'];
            $category= $row['category'];
            $id=$row['id'];
            echo ' 
            <article>
                <div class="article-title">'. $title .'</div>';
                if($author === $_SESSION['user']['username']){
                    echo '        
                    <div class="article-options">
                        <div class="isUserAuthor" onclick="location.href=\'modify_article.php?id='.$id.'\';" ><i class="fa-solid fa-pen-to-square"></i> Edit</div>
                        <div class="isUserAuthor" ><i class="far fa-trash-alt"></i> Delete</div>
                    </div>
                    ';
                }
            echo  '
                <div class="article-content" id="id'.$id.'">'.$content .' </div>
                <div class="article-infos">
                    <diV class="author"><i class="fas fa-user-edit"></i>'.$author .'</diV>
                    <div class="date"><i class="fas fa-clock"> </i>'. $published_on .'</div>
                    <div class="category"><i class="fas fa-box"> </i> '.$category .'</div>
                    <div style="cursor: pointer;" class="deployButton" title="Double click to show content." id= "deployButton'.$id.'" onclick="deployText('.$id.')" ><i class="fas fa-caret-down"> See more</i> </div>
             </div>
            </article>';
        }
        ?>
    </div>
    <div ></div>
   

</body>

<footer>
    <script src="../../js/deploytext.js"></script>
</footer>

</html>