<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductEntity;
use repository\products\ProductTableInformation;

?>

<html lang="en">

<head>
    <title>Show products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
          crossorigin="anonymous">
</head>

<body>
<?php require '../navbar.php'; ?>
<table class="table table-striped">
    <thead>
    <tr>
        <?php $pdo = Connection::get()->getConnect();
        $columns = new ProductTableInformation($pdo);
        $col = $columns->getColumnName();
        foreach ($col as $column):
            ?>
            <th scope="col"><?php echo $column ?></th>
        <?php endforeach; ?>
    </tr>

    </thead>
    <tbody>
    <?php
    $productsDB = new ProductEntity($pdo);
    $products = $productsDB->readAll();
    foreach ($products as $product):
        ?>
        <tr>
            <th scope="row"><?php echo $product->getId(); ?></th>
            <td><?php echo $product->getProductName(); ?></td>
            <td><?php echo $product->getQuantity(); ?></td>
            <td><?php echo $product->getPrice(); ?></td>
            <td><?php echo $product->getMsrp(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>
