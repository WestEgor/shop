<?php
require __DIR__ . '/../vendor/autoload.php';

use config\Connector as Connection;
use repository\TablesInformation as Information;

?>

<head>
    <title>Nav</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/../public/index.php" style="margin-left: 5px">YMI</a>
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
            if ($names = $tableNames->getTableName()):
                foreach ($names as $name):
                    ?>
                    <ul class="navbar-nav">
                        <a class="nav-link" href="/public/<?php echo $name . '/' . $name . '.php' ?>" id="navbar-s"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $name ?>
                        </a>
                    </ul>
                <?php endforeach;
            else:
                echo 'No table in scheme';
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } ?>
    </div>
</nav>

