<?php
require_once "class/product.class.php";
$select = '2';
$Product = new Product();
$Data = $Product->GetProducts("", "", "");
extract($Data);

?>

<?php require_once "header.html"; ?>

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <h1>Our Products</h1>
                    </div>
                </div>
                <?php foreach ($Data as $d) :
                    extract($d);
                ?>
                    <div class="col-md-4">
                        <div class="product-box text-center">
                            <div class="product-box__image">
                                <a href="product-info.php?ID=<?php echo $ID ?>">
                                    <img src="uploads/<?php echo $image ?>" class="img-responsive" alt="Product Image">
                                    <span><i class="fa fa-star"></i> Product Info</span>
                                </a>
                            </div>
                            <div class="product-box__title">
                                <h2><?php echo $title ?></h2>
                            </div>
                            <div class="product-box__desc">
                                <p><?php echo $content ?></p>
                            </div>
                            <div class="product-box__price">
                                <span><?php echo $price ?><sup>EGP</sup></span>
                            </div>
                            <a href="product-info.php?ID=<?php echo $ID ?>" class="btn btn-lg btn-success"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <?php require_once "footer.html"; ?>