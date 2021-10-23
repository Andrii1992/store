<?php
require_once "../settings.php";
require_once BASE_DIR . 'template/header.php';

if (!Me::IsLoggedIn()) {
    http_response_code(403);
    ExitEroor('Error: User not logged in');
}

?>

<div class="row mb-5">

    <?php
    $isEmpty = true;
    foreach (Order::GetOrders(Me::GetUser()->GetData()['id']) as $order) :
        $product_ids = json_decode($order['json_data'], true);
    ?>
        <div class="col-12  mt-5">
            <h2 class="product-title">Order #<?= $order['id']; ?></h2>
            <?php
            if ($order['is_paid'] === 1) : ?>
                <span class="badge badge-success">Is paid</span>
            <?php
            else : ?>
                <span class="badge badge-warning">No paid</span>
            <?php
            endif;
            ?>
            <?php
            if ($order['is_shipped'] === 1) : ?>
                <span class="badge badge-success">Is shipped</span>
            <?php
            else : ?>
                <span class="badge badge-warning">No shipped</span>
            <?php
            endif;
            ?>
        </div>

        <?php
        $total = 0.0;
        foreach ($product_ids as $product_id) :
            $product = new Product($product_id);
            $product_data = $product->GetData();
        ?>
            <div class="col-12 col-lg-4 mt-3">
                <a href="<?= PREFIX_URL; ?>product.php?id=<?= $product_id; ?>" target="_blank">
                    <img width="50px" src="<?php echo $product->GetData()['img_url']; ?>" alt="product image" title="<?php echo $product->GetData()['title']; ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-12 col-lg-8 row  mt-3">
                <div class="col-12 col-lg-6">
                    <a href="<?= PREFIX_URL; ?>product.php?id=<?= $product_id; ?>" target="_blank" class="text-dark">
                        <p class="text-center"><?php echo $product->GetData()['title']; ?></p>
                    </a>
                </div>
                <div class="col-12 col-lg-6 ">

                        <a href="<?= PREFIX_URL; ?>product.php?id=<?= $product_id; ?>" target="_blank" class="text-dark text-right">
                            <h2 class="product-price"><?php echo $product->GetData()['price']; ?></h2>
                        </a>

                </div>
            </div>
        <?php
            $total += $product->GetData()['price'];
        endforeach;
        ?>
        <div class="col-12">
            <h2 class="product-price text-right">Total: <?php echo $total; ?></h2>
        </div>
    <?php
    endforeach; ?>
</div>

<?php

require_once BASE_DIR . 'template/footer.php';
