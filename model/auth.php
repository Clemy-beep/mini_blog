<?php
require_once '../config/config.php';

$username = isset($_POST["username"]) ? $_POST['username'] : null;
$password = isset($_POST["password"]) ? $_POST['password'] : null;
$err = '';

try{
    if(!empty($username) && !empty($password)){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE `password`= :password AND `username` = :username;");
        $stmt->execute(['username' => $username , 'password' => $password]);
        $response = $stmt->fetch(PDO::FETCH_LAZY);
        if(!empty($response)){

            session_start();
            $_SESSION['user'] = $username;
            include('../vues/articles_list.php');
        }
        else{
            include('../vues/no_user.html');
        }
    }
} 
    catch(Exception $err){
    include('../vues/error.html');
    echo "$err";
}


?>