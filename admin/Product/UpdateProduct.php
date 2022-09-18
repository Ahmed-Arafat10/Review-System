<?php
require_once "../../include/Config.php";
require_once "../../class/product.class.php";
require_once "../../class/upload.class.php";

if (!IsLoggedIn()) exit("Please log in first");

if(!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];

$product = new Product();
$ProductData = $product->GetProduct(" WHERE `ID` = ? ","id",$ID);
extract($ProductData);
//print_r($ProductData);
 //echo $image;
$error = NULL;
$success = NULL;
if (count($_POST)) {
    //print_r($_POST);
    $User_ID = $_SESSION['user']['ID'];
    //echo $ID;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $img = array();
    if(isset($_FILES['image']) && $_FILES['image']['name'] != NULL){
    $img[] = $_FILES['image']['name'];
    $img[] = $_FILES['image']['tmp_name'];
    $img[] = $_FILES['image']['type'];
    $up = new UploadImage($img[0], $img[1], $img[2]);
    $up->Upload();
    }else $img[] = $image;
    $p = new Product();
   $Check =  $p->UpdateProduct($ID,$title, $description, $img[0], $price, $available,$User_ID);
   if($Check) header("location:Products.php");
}

require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/update-product.html";
// require_once "../templates/admin/menu.html";
// require_once "../templates/admin/index.html";
// require_once "../templates/admin/footer.html";
