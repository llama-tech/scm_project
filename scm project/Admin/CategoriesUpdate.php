<?php

require ('db.php');
$sql = 'SELECT * FROM categories';
$statement = $connection->prepare($sql);
$statement->execute();
$ListCategories = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <body background="images/background.jpg">
<?php include ('./includes/header.php'); ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2 align="center">Categories</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Catetegories ID</th>
          <th>Shoe Type</th>
          <th>Shoe Material</th>
          <th> Made In </th>
		  <th> Action </th>
        </tr>
        <?php foreach($ListCategories as $List): ?>
          <tr>
            <td><?= $List->cat_id; ?></td>
            <td><?= $List->shoe_type; ?></td>
            <td><?= $List->shoe_material; ?></td>
			<td><?= $List->made_in; ?></td>
            <td>
              <a href="editCategories.php?id=<?= $List->cat_id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteCategories.php?id=<?= $List->cat_id ?>" class='btn btn-danger'>Delete</a>
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
</body >
