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
$content = "";
$date = '';
$category = "";
$id;
$articleId;


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once '../templates/loggedHeader.php';
    ?>

    <div id="body">
        <div class="title" style="margin-left: 25vw;">
            <img id="articles-icon" src="../../resources/stars.png" width="54px" height="54px" />
            <h1>Browse by categories !</h1>
        </div>
        <div class="cat-articles">
            <form action="categories.php" method="post">
                <select name="categories" id="categories">
                    <option value="Aliens">Aliens</option>
                    <option value="Government's plot">Government's plot</option>
                    <option value="NASA">NASA</option>
                    <option value="Apollo Mission">Apollo Mission</option>
                </select>
                <input type="submit" value="Browse !" id="publish-button" style="cursor: pointer; display: block; margin-left: auto; margin-right: auto;">
            </form>
            <?php
            if (isset($_POST['categories'])) {
                try {

                    $query = $connexion->prepare("SELECT * FROM `articles` INNER JOIN `users` ON `articles`.`author_id`=`users`.`id` WHERE `category` = :category AND isDeleted = 0  ORDER BY `published_on` DESC;");
                    $query->execute(["category" => $_POST['categories']]);
                    $response = $query->fetchAll();
                } catch (Exception $err) {
                    $error['message'] = $err;
                    $error['exist'] = true;
                    echo $err;
                    die();
                }
                if (!empty($response)) {
                    foreach ($response as $row) {
                        $date = $row['published_on'];
                        $timestamp = strtotime($date);
                        $title = $row['title'];
                        $published_on = date("d-m-Y", $timestamp);
                        $author = $row["username"];
                        $content = htmlspecialchars(strip_tags($row['content']));
                        $category = $row['category'];
                        $id = $row['id'];
                        $articleId = $row['article_id'];
                        echo ' 
                            <article id="categ-articles">   
                            <div class="article-header">
                                <div class="article-title">' . $title . '</div>
                                <div class="isUserAuthor"><i title="Open in a new page" onclick="location.href=\'article.php?id=' . $articleId . '\';" class="fas fa-external-link-alt"></i></div>
                            </div>';
                        if ($author === $_SESSION['user']['username']) {
                            echo '        
                                    <div class="article-options">
                                    <div class="isUserAuthor" onclick="location.href=\'modify_article.php?id=' . $articleId . '\';" ><i class="fa-solid fa-pen-to-square"></i> Edit</div>
                                    <div class="isUserAuthor" ><i class="far fa-trash-alt"></i> Delete</div>
                                    </div>
                                    ';
                        }
                        echo '
                                <div class="article-content" id="id' . $articleId . '">' . $content . ' </div>
                                <div class="article-infos">
                                    <diV class="author"><i class="fas fa-user-edit"></i>' . $author . '</diV>
                                    <div class="date"><i class="fas fa-clock"> </i>' . $published_on . '</div>
                                    <div class="category"><i class="fas fa-box"> </i> ' . $category . '</div>
                                    <div style="cursor: pointer;" class="deployButton" title="Double click to show content." id= "deployButton' . $articleId . '" onclick="deployText(' . $articleId . ')" ><i class="fas fa-caret-down"> See more</i> </div>
                                </div>
                            </article>';
                    }
                } else echo '
                    <div class="container2">
                        <h1>No article in this category yet ! <br></h1>
                        <h2>No one has wrote for the category : ' . $category . '. Be the first !</h2>
                        <a href="./add_articles.php" style="text-decoration: none;">
                        <span id="articleslink">Create your article</span> </a>
                    </div>
                    
                ';
            }
            ?>
        </div>
    </div>

    <footer>
        <script src="../../js/deploytext.js"></script>
        <?php
        include_once '../templates/footer.html';
        ?>
    </footer>

</body>

</html>