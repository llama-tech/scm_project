<?php
require 'db.php';
$cat_id = $_GET['id'];
$sql = 'DELETE FROM categories WHERE cat_id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $cat_id])) {
  header("Location: /project/Admin/CategoriesUpdate.php");
}
?>
