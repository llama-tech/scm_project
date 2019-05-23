<?php
require ('db.php');

$quantity_sizeID = $_GET['quantity_sizeID'];

$sql = "SELECT quantity_size.*, product.name FROM quantity_size
INNER JOIN product ON product.product_id = quantity_size.product_id
 WHERE
quantity_size.quantity_sizeID='$quantity_sizeID'";
$statement = $connection->prepare($sql);
$statement->execute();
$ListProduct = $statement->fetchAll(PDO::FETCH_OBJ);

$errorsQuan = $errorsSize ="";

if (isset($_POST['submitted'])) {



		require_once ('mysql_connect.php');
	$quantity = trim($_POST['quantity']);
		$size = trim($_POST['size']);

  $sql = "UPDATE quantity_size SET quantity=:quantity, size=:size  WHERE quantity_sizeID=$quantity_sizeID";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':quantity' => $quantity,':size' => $size])) {
    header("Location: /project/Admin/ViewQuantitySize.php");
  }

				}



 ?>
  <body background="images/a.jpg">
  <form  method="post">
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
		  <th>name</th>
        </tr>
		 <tr>  <?php foreach($ListProduct as $List): ?>
		  <th><?= $List->product_id; ?></th>
		   <th><?= $List->name; ?></th>
     </tr>
	  <tr>
		  <th>      <div class="form-group" >
					<p>Quantity : <input type="number" name="quantity"  value="<?= $List->quantity; ?>" />


					</div>
	</th>
		   <th>
					<div class="form-group" >
					<p>Size : 	 <input type="text" value="<?= $List->size; ?>" disabled />
										 <input type="hidden" name="size"  value="<?= $List->size; ?>" />
					</div>

		   </th>
		   <th colspan="2">

				<input type="submit" name="submit" value="Submit" class="btn btn-info" />
				<input type="hidden" name="submitted" value="TRUE" class="btn btn-info" />


		   </th>
     </tr><?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
</form>
 </body>
