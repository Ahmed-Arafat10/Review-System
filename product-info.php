<?php
require_once "class/product.class.php";
if (!isset($_GET['ID'])) exit("No ID Is Found");
$ID = $_GET['ID'];
$Product = new Product();
$Data = $Product->GetProduct("WHERE `ID` = ?", "id", $ID);
extract($Data);
?>
<?php require_once "header.html"; ?>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="section-header">
                <h1>Product Info</h1>
            </div>
        </div>
    </div>
    <div class="row product-info">
        <div class="col-md-8">
            <div class="product-info__title">
                <h2><?php echo $title ?></h2>
            </div>
            <div class="product-info__price">
                <strong>Product Price:</strong> <span><?php echo $price ?><sup>EGP</sup></span>
            </div>
            <div class="product-info__available">
                <strong>Product Availability:</strong> <span><?php if ($available) : echo "Available";
                                                                else : echo "Not Available ";
                                                                endif; ?></span>
            </div>
            <div class="product-info__desc">
                <h2>Product Description:</h2>
                <p><?php echo $content ?></p>
            </div>
            <br />
            <a href="#" class="btn btn-lg btn-danger"><i class="fa fa-shopping-cart"></i> Buy Now</a>
        </div>
        <div class="col-md-4">
            <div class="product-info__image">
                <img src="uploads/<?php echo $image ?>" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once "header.html"; ?>