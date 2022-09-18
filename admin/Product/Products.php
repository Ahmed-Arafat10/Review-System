<?php
require_once "../../include/Config.php";
require_once "../../class/product.class.php";


$p = new Product();
$allProducts = $p->GetProducts("","",NULL);
// print_r($allProducts);
//$p->AddProduct("b","b123","b.png",1000,1,2);
//$p->UpdateProduct(1,"AAA","a123","a.png",20,1,2);
// $arr = $p->GetProducts("","",NULL);
// echo "<pre>";
// if(!empty($arr))
// print_r($arr);
// else echo "not found";

// $arr1 = $p->GetProduct("WHERE `ID` = ?","id",4);
// print_r($arr1);
require_once "../../templates/admin/header.html";
require_once "../../templates/admin/menu.html";
require_once "../../templates/admin/footer.html";
require_once "../../templates/admin/all-products.html";