<?php

use config\Connector as Connection;
use repository\payments\PaymentsColumnsInformation;
use repository\payments\PaymentsEntityMethods;

?>
<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <?php
        $pdo = Connection::get()->getConnect();
        $columns = new PaymentsColumnsInformation($pdo);
        $col = $columns->getColumnName();
        if (is_array($col)) :
            foreach ($col as $column) :
                ?>
                <th scope="col"><?php echo $column ?></th>
            <?php endforeach;
        endif ?>
        <th scope="col">Update column</th>
        <th scope="col">Delete column</th>
    </tr>

    </thead>
    <tbody>
    <?php
    if (!$payments = PaymentsEntityMethods::readAllPayments($pdo)) : ?>
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
        foreach ($payments as $payment) :
            ?>
            <tr>
                <th scope="row"><?php echo $payment->getCustomerId(); ?></th>
                <td><?php echo $payment->getId(); ?></td>
                <td><?php echo $payment->getAmount(); ?></td>
                <td><?php echo $payment->getPaymentDate()?->format('Y-m-d'); ?></td>
                <td><a id="submit_update" class="btn btn-primary"
                       href="paymentsUpdate.php?id=<?php echo $payment->getId(); ?>">Update</a>
                </td>
                <td><a id="submit_delete" class="btn btn-primary"
                       href="paymentsDelete.php?id=<?php echo $payment->getId(); ?>">Delete</a></td>
            </tr>
            <?php
        endforeach;
    endif; ?>
    </tbody>
</table>
