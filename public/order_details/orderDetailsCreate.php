<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use repository\order_details\OrderDetailsEntityMethods;
use util\Validator;

$productId = '';
$orderId = '';
$quantityOrdered = '';
$price = '';

if (isset($_POST['create_submit'])) :
    $errorMessage = '';

    $_SESSION['product_id'] = $_POST['product_id'];
    $productId = $_SESSION['product_id'];
    if (!Validator::validateInt($productId)) {
        $errorMessage .= 'Product ID cannot be empty or cannot be string/float' . '</br>';
    }
    $_SESSION['order_id'] = $_POST['order_id'];
    $orderId = $_SESSION['order_id'];
    if (!Validator::validateInt($orderId)) {
        $errorMessage .= 'Order ID cannot be empty or cannot be string/float' . '</br>';
    }
    $_SESSION['quantity_ordered'] = $_POST['quantity_ordered'];
    $quantityOrdered = $_SESSION['quantity_ordered'];
    if (!Validator::validateInt($quantityOrdered)) {
        $errorMessage .= 'Quantity of ordered product cannot be empty or cannot be string/float' . '</br>';
    }
    $_SESSION['price'] = $_POST['price'];
    $price = $_SESSION['price'];
    if (!Validator::validateFloat($price)) {
        $errorMessage .= 'Price of ordered product cannot be empty' . '</br>';
    }

    if ($errorMessage === '') :
        OrderDetailsEntityMethods::createOrderDetails($productId, $orderId, $quantityOrdered, $price);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=order_details.php">';
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
            <label for="pname" class="form-label" style="margin-top: 15px">Product ID:</label>
            <input type="text" id="pname" name="product_id" class="form-control"
                   value="<?php if ($productId) echo $productId ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Order ID:</label>
            <input type="text" id="pquantity" name="order_id" class="form-control"
                   value="<?php if ($orderId) echo $orderId ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Quantity ordered:</label>
            <input type="text" id="pprice" name="quantity_ordered" class="form-control"
                   value="<?php if ($quantityOrdered) echo $quantityOrdered ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Price:</label>
            <input type="text" id="pmsrp" name="price" class="form-control"
                   value="<?php if ($price) echo $price ?>">
        </div>
    </div>
    <button type="submit" name="create_submit" class="btn btn-success"
            style="margin: 12px">Create
    </button>
</form>

