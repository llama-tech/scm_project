<?php

require ('db.php');
$sql = 'SELECT * FROM admin';
$statement = $connection->prepare($sql);
$statement->execute();
$ListAdmin = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <body background="images/a.jpg">
<?php include ('./includes/header.php'); ?>
<div class="container">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header" align="center">
      <h2>Admin Update</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered" >
        <tr>
          <th>Admin ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Name </th>
		  <th> Action </th>
        </tr>
        <?php foreach($ListAdmin as $List): ?>
          <tr>
            <td><?= $List->admin_id; ?></td>
            <td><?= $List->username; ?></td>
            <td><?= $List->password; ?></td>
			<td><?= $List->name; ?></td>
            <td>
              <a href="editAdmin.php?id=<?= $List->admin_id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteAdmin.php?id=<?= $List->admin_id ?>" class='btn btn-danger'>Delete</a>
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
