<header>
    <div class="menu">
        <img src="../../resources/ufo-icon.svg" alt="ufo-icon" class="icon">
        <div class="welcome">
            <a href="../account/account_infos.php" style="font-size: 38px;text-decoration: none;">Welcome back <?php if (isset($_SESSION['user']['username'])) {
                                                                    echo $_SESSION['user']['username'];
                                                                } else header("Location: /index.php"); ?> !</a>
        </div>
        <div class="menuitem1"><a id="menuitem1" style="text-decoration:none" href="articles_list.php">All articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="users_articles.php ">My articles</a></div>
        <div class="menuitem2"><a id="menuitem2" style="text-decoration:none " href="add_articles.php">Create an article</a></div>
        <div class="menuitem3 "><a id="menuitem3" style="text-decoration:none" href="categories.php">Categories</a>
        </div>
        <div class="menuitem4"><a id="menuitem4" style="text-decoration:none " href="../account/logout.php"><i class="fas fa-sign-out-alt" style="color: white;"></i> Disconnect</a></div>

    </div>
</header>