<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use repository\orders\OrdersEntitiesMethods;
use util\Parser;
use util\Validator;


$id = intval($_REQUEST['id']);

$pdo = Connection::get()->getConnect();
$order = OrdersEntitiesMethods::readOrderByKey($pdo, $id);

if (isset($_POST['create_submit'])) :
    $errorMessage = '';

    $_SESSION['order_date'] = $_POST['order_date'];
    $orderDate = $_SESSION['order_date'];
    if (!Parser::toDateTime($orderDate)) {
        $errorMessage .= 'Cannot parse' . '</br>';
    }

    $_SESSION['required_date'] = $_POST['required_date'];
    $requiredDate = $_SESSION['required_date'];
    if (!Parser::toDateTime($requiredDate)) {
        $errorMessage .= 'Cannot parse' . '</br>';
    }

    $_SESSION['status'] = $_POST['status'];
    $status = $_SESSION['status'];
    if (!Validator::validateString($status)) {
        $errorMessage .= 'Status cannot be empty or cannot be string' . '</br>';
    }

    $_SESSION['comments'] = $_POST['comments'];
    $comments = $_SESSION['comments'];
    if (!Validator::validateString($comments)) {
        $errorMessage .= 'Comments cannot be empty or cannot be string' . '</br>';
    }

    $_SESSION['customers_id'] = $_POST['customers_id'];
    $customersId = $_SESSION['customers_id'];
    if (!Validator::validateInt($customersId)) {
        $errorMessage .= 'Customer id cannot be empty or cannot be string/float' . '</br>';
    }


    if ($errorMessage === '') :
        OrdersEntitiesMethods::createOrder($orderDate, $requiredDate, $status, $comments, $customersId);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=orders.php">';
        ?>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php
    endif;
endif;
?>


<form action="ordersUpdate.php?id=<?php echo $order->getId(); ?>" method="POST">
    <div class="row g-3 align-items-center" style="margin-left: 5px">

        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Order date:</label>
            <input type="date" id="pprice" name="order_date" class="form-control"
                   value="<?php echo $order->getOrderDate()->format('Y-m-d'); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Required date:</label>
            <input type="date" id="pprice" name="required_date" class="form-control"
                   value="<?php echo $order->getRequiredDate()->format('Y-m-d'); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Status:</label>
            <input type="text" id="pquantity" name="status" class="form-control"
                   value="<?php echo $order->getStatus(); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Comments:</label>
            <input type="text" id="pquantity" name="comments" class="form-control"
                   value="<?php echo $order->getComments(); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pname" class="form-label" style="margin-top: 15px">Customers ID:</label>
            <input type="text" id="pname" name="customers_id" class="form-control"
                   value="<?php echo $order->getCustomerId(); ?>">
        </div>
    </div>
    <button type="submit" name="create_submit" class="btn btn-success"
            style="margin: 12px">Update
    </button>
</form>

