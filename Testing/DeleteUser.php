<?php
require_once 'class/user.class.php';

$user = new User();
//$Check = $user->GetUsers("","","");
$Check = $user->DeleteUser(1);
