<?php
require_once "../../include/Config.php";
require_once "../../class/user.class.php";

$error = NULL;
$success = NULL;
$user = new User();
$AllUsers = $user->GetUsers("", "", NULL);
require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/all-users.html";
