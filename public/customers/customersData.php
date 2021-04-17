<?php

use config\Connector as Connection;
use repository\customers\CustomersEntitiesMethods;
use repository\customers\CustomersTablesInformation;

?>
<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <?php $pdo = Connection::get()->getConnect();
        $columns = new CustomersTablesInformation($pdo);
        $col = $columns->getColumnName();
        foreach ($col as $column):
            ?>
            <th scope="col"><?php echo $column ?></th>
        <?php endforeach; ?>
        <th scope="col">Update column</th>
        <th scope="col">Delete column</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!$customers = CustomersEntitiesMethods::readAllCustomers($pdo)): ?>
        <tr>
            <th scope="row">No data</th>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    <?php else:
        foreach ($customers as $customer):
            ?>
            <tr>
                <th scope="row"><?php echo $customer->getId(); ?></th>
                <td><?php echo $customer->getPersonName(); ?></td>
                <td><?php echo $customer->getPersonLastName(); ?></td>
                <td><?php echo $customer->getPersonAge(); ?></td>
                <td><?php echo $customer->getLocationCountry(); ?></td>
                <td><?php echo $customer->getLocationCity(); ?></td>
                <td><?php echo $customer->getLocationAddress(); ?></td>
                <td><?php echo $customer->getLocationZipCode(); ?></td>
                <td><?php echo $customer->getContactsEmail(); ?></td>
                <td><?php echo $customer->getContactsPhoneNumber(); ?></td>

                <td><a id="submit_update" class="btn btn-primary"
                       href="customersUpdate.php?id=<?php echo $customer->getId(); ?>">Update</a>
                </td>
                <td><a id="submit_delete" class="btn btn-primary"
                       href="customersDelete.php?id=<?php echo $customer->getId(); ?>">Delete</a></td>
            </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>