<?php

require_once '../config/config.php';
require_once '../model/accountModifModel.php';

if (isset($_POST['username'], $_POST['userid'], $_POST['email'])) {
    $isValid = updateAccount($_POST['username'], $_POST['userid'], $_POST['email']);
    if (!$isValid['exist']) {
        header("Location: /vues/articles/account_modif_success.php");
    } else {
        header("Location: /vues/articles/account_modif_error.php");
    }
}
