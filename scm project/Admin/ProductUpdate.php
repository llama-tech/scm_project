<?php

require ('db.php');
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$ListProduct = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
  <body background="images/a.jpg">
<?php include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2>Product Update</h2>
    </div>
    <div class="card-body" align="center">
      <table class="table table-bordered">
        <tr>
          <th>Product ID</th>
		  <th>Image</th>
          <th>Name</th>
          <th>Description</th>
		  <th>Brand</th>
          <th>Price</th>
          <th>Categories</th>
		  <th> Action </th>
        </tr>
        <?php foreach($ListProduct as $List): ?>
          <tr>
            <td><?= $List->product_id; ?></td>
			<?php $imageData = $List->image;  ?>

			<td><?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></td>
            <td><?= $List->name; ?></td>
            <td><?= $List->description; ?></td>
			<td><?= $List->brand; ?></td>
            <td><?= $List->price; ?></td>
			<td><?= $List->categories; ?></td>
            <td>
              <a href="editProduct.php?product_id=<?= $List->product_id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteProduct.php?product_id=<?= $List->product_id ?>" class='btn btn-danger'>Delete</a>
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
