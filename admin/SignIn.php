<?php
require_once '../class/user.class.php';
require_once '../include/Config.php';

//$Check = $user->GetUsers("","","");

if (IsLoggedIn()) exit("Already logged in");
$error = NULL;
$success = NULL;
if (count($_POST)) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $user = new User();
    $userData = $user->SignIn($name, $password);
    if (!empty($userData)){
        $_SESSION['user'] = $userData;
        $success = "Welcome back";   
    }
    else $error = "User Not Found";
}

require_once "../templates/admin/login.html";
