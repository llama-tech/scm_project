<?php

require ('db.php');
$sql = 'SELECT * FROM members';
$statement = $connection->prepare($sql);
$statement->execute();
$ListMember = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
  <body background="images/a.jpg">
<?php include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="Center">Profile Update</h2>
    </div>
    <div class="card-body" >
      <table class="table table-bordered">
        <tr>
          <th> Member ID</th>
          <th> Username</th>
          <th> Password</th>
          <th> Name </th>
		  <th> Ic </th>
		  <th> Address </th>
		  <th> Email </th>
		  <th> Phone Number </th>
		  <th> Action </th>
        </tr>
        <?php foreach($ListMember as $List): ?>
          <tr>
            <td><?= $List->member_id; ?></td>
            <td><?= $List->username; ?></td>
            <td><?= $List->password; ?></td>
			<td><?= $List->name; ?></td>
			<td><?= $List->ic; ?></td>
			<td><?= $List->address; ?></td>
			<td><?= $List->email; ?></td>
			<td><?= $List->phone_no; ?></td>
            <td>

              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteMembers.php?id=<?= $List->member_id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
 </body>
