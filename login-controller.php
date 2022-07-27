<?php
include __DIR__ . '/util.php';

// check user with requested email
$query = pdo()->prepare("SELECT * FROM `user` WHERE `email` = :email");
$query->execute(['email' => trim($_POST['email'])]);

if (!$query->rowCount()){
    addError("Invalid login or password.");
    header('location: login.php');
    die();
}

$user = $query->fetch();

// check password
// if (password_verify($user['pass'], trim($_POST['password']))
if ($user['pass'] === trim($_POST['password'])){
    $_SESSION['user_id'] = $user['id'];
    header('location: feedback.php');
    die();
} else {
    addError("Invalid login or password.");
    header('location: login.php');
}