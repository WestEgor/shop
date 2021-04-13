<?php
require __DIR__ . '/../../vendor/autoload.php';
//require '../navbar.php';

use model\Product;
use config\Connector as Connection;
use repository\products\ProductEntity;

$pdo = Connection::get()->getConnect();

if (isset($_POST['create_submit'])) {

    $name = $_POST['product_name'];
    $quantity = $_POST['product_quantity'];
    $price = $_POST['product_price'];
    $msrp = $_POST['product_msrp'];

    $product = new Product();
    $product->setName($name);
    $product->setQuantity($quantity);
    $product->setPrice($price);
    $product->setMsrp($msrp);

    $productEntity = new ProductEntity($pdo);
    if ($productEntity->create($product)) {
        header('Location: products.php', true, 301);
    } else {
        echo 'cannot create product';
    }
}
?>

<form action="<? echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="row g-3 align-items-center" style="margin-left: 5px">
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pname" class="form-label" style="margin-top: 15px">Name of product:</label>
            <input type="text" id="pname" name="product_name" class="form-control">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Quantity:</label>
            <input type="text" id="pquantity" name="product_quantity" class="form-control">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Price:</label>
            <input type="text" id="pprice" name="product_price" class="form-control">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">`
            <label for="pmsrp" class="form-label" style="margin-top: 15px">MSRP:</label>
            <input type="text" id="pmsrp" name="product_msrp" class="form-control">
        </div>
    </div>
    <button type="submit" name="create_submit" class="btn btn-success"
            style="margin: 12px">Create
    </button>
</form>
