function deleteArticle(id) {
    var conf = confirm("Do you really want to delete this article ?");
    if (conf) {
        open('http://localhost/controller/articlesController.php?action=delete&id=' + id);
    }
}