<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use repository\products\ProductsEntity;
use repository\products\ProductsEntitiesMethods;
use util\Validator;

$pdo = Connection::get()->getConnect();

if (isset($_POST['create_submit'])) :
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
    $productEntity = new ProductsEntity($pdo);
    if ($errorMessage === '') :
        ProductsEntitiesMethods::createProduct($pdo, $name, $quantity, $price, $msrp);
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


<form action="<? echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="row g-3 align-items-center" style="margin-left: 5px">
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pname" class="form-label" style="margin-top: 15px">Name of product:</label>
            <input type="text" id="pname" name="product_name" class="form-control"
                   value="<?php $_SESSION['product_name'] ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Quantity:</label>
            <input type="text" id="pquantity" name="product_quantity" class="form-control"
                   value="<?php $_SESSION['product_quantity'] ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Price:</label>
            <input type="text" id="pprice" name="product_price" class="form-control"
                   value="<?php $_SESSION['product_price'] ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">MSRP:</label>
            <input type="text" id="pmsrp" name="product_msrp" class="form-control"
                   value="<?php $_SESSION['product_msrp'] ?>">
        </div>
    </div>
    <button type="submit" name="create_submit" class="btn btn-success"
            style="margin: 12px">Create
    </button>
</form>
