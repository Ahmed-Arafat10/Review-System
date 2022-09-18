<?php
require_once "../include/Config.php";
require_once "../../class/product.class.php";

if(!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$product = new Product();
$Check = $product->DeleteProduct($ID);
if($Check) header("location:Products.php");
?>