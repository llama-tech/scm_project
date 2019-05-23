<?php
require 'db.php';
$product_id = $_GET['product_id'];
$sql = 'DELETE FROM product WHERE product_id=:product_id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $sneaker_id])) {
  header("Location: /project/Admin/ProductUpdate.php");
}

?>