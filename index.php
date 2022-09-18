<?php
require_once "class/product.class.php";
$select = '1';
$product = new Product();
$ProductData = $product->GetProducts(" ORDER BY `ID` DESC LIMIT 3","","");
// print_r($ProductData);
//  foreach($ProductData as $data)
//  {
//     extract($data);

//  }
require_once "header.html";
require_once "index.html";
require_once "footer.html";