<?php
require ('db.php');
$product_id= $_GET['product_id'];
$sql = 'SELECT * FROM product WHERE product_id='.$product_id.'';
$statement = $connection->prepare($sql);
$statement->execute([':product_id' => $product_id ]);
$ListProduct = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['submitted'])) {

	$name = $ListProduct ->name;
  $description = $ListProduct ->description;
  $size =  $_POST['size'];
   $brand =  $ListProduct ->brand;
  $price =  $ListProduct ->price;
	$quantity =  $quantity -1;

	session_start();
// $_SESSION["product_id"]=($ListProduct ->product_id);
// $_SESSION["quantity"]=$quantity;
  $cat_id =  $ListProduct ->cat_id;
	 $sql2 = "UPDATE quantity_size SET  quantity= '$quantity'  WHERE product_id='$product_id'";

  $statement = $connection->prepare($sql2);
    if ($statement->execute([':quantity' => $quantity, ':product_id' => $product_id])) {
		require_once ('mysql_connect.php');

				 $date = date('Y/m/d H:i:s');
					$member_id=$_SESSION["id"];
				$query2 = "INSERT INTO orders (member_id,product_id,quantity,amount,order_status,date_purchase) VALUES
				('$member_id','$product_id','1',' $price','Pending','$date')";

					$result2 = @mysqli_query($dbc,$query2) OR die ('Could not select the database 1: ' . mysqli_connect_error() );
				  header("Location: /project/Member/MemberCheckOut.php");

  }


}






 ?>
   <body background="images/a.jpg">
<?php  include ('./includes/header.php'); ?>
 <form method="post">
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="center">Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">


          <tr>
		   <th colspan="2"><?= $ListProduct ->name; ?> / <?= $ListProduct->brand; ?></th>
		  </tr>
		  <tr>
			<td><?php echo '<img width="100%" src="data:image/jpeg;base64,'.base64_encode(  $ListProduct->image).'" />'; ?></a></td>
			<td><br> <div class="form-group" >
									 Size :
									<select  name="size">
									<?php
									require_once ('mysql_connect.php');

											$querySelect = "SELECT quantity,size FROM quantity_size where
											product_id ='$product_id'";
											$result =@mysqli_query($dbc,$querySelect);

											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

											 echo "<option value='".$row["size"]."'>".$row["size"]."</option>";
										echo "<intput type='hidden' name='quantity' value='".$row["quantity"]."'>";

											}

									?>
										</select>

									</div>  / RM<?= $ListProduct->price; ?><br><br>

			<br><br>
            <?= $ListProduct -> description; ?><br>
            <br>
			<button type="submit" name="submitted" class="btn btn-info">Add To Cart</button>
			</td>

		  </tr>
      </table>
    </div>
  </div>
</div>

      </form>

<?php
// include ('./includes/footer.html');
?>
  </body>
