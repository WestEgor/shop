<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductEntity;

?>

<html lang="en">

<head>
    <title>Show products</title>
</head>

<body>
<?php require '../navbar.php'; ?>
<?php require 'productsData.php'; ?>

<a class="btn btn-primary" style="margin-left: 10px" href="productsCreate.php">Add new product</a>
<div style="margin-top: 10px">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px">
        <label>
            Search by ID:
            <input type="text" name="search_by_id_products"/>
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Submit</button>
        </label>
    </form>
</div>
<?php
if (isset($_GET['submit'])):
    $id = $_GET['search_by_id_products'];
    if (filter_var($id, FILTER_VALIDATE_INT)):
        $pdo = Connection::get()->getConnect();
        $product = new ProductEntity($pdo);
        $products = $product->read($id);

        ?>
        <table class="table table-striped" style="margin-left: 3px">
            <thead>
            <tr>
                <?php foreach ($col as $column):
                    ?>
                    <th scope="col"><?php echo $column ?>
                    </th>
                <?php endforeach;
                ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><?php echo $products->getId(); ?></th>
                <td><?php echo $products->getName(); ?></td>
                <td><?php echo $products->getQuantity(); ?></td>
                <td><?php echo $products->getPrice(); ?></td>
                <td><?php echo $products->getMsrp(); ?></td>
            </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <?php echo 'ID MUST BE AN INTEGER (NUMBER WITHOUT COMMA)'; ?>
        </div>
    <?php
    endif;
endif;

?>


</body>

</html>
