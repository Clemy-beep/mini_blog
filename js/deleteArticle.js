function deleteArticle(id) {
    var conf = confirm("Do you really want to delete this article ?");
    if (conf) {
        open('http://127.0.0.3/controller/articlesController.php?action=delete&id=' + id);
    }
}