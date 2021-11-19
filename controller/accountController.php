<?php

require_once("../config/config.php");
require_once("../model/register.php");
require_once("../model/auth.php");

if(isset(
    $_POST['username'],
    $_POST['password'],
    $_POST['email']))
    
    {
    $isValid= checkSignUp(
        $_POST['username'],
        $_POST['password'],
        $_POST['email']);
    
        if($isValid['exist']){
            header("Location: /vues/error.php");
        } 
        else
        header("Location: /vues/account/success.php");
    }

    if(isset($_POST['email2'], $_POST['password2'])){
        $isValid=checkLogin(
            $_POST['email2'],
            $_POST['password2']
        );
        if($isValid['exist']){
            header("Location: /vues/account/no_user.php");
        }
        else 
            header("Location: /vues/articles/articles_list.php");
    }