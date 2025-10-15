<?php
session_start();

$users = array(
    "okxn" => "okxn123",
    "qwerty" => "qwerty123",
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password. Please try again.";
    }
} else {
    echo "Invalid request method.";
}