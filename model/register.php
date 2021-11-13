<?php
$username = isset($_POST["username"]) ? $_POST['username'] : null;
$password = isset($_POST["password"]) ? $_POST['password'] : null;
$email = isset($_POST["email"]) ? $_POST['email'] : null;


if ( empty($username) || empty($password) || empty($email)) {
    die('Il manque un champ à completer');
}
else {
    print("TOP! Ma ligne est enregistrée");
}
$stmt = $pdo->prepare("INSERT INTO `users` (`username`, `password` , `email`) VALUES (:firstname, :lastname, :age, :adresse, :type_person)");
$stmt->execute(['username' => $username , 'password' => $password, 'email' => $email,]);


?>