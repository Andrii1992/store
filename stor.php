<?php
require_once "settings.php";
require_once BASE_DIR . '/template/header.php';
?>
<div class="row mb-5">
    <?php
    foreach (Store::GetProducts() as $product) {
        if($product->GetData()["quantity"] < 1){
            continue;
        }
        echo "<a href='/product.php?id={$product->GetData()["id"]}'  class='col-lg-4 col-12 mt-5 btn-link'>";
        echo "<div class='link-product text-dark text-dark d-block p-2 shadow-lg rounded-lg px-3'>";
        echo "<h2 class='my-3 text-center'><b>{$product->GetData()["title"]}</b></h2>";
        echo "<img class='mb-3 img-fluid' src={$product->GetData()['img_url']} >";
        echo "<h3>€{$product->GetData()['price']}</h3>";
        echo "<p>{$product->GetData()['short_description']}</p>";
        echo "</div>";
        echo "</a>";
    }
    ?>

</div>

<?php

require_once BASE_DIR . '/template/footer.php';
