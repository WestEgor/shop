<?php
require __DIR__ . '/../vendor/autoload.php';

use config\Connector as Connection;
use repository\TableInformation as Information;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/../public/index.php">YMI</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/../public/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php
        try {
            $pdo = Connection::get()->getConnect();
            $tableNames = new Information($pdo);
            $names = $tableNames->getTableName();
            foreach ($names as $name):
                ?>
                <ul class="navbar-nav">
                    <a class="nav-link" href="/public/<?php echo $name . '/' . $name . '.php' ?>" id="navbar-s"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $name ?>
                    </a>
                </ul>
            <?php endforeach;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } ?>
    </div>
</nav>