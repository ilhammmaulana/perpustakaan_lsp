<?php

require_once '../db/Connection.php';
require_once '../helper/helper.php';


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $options = [
        'cost' => 12,
    ];
    $passwordHash = password_hash($password,PASSWORD_DEFAULT);
    $data = [
        'username' => $username,
        'name' => $name,
        'password' => $passwordHash,
    ];

    Connection::table('users')->create($data);
    session_start();
    $_SESSION['success'] = 'Success register!';
    to('../index.php');
    
}else{
    header('Location:index.php');
}


