<?php
require_once "../../include/Config.php";
require_once "../../class/product.class.php";
require_once "../../class/upload.class.php";
if (!IsLoggedIn()) exit("Please log in first");


$error = NULL;
$success = NULL;
if (count($_POST)) {
    //print_r($_POST);
    $ID = $_SESSION['user']['ID'];
    //echo $ID;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $img = array();
    if(isset($_FILES['image'])){
    $img[] = $_FILES['image']['name'];
    $img[] = $_FILES['image']['tmp_name'];
    $img[] = $_FILES['image']['type'];
    $up = new UploadImage($img[0], $img[1], $img[2]);
    $up->Upload();
    }else $img[] = NULL;
    $p = new Product();
    $p->AddProduct($title, $description, $img[0], $price, $available, $ID);
}

require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/index.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/add-product.html";
// require_once "../templates/admin/menu.html";
// require_once "../templates/admin/index.html";
// require_once "../templates/admin/footer.html";
