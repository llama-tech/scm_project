<?php

$product_id = $_GET['product_id'];
$name = $_GET['name'];
$errorsQuan = $errorsSize ="";

if (isset($_POST['submitted'])) {




	if(empty($_POST['quantity'])){
		$errorsQuan = 'You forgot to Quantity.';
	}
	else
	{
		$quantity = trim($_POST['quantity']);
	}
	if(empty($_POST['size'])){
		$errorsQuan = 'You forgot to Size.';
	}
	else
	{
		$size = trim($_POST['size']);
	}
	if (empty($errorsQuan) && empty($errorsQuan) ){

		require_once ('mysql_connect.php');

				$query = "INSERT INTO quantity_size (quantity,size,product_id) VALUES
				('$quantity','$size','$product_id')";

					$result = @mysqli_query($dbc,$query) OR die ('Could not select the database 1: ' . mysqli_connect_error() );
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
		 <tr>
		  <th><?php echo $product_id ?></th>
		   <th><?php echo $name ?></th>
     </tr>
	  <tr>
		  <th>      <div class="form-group" >
					<p>Quantity : <input type="number" name="quantity"  />
					<span class="error">
					<?php echo $errorsQuan ; ?>
					</span>
					</div>
	</th>
		   <th>
					<div class="form-group" >
					<p>Size : 	<select  name="size"  >
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
								<option value="6 UK">6 UK</option>
								<option value="7 UK">7 UK</option>
								<option value="8 UK">8 UK</option>
								<option value="9 UK">9 UK</option>
								<option value="10 UK">10 UK</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
										</select>
										<span class="error">
					<?php echo $errorsSize ; ?>
					</span>
					</div>

		   </th>
		   <th colspan="2">

				<input type="submit" name="submit" value="Submit" class="btn btn-info" />
				<input type="hidden" name="submitted" value="TRUE" class="btn btn-info" />


		   </th>
     </tr>
      </table>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
</form>
 </body>
