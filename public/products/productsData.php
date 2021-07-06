<?php

use config\Connector as Connection;
use repository\products\ProductsEntityMethods;
use repository\products\ProductsColumnsInformation;

?>
<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <?php $pdo = Connection::get()->getConnect();
        $columns = new ProductsColumnsInformation($pdo);
        $col = $columns->getColumnName();
        foreach ($col as $column) :
            ?>
            <th scope="col"><?php echo $column ?></th>
        <?php endforeach; ?>
        <th scope="col">Update column</th>
        <th scope="col">Delete column</th>
    </tr>

    </thead>
    <tbody>
    <?php
    if (!$products = ProductsEntityMethods::readAllProducts($pdo)) : ?>
        <tr>
            <th scope="row">No data</th>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    <?php else :
        foreach ($products as $product) :
            ?>
            <tr>
                <th scope="row"><?php echo $product->getId(); ?></th>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getQuantity(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td><?php echo $product->getMsrp(); ?></td>
                <td><a id="submit_update" class="btn btn-primary"
                       href="productsUpdate.php?id=<?php echo $product->getId(); ?>">Update</a>
                </td>
                <td><a id="submit_delete" class="btn btn-primary"
                       href="productsDelete.php?id=<?php echo $product->getId(); ?>">Delete</a></td>
            </tr>
            <?php
        endforeach;
    endif; ?>
    </tbody>
</table>
