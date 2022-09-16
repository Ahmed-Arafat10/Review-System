<?php
require_once "../class/user.class.php";

$error = NULL;
$success = NULL;
$user = new User();
$AllUsers = $user->GetUsers("", "", NULL);
require_once "../templates/admin/header.html";
require_once "../templates/admin/all-users.html";
