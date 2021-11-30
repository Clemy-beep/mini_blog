<?php
require_once '../config/config.php';
require_once '../model/passwordEditModel.php';

if (isset($_POST['confirmpwd'], $_POST['newpwd'])) {
    $isValid = verifypwd($_POST['confirmpwd'], $_POST['newpwd']);
    if (!$isValid['exist']) {
        header("Location: /vues/articles/account_modif_success.php");
    } else{ 
        header("Location: /vues/articles/account_modif_error.php");}
}
