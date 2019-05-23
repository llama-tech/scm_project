<?php

require ('db.php');
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$ListProduct = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['update']) && isset($_POST['quantity_sizeID'])) {
		$quantity_sizeID=$_POST['quantity_sizeID'];

				 header("Location: /project/Admin/UpdateQuantitySize.php?product_id=$product_id&name=$name&quantity_sizeID=$quantity_sizeID");

}



if (isset($_POST['delete']) && isset($_POST['quantity_sizeID'])) {
		$quantity_sizeID=$_POST['quantity_sizeID'];

		$sql = 'DELETE FROM quantity_size WHERE
quantity_sizeID=:quantity_sizeID';
$statement = $connection->prepare($sql);
if ($statement->execute([':quantity_sizeID' => $quantity_sizeID])) {
  header("Location: /project/Admin/ViewQuantitySize.php");
}
}


 ?>
  <body background="images/a.jpg"><form action="ViewQuantitySize.php" method="post">
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
		   <th>Quantity & Size Available</th>
		   <th>Categoties</th>

		  <th> Action </th>
        </tr>
        <?php foreach($ListProduct as $List): ?>
          <tr>
            <td><?= $List->product_id; ?>  </td>
			<?php $imageData = $List->image;  ?>

			<td><?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></td>
            <td><?= $List->name; ?></td>
			<td>
									<select >
									<?php
									require_once ('mysql_connect.php');

											$querySelect = "SELECT * FROM quantity_size where product_id='$List->product_id' ";
											$result =@mysqli_query($dbc,$querySelect);

											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

											echo "<option>Size : ".$row["size"]." | Quantity : ".$row["quantity"]."</option>";


											}

									?>
										</select>
			</td>
			<td><?= $List->categories; ?></td>
            <td>
               <a href="AddQuantitySize.php?product_id=<?= $List->product_id ?>&name=<?= $List->name ?>" class="btn btn-info">Add Quantity & Size</a><br><br>
				Please Choose Size to update or delete Product
					<select name="quantity_sizeID" id="mySelect" onchange="myFunction()">
									<?php
									require_once ('mysql_connect.php');

											$querySelect = "SELECT * FROM quantity_size where product_id='$List->product_id' ";
											$result =@mysqli_query($dbc,$querySelect);

											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

											echo "<option value=".$row["quantity_sizeID"].">Size : ".$row["size"]." | Quantity : ".$row["quantity"]."</option>";


											}

									?>
										</select>
										<br><br>
										<div id="demo"></div>

				<input type="submit" style="cursor: pointer;" name="delete" value="Delete" class="btn btn-info" />

				<input type="submit" style="cursor: pointer;" name="update" value="Update" class="btn btn-info" />


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
 </form>
 <script>
function myFunction() {
	var e = document.getElementById("mySelect");
var strUser = e.options[e.selectedIndex].value;


}
</script>
 </body>
