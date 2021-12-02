<header>
    <div class="menu">
        <img src="../../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
        <div class="welcome">
            <a href="../articles/articles_list.php" style="text-decoration: none;">Welcome back <?php if (isset($_SESSION['user']['username'])) {
                                                                                                    echo $_SESSION['user']['username'];
                                                                                                } else header("Location: /index.php"); ?> !</a>
        </div>
        <div class="menuitem1" id="droptest">
            <div id="bigmenu">
                <a href="#" id=articlesicon onclick="onHover()"><i class="far fa-newspaper"></i></a> <a id="menuitem1" onclick="onHover()" style="text-decoration:none" href="#"> Articles</a>
            </div>
            <ul id="articles-section">
                <li><a href="articles_list.php">All articles</a></li>
                <li><a href="users_articles.php">My articles</a></li>
                <li><a href="categories.php">Categories</a></li>
            </ul>
        </div>
        <div class="menuitem2"><a href="account_infos.php" id="accounticon"><i class="fa-regular fa-user"></i></a><a id="menuitem2" style="text-decoration:none " href="account_infos.php"> Account</a></div>
        <div class="menuitem3"><a href="#" id="forumicon"><i class="fa-brands fa-rocketchat"></i></a> <a id="menuitem3" style="text-decoration:none " href="">Forum</a></div>
        <div class="menuitem4"> <a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt" style="color: white;" title="Log out"></i> </a></div>

    </div>
</header>
<script>
    var menuitem = document.getElementById('droptest');
    var dropdown = document.getElementById('articles-section');

    function onHover() {
        menuitem.addEventListener('click', function() {
            dropdown.style.display = "block";
        });
        dropdown.addEventListener('mouseleave', function() {
            dropdown.style.display = "";
        });

    }
</script>