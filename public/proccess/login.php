<?php
session_start();
require_once '../db/Connection.php';
require_once '../helper/helper.php';
require_once '../helper/Authenticate.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users = Connection::table('users')->where('username', $username)->first();

    if (password_verify($password, $users['password'])) {
        Authenticate::regenerateSession($users);
        $_SESSION['success'] = 'Success login';

        return to('../borrowing.php');
    } else {
        $_SESSION['failed'] = 'Failed login!';
        return to('../index.php');
    }
} else {
    header('Location:index.php');
}


