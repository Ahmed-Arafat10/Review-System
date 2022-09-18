<?php
require_once "../../class/user.class.php";

if(!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$user = new User();
$Check = $user->DeleteUser($ID);
if($Check) header("location:AllUsers.php");
?>