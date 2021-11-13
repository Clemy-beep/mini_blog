<?php
require_once '../config/config.php';

$username = isset($_POST["username"]) ? $_POST['username'] : null;
$password = isset($_POST["password"]) ? $_POST['password'] : null;
$email = isset($_POST["email"]) ? $_POST['email'] : null;

$stmt = $pdo->prepare("SELECT username FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($user) && !empty($user)) {
    include('../vues/userexists.html');
} 
else {
    try{
        $stmt = $pdo->prepare("INSERT INTO `users` (`username`, `password` , `email`) VALUES (:username, :password, :email)");
        $stmt->execute(['username' => $username , 'password' => $password, 'email' => $email,]);
        include('../vues/success.html');
    }catch(err){
        include('../vues/error.html');
        print(err);
    }
}
?>