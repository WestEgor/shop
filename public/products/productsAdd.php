<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php require 'public/navbar.php'; ?>
<div>
    <form action="../test/act.php" method="POST">
        <label for="pname">Name of product:</label><br>
        <input type="text" id="pname" name="product_name"><br>

        <label for="pquantity">Quantity:</label><br>
        <input type="text" id="pquantity" name="product_quantity"><br>

        <label for="pprice">Price:</label><br>
        <input type="text" id="pprice" name="product_price"><br>

        <label for="pmsrp">MSRP:</label><br>
        <input type="text" id="pmsrp" name="product_msrp"><br>

        <button type="submit"> SEND</button>
    </form>
</div>

</body>
</html>