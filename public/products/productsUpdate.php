<?php
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use model\Product;
use repository\products\ProductEntity;

$id = intval($_REQUEST['id']);
$pdo = Connection::get()->getConnect();
$productEntity = new ProductEntity($pdo);
$product = new Product();
$product = $productEntity->read($id);

if (isset($_POST['update_submit'])) {
    $product->setId($id);
    $product->setName($_POST['product_name']);
    $product->setQuantity($_POST['product_quantity']);
    $product->setPrice($_POST['product_price']);
    $product->setMsrp($_POST['product_msrp']);
    $productEntity->update($product);
    echo '<META HTTP-EQUIV="refresh" content="0;URL=products.php">';
}
?>
    <body>
    <form action="productsUpdate.php?id=<?php echo $product->getId(); ?>" method="POST">
        <div class="row g-3 align-items-center" style="margin-left: 5px">
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pname" class="form-label" style="margin-top: 15px"> Name of product:</label>
                <input type="text" id="pname" name="product_name" class="form-control"
                       value="<?php echo $product->getName(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pquantity" class="form-label" style="margin-top: 15px"> Quantity:</label>
                <input type="text" id="pquantity" name="product_quantity" class="form-control"
                       value="<?php echo $product->getQuantity(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pprice" class="form-label" style="margin-top: 15px"> Price:</label>
                <input type="text" id="pprice" name="product_price" class="form-control"
                       value="<?php echo $product->getPrice(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px"> `
                <label for="pmsrp" class="form-label" style="margin-top: 15px">MSRP:</label>
                <input type="text" id="pmsrp" name="product_msrp" class="form-control"
                       value="<?php echo $product->getMsrp(); ?>">
            </div>
        </div>
        <button type="submit" name="update_submit" class="btn btn-success"
                style="margin: 12px">Update
        </button>
    </form>
    </body>
<?php
