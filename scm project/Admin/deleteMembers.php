<?php
require 'db.php';
$member_id = $_GET['id'];
$sql = 'DELETE FROM members WHERE member_id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $member_id])) {
  header("Location: /project/Admin/membersUpdate.php");
}
?>
