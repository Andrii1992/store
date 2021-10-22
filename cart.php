<?php
require_once "settings.php";
require_once BASE_DIR . 'template/header.php';

if (!Me::IsLoggedIn()) {
    http_response_code(403);
    exit('Error: User not logged in');
}

?>

<div class="row mt-5">

    <?php
    $isEmpty = true;
    foreach (Cart::GetProducts() as $product) : ?>
        <div class="col-12 col-lg-4 mt-3">
            <img width="150px" src="<?php echo $product->GetData()['img_url']; ?>" alt="product image" title="<?php echo $product->GetData()['title']; ?>" class="img-fluid">
        </div>
        <div class="col-12 col-lg-8 row  mt-3">
            <div class="col-12 col-lg-6">
                <p class="text-center"><?php echo $product->GetData()['title']; ?></p>
            </div>
            <div class="col-12 col-lg-6 row">
                <div class="col-12 col-lg-6">
                    <h2 class="product-price"><?php echo $product->GetData()['price']; ?></h2>
                </div>
                <form class="col-12 col-lg-6" method="POST" action="<?php echo PREFIX_URL; ?>api/cart/removeItem.php">
                    <input type="text" name="product_id" value="<?= $product->GetData()['id'];  ?>" hidden>
                    <button class="px-4 py-2 btn btn-danger float-right" type="submit">X</button>
                </form>
            </div>
        </div>
        <?php
        if ($isEmpty) {
            $isEmpty = false;
        }
    endforeach;

    if (!$isEmpty) :
        ?>
        <div class="col-12 my-5">
            <a class="px-4 py-2 btn btn-secondary float-right" href="<?php echo PREFIX_URL; ?>api/cart/createOrder.php">Create order</a>
        </div>
    <?php
    else :
    ?>
        <h2 class="product-title">Cart is empty</h2>
    <?php
    endif;
    ?>
</div>

<?php

require_once BASE_DIR . 'template/footer.php';
