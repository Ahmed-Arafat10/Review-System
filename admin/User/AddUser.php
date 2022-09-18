<?php
require_once "../../include/Config.php";
require_once "../../class/user.class.php";

$error = NULL;
$success = NULL;
if (count($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $Check = $user->SignUp($username, $password , $email );
    if($Check) $success = "Done Creating Your Account";
    else $error = "Something Went Wrong";
}
require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/add-user.html";
