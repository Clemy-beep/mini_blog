<?php
session_start();
?>

<!DOCTYPE html>

<?php
$allowedTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
$allowedTags .= '<li><ol><ul><span><div><br><ins><del>';
// Should use some proper HTML filtering here.
if (isset($_POST['content']) && !empty($_POST['content'])) {
    $sContent = strip_tags(stripslashes($_POST['content']), $allowedTags);
} else {
    $sHeader = '<h1>Nothing submitted yet</h1>';
    $sContent = '<p>Start typing...</p>';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/hnr25u7ycmvoh7wp6d2s8juvsa2wdr9kgwhenmdfhwwbalew/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Create article</title>
    <link rel="stylesheet" href="../../articles_style.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            width: "90%",
            height: 500,
            icons: 'material',
            skin: 'CUSTOM',
            skin_url: '/resources/tinyskins/skins/ui/CUSTOM'

        });
    </script>

</head>

<body>

    <?php
    include_once '../templates/loggedHeader.php';


    ?>


    <div id="body">
        <div class="title">
            <img id="articles-icon" src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-ufo-space-icongeek26-linear-colour-icongeek26.png" />
            <h1>Publish your awesome article</h1>
        </div>
        <div class="container">
            <form method="POST" action="../../controller/articlesController.php?action=publish">
                <div class="label">
                    <label><i class="fas fa-space-shuttle" style="font-size: 24px; padding-top: 2em;"></i> Title</label>
                </div>
                <br>
                <input type="text" name="title" id="title" required>
                <br>
                <div class="label">
                    <label><i class="fas fa-atom" style="font-size: 24px;"></i> Content</label>
                </div>
                <br>
                <textarea name="content" id="content" cols="20" rows="10" required>
                    <?= $sContent?>
                </textarea>
                <br>
                <div class="label">
                    <label><i class="fas fa-robot" style="font-size: 24px;"> Category</i></label>
                </div>
                <br>
                <select name="category" id="category">
                    <option value="Aliens">Aliens</option>
                    <option value="Government's plot">Government's plot</option>
                    <option value="NASA">NASA</option>
                    <option value="Apollo Mission">Apollo Mission</option>
                </select>
                <input type="submit" value="Publish !" id="publish-button" style="cursor: pointer;">
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