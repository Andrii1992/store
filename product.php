<?php
require_once "settings.php";
require_once BASE_DIR . '/template/header.php';

$id = GET('id', true);

try {
    $product = new Product((int) $id);
} catch (Exception $ex) {
    http_response_code(404);
    exit('Error: product not found');
}

?>
<div class="row my-5 product">
    <img class="col-lg-5 col-8 mx-auto img-fluid" src="<?= $product->GetData()['img_url']; ?>" title="<?= $product->GetData()['title']; ?>" alt="<?= $product->GetData()['title']; ?>">
    <div class="col-lg-7 col-12 px-3 mt-lg-0 mt-3">
        <h1 class="product-title"><?= $product->GetData()['title']; ?></h1>
        <p class="text-justify"><?= $product->GetData()['description']; ?></p>
        <button>By</button>
    </div>
</div>

<?php

require_once BASE_DIR . '/template/footer.php';
