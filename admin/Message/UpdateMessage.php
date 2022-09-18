<?php
require_once "../../include/Config.php";
require_once "../../class/message.class.php";
require_once "../../class/upload.class.php";
if (!IsLoggedIn()) exit("Please log in first");

if(!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$m = new Message();
$Date = $m->GetMessage(" WHERE `ID` = ? ","id",$ID);
extract($Date);
//print_r($ProductData);
 //echo $image;
$error = NULL;
$success = NULL;
if (count($_POST)) {
    //print_r($_POST);
    $User_ID = $_SESSION['user']['ID'];
    //echo $ID;
    $title = $_POST['title'];
    $content = $_POST['content'];
   $Check =  $m->UpdateMessage($ID,$title,$content);
   if($Check) header("location:Messages.php");
}

require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/update-message.html";
// require_once "../templates/admin/menu.html";
// require_once "../templates/admin/index.html";
// require_once "../templates/admin/footer.html";
