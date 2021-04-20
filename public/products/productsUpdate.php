<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use repository\products\ProductsEntity;
use repository\products\ProductsEntityMethods;
use util\Validator;

$id = intval($_REQUEST['id']);
$pdo = Connection::get()->getConnect();
$product = ProductsEntityMethods::readProductByKey($pdo, $id);
if (isset($_POST['update_submit'])) :
    $errorMessage = '';
    $_SESSION['product_name'] = $_POST['product_name'];
    $name = $_SESSION['product_name'];
    if (!Validator::validateString($name)) {
        $errorMessage .= 'Name of product cannot be empty' . '</br>';
    }
    $_SESSION['product_quantity'] = $_POST['product_quantity'];
    $quantity = $_SESSION['product_quantity'];
    if (!Validator::validateInt($quantity)) {
        $errorMessage .= 'Quantity cannot be empty or cannot be string/float' . '</br>';
    }
    $_SESSION['product_price'] = $_POST['product_price'];
    $price = $_SESSION['product_price'];
    if (!Validator::validateFloat($price)) {
        $errorMessage .= 'Price cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['product_msrp'] = $_POST['product_msrp'];
    $msrp = $_SESSION['product_msrp'];
    if (!Validator::validateFloat($msrp)) {
        $errorMessage .= 'MSRP cannot be empty or cannot be string' . '</br>';
    }

    if ($errorMessage === '') :
        ProductsEntityMethods::updateProduct($pdo, $id, $name, $quantity, $price, $msrp);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=products.php">';
        ?>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php
    endif;
endif;
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
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
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