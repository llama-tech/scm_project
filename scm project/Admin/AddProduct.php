<style>
.error {color: #FF0000;}
</style>
<?php # Script 7.3 - register.php

$page_title = 'Register';
include ('./includes/header.php');
$errors = array();
$errorsName = $errorsDescription  = $errorsBrand = $errorsPrice = $errorscategories  = $successfull = $erorrsPic ='';
if (isset($_POST['submitted'])) {




	if(empty($_POST['Name'])){
		$errorsName = 'You forgot to Shoe Name.';
	}
	else
	{
		$Name = trim($_POST['Name']);
	}

		if(empty($_POST['Description'])){
		$errorsDescription = 'You forgot to Shoe Description.';
	}
	else
	{
		$Description = trim($_POST['Description']);
	}



	if(empty($_POST['Brand'])){
		$errorsBrand = 'You forgot to Shoe Brand.';
	}
	else
	{
		$Brand = trim($_POST['Brand']);
	}

	if(empty($_POST['Price'])){
		$errorsPrice = 'You forgot to Shoe Price.';
	}
	else
	{
		if(is_numeric($_POST['Price'])){
		$Price = trim($_POST['Price']);
		}
		else{
			$errorsPrice = 'Please input valid Shoe Price.';
		}
	}
	if(empty($_POST['categories'])){
		$errorscategories = 'You forgot to Shoe categories.';
	}
	else
	{
		$categories = trim($_POST['categories']);
	}


	$filename = addslashes($_FILES['img']['name']);

	$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));

	$filetype = addslashes($_FILES['img']['type']);
	$filesize = addslashes($_FILES['img']['size']);
	$array = array('jpg','jpeg');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);





	$Size = $_POST['Size'];
	$Cat_id  = $_POST['Cat_id'];
	if (empty($errorsName) && empty($errorsDescription)  && empty($errorsBrand) && empty($errorsPrice) && empty($errorscategories ) ){
		$successfull = "Registration Successfull ";
		require_once ('mysql_connect.php');
				if(in_array($ext, $array)){



				$query2 = "INSERT INTO sneakers (image,nameURL,name,description,size,brand,price,categories) VALUES
				('$tmpname','$filename','$Name','$Description','$Size','$Brand','$Price','$categories')";

					$result2 = @mysqli_query($dbc,$query2) OR die ('Could not select the database 1: ' . mysqli_connect_error() );

			}
				}


	}
	?>
	<body background="images/a.jpg">

	<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
	<h1 align="center" style="font-weight: 700;">Add Product</h1>
	<form action="AddProduct.php" enctype="multipart/form-data" method="post">
	</div><br>
		      <div class="form-group" style="margin: 15px;">
			<input name="img" type="file" />

	</div>
		      <div class="form-group" style="margin-bottom: 0px;">
	<p style="margin-left: 15px;">Name: <br /><input type="text" name="Name" size="37" maxlength="50"
	 value="<?php if (isset($_POST['Name'])) echo $_POST['Name'];?>" />
	<span class="error">
	<?php echo $errorsName ; ?>
	</span>
	</div>
		      <div class="form-group" style="margin-bottom: 0px;">
	<p style="margin-left: 15px;">Description: <br /><input type="text" name="Description" size="37" maxlength="200"
	value="<?php if (isset($_POST['Description'])) echo $_POST['Description'];?>" />
	<span class="error">
	<?php echo $errorsDescription ; ?>
	</span>
</div>
		      <div class="form-group" style="margin-bottom: 0px;">
	<p style="margin-left: 15px;">Categories:<br />
	<select  name="categories"  >
	<option value="T-SHIRTS & GRAPHIC TEES">T-SHIRTS & GRAPHIC TEES</option>
	<option value="SWEATSHIRTS & HOODIES">SWEATSHIRTS & HOODIES</option>
	<option value="PANTS & SHORTS">PANTS & SHORTS</option>
	<option value="POLO SHIRTS">POLO SHIRTS</option>
	<option value="SHIRTS">SHIRTS</option>
	<option value="JEANS & DENIM">JEANS & DENIM</option>
	<option value="FOOTWEAR">FOOTWEAR</option>
	</select>
	<br>
	<span class="error">
	<?php echo $errorscategories ; ?>
	</span>
	</div>
		      <div class="form-group" style="margin-bottom: 0px;">
	<p style="margin-left: 15px;">Brand: <br /><input type="text" name="Brand" size="37" maxlength="50"
	value="<?php if (isset($_POST['Brand'])) echo $_POST['Brand'];?>" />
	<span class="error">
	<?php echo $errorsBrand ; ?>
	</span>
	</div>
		      <div class="form-group" style="margin-bottom: 0px;">
	<p style="margin-left: 15px;">Price: <br /><input type="text" name="Price" size="37" maxlength="50"
	value="<?php if (isset($_POST['Price'])) echo $_POST['Price'];?>" />
	<span class="error">
	<?php echo $errorsPrice ; ?>
	</span>
	</div>


		      <div class="form-group" style="margin-bottom: 0px;" align="center">
	<p><input type="submit" name="submit" style="cursor: pointer;" value="Submit" class="btn btn-info" /></p>
	<input type="hidden" name="submitted" value="TRUE" class="btn btn-info" /></p>
	<?php echo "$successfull"; ?>
	</div>
			  </div>
  </div>
</div>

	</form>
	<?php
	// include ('./includes/footer.html');
	?>
	</body>
