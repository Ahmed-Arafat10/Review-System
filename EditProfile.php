<?php
require_once 'class/user.class.php';

$user = new User();
//$Check = $user->GetUsers("","","");
$Check = $user->UpdateUser(1,"ahmed","1234","ahmed@email.com");
