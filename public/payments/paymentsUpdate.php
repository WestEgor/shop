<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use repository\payments\PaymentsEntityMethods;
use util\Parser;
use util\Validator;

$id = intval($_REQUEST['id']);

$pdo = Connection::get()->getConnect();
$payment = PaymentsEntityMethods::readPaymentByKey($pdo, $id);

if (isset($_POST['update_submit'])) :
    $errorMessage = '';
    $_SESSION['customers_id'] = $_POST['customers_id'];
    $customersId = $_SESSION['customers_id'];
    if (!Validator::validateInt($customersId)) {
        $errorMessage .= 'Customer id cannot be empty or cannot be string/float' . '</br>';
    }
    $_SESSION['amount'] = $_POST['amount'];
    $amount = $_SESSION['amount'];
    if (!Validator::validateFloat($amount)) {
        $errorMessage .= 'Amount cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['payment_date'] = $_POST['payment_date'];
    $paymentDate = $_SESSION['payment_date'];
    if (!Parser::toDateTime($paymentDate)) {
        $errorMessage .= 'Cannot parse' . '</br>';
    }
    if ($errorMessage === '') :
        PaymentsEntityMethods::updatePayment($pdo, $id, $customersId, $amount, $paymentDate);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=payments.php">';
        ?>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php
    endif;
endif;
?>


<form action="paymentsUpdate.php?id=<?php echo $payment->getId(); ?>" method="POST">
    <div class="row g-3 align-items-center" style="margin-left: 5px">
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pname" class="form-label" style="margin-top: 15px">Customers ID:</label>
            <input type="text" id="pname" name="customers_id" class="form-control"
                   value="<?php echo $payment->getCustomerId(); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pquantity" class="form-label" style="margin-top: 15px">Amount:</label>
            <input type="text" id="pquantity" name="amount" class="form-control"
                   value="<?php echo $payment->getAmount(); ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Payments Date:</label>
            <input type="date" id="pprice" name="payment_date" class="form-control"
                   value="<?php echo $payment->getPaymentDate()->format('Y-m-d') ?>">
        </div>
    </div>
    <button type="submit" name="update_submit" class="btn btn-success"
            style="margin: 12px">Update
    </button>
</form>
