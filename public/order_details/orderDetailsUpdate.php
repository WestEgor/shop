<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use model\OrderDetails;
use repository\order_details\OrderDetailsEntityMethods;
use util\Validator;

$id = intval($_REQUEST['id']);
$pdo = Connection::get()->getConnect();
$orderDetails = OrderDetailsEntityMethods::readOrderDetailsByKey($pdo, $id);

if (isset($_POST['update_submit'])) :
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
        OrderDetailsEntityMethods::updateOrderDetails($pdo, $id, $productId, $orderId, $quantityOrdered, $price);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=order_details.php">';
        ?>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
        <?php
    endif;
endif;
?>

<?php if ($orderDetails instanceof OrderDetails) : ?>
    <form action="orderDetailsUpdate.php?id=<?php echo $orderDetails->getId(); ?>" method="POST">
        <div class="row g-3 align-items-center" style="margin-left: 5px">
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pname" class="form-label" style="margin-top: 15px">Product ID:</label>
                <input type="text" id="pname" name="product_id" class="form-control"
                       value="<?php echo $orderDetails->getProductId(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pquantity" class="form-label" style="margin-top: 15px">Order ID:</label>
                <input type="text" id="pquantity" name="order_id" class="form-control"
                       value="<?php echo $orderDetails->getOrderId(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pprice" class="form-label" style="margin-top: 15px">Quantity ordered:</label>
                <input type="text" id="pprice" name="quantity_ordered" class="form-control"
                       value="<?php echo $orderDetails->getQuantityOrdered(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Price:</label>
                <input type="text" id="pmsrp" name="price" class="form-control"
                       value="<?php echo $orderDetails->getPrice(); ?>">
            </div>
        </div>
        <button type="submit" name="update_submit" class="btn btn-success"
                style="margin: 12px">Update
        </button>
    </form>
<?php endif; ?>
