<?php
require_once "settings.php";
require_once BASE_DIR . 'template/header.php';

$id = GET('id', true);

try {
    $product = new Product((int) $id);
} catch (Exception $ex) {
    http_response_code(404);
    ExitEroor('Error: product not found');
}

?>
<div class="row my-5 product">
    <div class="col-lg-5 col-12">
        <img class="img-fluid" src="<?= $product->GetData()['img_url']; ?>" title="<?= $product->GetData()['title']; ?>" alt="<?= $product->GetData()['title']; ?>">
    </div>
    <div class="col-lg-7 col-12 px-3 mt-lg-0 mt-3">
        <h1 class="product-title"><?= $product->GetData()['title']; ?></h1>
        <p class="text-justify"><?= $product->GetData()['description']; ?></p>
        <p class="text-right"><span class="badge badge-light px-2 py-1">Quantity: <span class="badge badge-dark pb-1"><?= $product->GetData()['quantity']; ?></span></span></p>
        <h3 class="text-right"><span class="badge badge-light px-2 pb-1 product-price">€<?= $product->GetData()['price']; ?></span></h3>
        <?php
        if (Me::IsLoggedIn()) :
            if(!$product->GetData()["quantity"] < 1):

        ?>
            <form method="POST" action="<?php echo PREFIX_URL; ?>api/cart/addItem.php">
                <input type="hidden" name="product_id" value="<?=$product->GetData()['id']; ?>">
                <button type="submit" class="px-4 py-2 btn btn-secondary float-right">Add to cart</button>
            </form>
        <?php
        else :
            ?>
            <button disabled type="submit" class="px-4 py-2 btn btn-secondary float-right">Temporarily unavailable</button>
            <?php
        endif;
        else :
        ?>
            <a class="px-4 py-2 btn btn-secondary float-right" href="<?php echo PREFIX_URL; ?>auth/login.php">Login</a>
        <?php
        endif;
        ?>


    </div>
</div>

<?php

require_once BASE_DIR . 'template/footer.php';
