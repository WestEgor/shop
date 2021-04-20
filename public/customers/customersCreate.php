<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
require '../navbar.php';

use model\Contacts;
use model\Location;
use model\Person;
use repository\customers\CustomersEntityMethods;
use util\Validator;

$name = '';
$lastName = '';
$age = '';
$country = '';
$city = '';
$address = '';
$zipCode = '';
$email = '';
$phoneNumber = '';

if (isset($_POST['create_submit'])) :
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
        $person = Person::parameterizedConstructor($name, $lastName, $age);
        $location = Location::parameterizedConstructor($country, $city, $address, $zipCode);
        $contacts = Contacts::parameterizedConstructor($email, $phoneNumber);
        CustomersEntityMethods::createCustomer($person, $location, $contacts);
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();

        echo '<META HTTP-EQUIV="refresh" content="0;URL=customers.php">';
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
            <label for="cname" class="form-label" style="margin-top: 15px">Name:</label>
            <input type="text" id="pname" name="person_name" class="form-control"
                   value="<?php echo $name ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="clastname" class="form-label" style="margin-top: 15px">Last name:</label>
            <input type="text" id="clastname" name="person_last_name" class="form-control"
                   value="<?php echo $lastName ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pprice" class="form-label" style="margin-top: 15px">Age:</label>
            <input type="text" id="pprice" name="person_age" class="form-control"
                   value="<?php echo $age ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Country:</label>
            <input type="text" id="pmsrp" name="country" class="form-control"
                   value="<?php echo $country ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">City:</label>
            <input type="text" id="pmsrp" name="city" class="form-control"
                   value="<?php echo $city ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Address:</label>
            <input type="text" id="pmsrp" name="address" class="form-control"
                   value="<?php echo $address ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Zip code:</label>
            <input type="text" id="pmsrp" name="zip_code" class="form-control"
                   value="<?php echo $zipCode ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Email:</label>
            <input type="text" id="pmsrp" name="email" class="form-control"
                   value="<?php echo $email ?>">
        </div>
        <div class="col-auto" style="margin-bottom:10px; margin-top: 15px">
            <label for="pmsrp" class="form-label" style="margin-top: 15px">Phone number:</label>
            <input type="text" id="pmsrp" name="phone_number" class="form-control"
                   value="<?php echo $phoneNumber ?>">
        </div>
    </div>
    <button type="submit" name="create_submit" class="btn btn-success"
            style="margin: 12px">Create
    </button>
</form>