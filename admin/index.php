<?php
require_once "../include/Config.php";

if(!IsLoggedIn()) header("location:SignIn.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Soft Masr - Project">
    <meta name="author" content="Ahmed ElShahat">
    <title>Soft Masr</title>

    <!-- FontAwesome -->
    <link href="../templates/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="../templates/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="../templates/assets/css/style.css" rel="stylesheet">
</head>

<body class="admin-panel">
    <?php
require_once "../templates/admin/menu.html";
require_once "../templates/admin/index.html";
require_once "../templates/admin/footer.html";
