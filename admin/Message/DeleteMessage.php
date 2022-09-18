<?php
require_once "../../include/Config.php";
require_once "../../class/message.class.php";

if(!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$m = new Message();
$Check = $m->DeleteMessage($ID);
if($Check) header("location:Messages.php");
?>