<?php
require_once "../../include/Config.php";
require_once "../../class/user.class.php";
require_once "../../class/upload.class.php";
if (!IsLoggedIn()) exit("Please log in first");

if (!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$user = new User();
$UserData = $user->GetUser(" WHERE `ID` = ? ", "id", $ID);
extract($UserData);

$error = NULL;
$success = NULL;
if (count($_POST)) {
    //print_r($_POST);
    //echo $ID;
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $p = new User();
    $Check =  $p->UpdateUser($ID, $name, $password, $email);
    if ($Check) header("location:AllUsers.php");
}

require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/update-user.html";
// require_once "../templates/admin/menu.html";
// require_once "../templates/admin/index.html";
// require_once "../templates/admin/footer.html";
