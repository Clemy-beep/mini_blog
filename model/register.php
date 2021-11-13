<?php
require_once '../config/config.php';

$username = isset($_POST["username"]) ? $_POST['username'] : null;
$password = isset($_POST["password"]) ? $_POST['password'] : null;
$email = isset($_POST["email"]) ? $_POST['email'] : null;

try{
    $stmt = $pdo->prepare("INSERT INTO `users` (`username`, `password` , `email`) VALUES (:username, :password, :email)");
    $stmt->execute(['username' => $username , 'password' => $password, 'email' => $email,]);
    include('../vues/success.html');
}catch(err){
    include('../vues/error/html');
    print(err);
}




?>