<?php
require 'db.php';
$admin_id = $_GET['id'];
$sql = 'DELETE FROM admin WHERE admin_id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $admin_id])) {
  header("Location: /project/Admin/adminUpdate.php");
}
?>
