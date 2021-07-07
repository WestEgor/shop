<?php

use config\Connector as Connection;
use repository\orders\OrdersColumnsInformation;
use repository\orders\OrdersEntityMethods;

?>
<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <?php
        $pdo = Connection::get()->getConnect();
        $columns = new OrdersColumnsInformation($pdo);
        $col = $columns->getColumnName();
        if (is_array($col)) :
            foreach ($col as $column) :
                ?>
                <th scope="col"><?php echo $column ?></th>
                <?php
            endforeach;
        endif; ?>
        <th scope="col">Update column</th>
        <th scope="col">Delete column</th>
    </tr>

    </thead>
    <tbody>
    <?php
    if (!$orders = OrdersEntityMethods::readAllOrders($pdo)) : ?>
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
        foreach ($orders as $order) :
            ?>
            <tr>
                <th scope="row"><?php echo $order->getId(); ?></th>
                <td><?php echo $order->getOrderDate()?->format('Y-m-d'); ?></td>
                <td><?php echo $order->getRequiredDate()?->format('Y-m-d'); ?></td>
                <td><?php echo $order->getStatus(); ?></td>
                <td><?php echo $order->getComments(); ?></td>
                <td><?php echo $order->getCustomerId(); ?></td>
                <td><a id="submit_update" class="btn btn-primary"
                       href="ordersUpdate.php?id=<?php echo $order->getId(); ?>">Update</a>
                </td>
                <td><a id="submit_delete" class="btn btn-primary"
                       href="ordersDelete.php?id=<?php echo $order->getId(); ?>">Delete</a></td>
            </tr>
            <?php
        endforeach;
    endif; ?>
    </tbody>
</table>
