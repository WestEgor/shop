<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use config\Connector as Connection;
use model\Customer;
use model\support_classes\Contacts;
use model\support_classes\Location;
use model\support_classes\Person;
use repository\customers\CustomersEntityMethods;
use repository\customers\CustomersEntity;
use util\Validator;


$id = intval($_REQUEST['id']);
$pdo = Connection::get()->getConnect();
$productEntity = new CustomersEntity($pdo);
$customer = CustomersEntityMethods::readCustomersByKey($pdo, $id);

if (isset($_POST['update_submit'])) :
    $errorMessage = '';
    $_SESSION['person_name'] = $_POST['person_name'];
    $name = $_SESSION['person_name'];
    if (!Validator::validateString($name)) {
        $errorMessage .= 'Persons name cannot be empty' . '</br>';
    }
    $_SESSION['person_last_name'] = $_POST['person_last_name'];
    $lastName = $_SESSION['person_last_name'];
    if (!Validator::validateString($lastName)) {
        $errorMessage .= 'Persons last name cannot be empty' . '</br>';
    }
    $_SESSION['person_age'] = $_POST['person_age'];
    $age = $_SESSION['person_age'];
    if (!Validator::validateFloat($age)) {
        $errorMessage .= 'Age cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['country'] = $_POST['country'];
    $country = $_SESSION['country'];
    if (!Validator::validateString($country)) {
        $errorMessage .= 'Country cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['city'] = $_POST['city'];
    $city = $_SESSION['city'];
    if (!Validator::validateString($city)) {
        $errorMessage .= 'City cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['address'] = $_POST['address'];
    $address = $_SESSION['address'];
    if (!Validator::validateString($address)) {
        $errorMessage .= 'Address cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['zip_code'] = $_POST['zip_code'];
    $zipCode = $_SESSION['zip_code'];
    if (!Validator::validateString($zipCode)) {
        $errorMessage .= 'Zip code cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['email'] = $_POST['email'];
    $email = $_SESSION['email'];
    if (!Validator::validateEmail($email)) {
        $errorMessage .= 'Zip code cannot be empty or cannot be string' . '</br>';
    }
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $phoneNumber = $_SESSION['phone_number'];
    if (!Validator::validateString($phoneNumber)) {
        $errorMessage .= 'Phone number code cannot be empty or cannot be string' . '</br>';
    }
    if ($errorMessage === '') :
        $person = new Person($name, $lastName, $age);
        $location = new Location($country, $city, $address, $zipCode);
        $contacts = new Contacts($email, $phoneNumber);
        CustomersEntityMethods::updateCustomer($pdo, $id, $person, $location, $contacts);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        echo '<META HTTP-EQUIV="refresh" content="0;URL=customers.php">';
        ?>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
        <?php
    endif;
endif;
?>

<?php if ($customer instanceof Customer) : ?>
    <form action="customersUpdate.php?id=<?php echo $customer->getId(); ?>" method="POST">
        <div class="row g-3 align-items-center" style="margin-left: 5px">
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="cname" class="form-label" style="margin-top: 15px">Name:</label>
                <input type="text" id="pname" name="person_name" class="form-control"
                       value="<?php echo $customer->getPersonName(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="clastname" class="form-label" style="margin-top: 15px">Last name:</label>
                <input type="text" id="clastname" name="person_last_name" class="form-control"
                       value="<?php echo $customer->getPersonLastName(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pprice" class="form-label" style="margin-top: 15px">Age:</label>
                <input type="text" id="pprice" name="person_age" class="form-control"
                       value="<?php echo $customer->getPersonAge(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Country:</label>
                <input type="text" id="pmsrp" name="country" class="form-control"
                       value="<?php echo $customer->getLocationCountry(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">City:</label>
                <input type="text" id="pmsrp" name="city" class="form-control"
                       value="<?php echo $customer->getLocationCity(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Address:</label>
                <input type="text" id="pmsrp" name="address" class="form-control"
                       value="<?php echo $customer->getLocationAddress(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Zip code:</label>
                <input type="text" id="pmsrp" name="zip_code" class="form-control"
                       value="<?php echo $customer->getLocationZipCode(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Email:</label>
                <input type="text" id="pmsrp" name="email" class="form-control"
                       value="<?php echo $customer->getContactsEmail(); ?>">
            </div>
            <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
                <label for="pmsrp" class="form-label" style="margin-top: 15px">Phone number:</label>
                <input type="text" id="pmsrp" name="phone_number" class="form-control"
                       value="<?php echo $customer->getContactsPhoneNumber(); ?>">
            </div>
        </div>
        <button type="submit" name="update_submit" class="btn btn-success"
                style="margin: 12px">Update
        </button>
    </form>
<?php endif; ?>
