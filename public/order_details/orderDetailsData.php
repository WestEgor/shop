<?php

use config\Connector as Connection;
use repository\order_details\OrderDetailsEntityMethods;
use repository\order_details\OrderDetailsTablesInformation;

?>
<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <?php $pdo = Connection::get()->getConnect();
        $columns = new OrderDetailsTablesInformation($pdo);
        $col = $columns->getColumnName();
        if (is_array($col)):
            foreach ($col as $column):
                ?>
                <th scope="col"><?php echo $column ?></th>
            <?php endforeach; endif; ?>
        <th scope="col">Update column</th>
        <th scope="col">Delete column</th>
    </tr>

    </thead>
    <tbody>
    <?php
    if (!$orderDetailsArray = OrderDetailsEntityMethods::readAllOrderDetails($pdo)): ?>
        <tr>
            <th scope="row">No data</th>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    <?php else:
        foreach ($orderDetailsArray as $orderDetails):
            ?>
            <tr>
                <th scope="row"><?php echo $orderDetails->getId(); ?></th>
                <td><?php echo $orderDetails->getProductId(); ?></td>
                <td><?php echo $orderDetails->getOrderId(); ?></td>
                <td><?php echo $orderDetails->getQuantityOrdered(); ?></td>
                <td><?php echo $orderDetails->getPrice(); ?></td>
                <td><a id="submit_update" class="btn btn-primary"
                       href="orderDetailsUpdate.php?id=<?php echo $orderDetails->getId(); ?>">Update</a>
                </td>
                <td><a id="submit_delete" class="btn btn-primary"
                       href="orderDetailsDelete.php?id=<?php echo $orderDetails->getId(); ?>">Delete</a></td>
            </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>
