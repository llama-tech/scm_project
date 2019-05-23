<style>
.error {color: #FF0000;}
</style>
<?php # Script 7.3 - register.php

$page_title = 'Register';
include ('./includes/header.php');
$errors = array();
$errorsMadeIn = $errorsShoeType = $errorsShoeMaterial_Type = $successfull =  '';
if (isset($_POST['submitted'])) {




	if(empty($_POST['ShoeMaterial_Type'])){
		$errorsShoeMaterial_Type = 'You forgot to Shoe Material Type.';
	}
	else
	{
		$ShoeMaterial_Type = trim($_POST['ShoeMaterial_Type']);
	}

		if(empty($_POST['MadeIn'])){
		$errorsMadeIn = 'You forgot to Made In.';
	}
	else
	{
		$MadeIn = trim($_POST['MadeIn']);
	}
		if(empty($_POST['ShoeType'])){
		$errorsShoeType = 'You forgot to Shoe Type.';
	}
	else
	{
		$ShoeType = trim($_POST['ShoeType']);
	}

	if (empty($errorsMadeIn) && empty($errorsShoeType) && empty($errorsShoeMaterial_Type )){
	$successfull = "Registration Successfull ";
		require_once ('mysql_connect.php');


				$query = "INSERT INTO categories (Shoe_Type,Shoe_Material,Made_In) VALUES
				('$ShoeType','$ShoeMaterial_Type','$MadeIn')";

					$result = @mysqli_query($dbc,$query) OR die ('Could not select the database 1: ' . mysqli_connect_error() );


				}


	}
	?>
	<body background="images/background.jpg">

	<div class="row justify-content-center">
  <div class="card mt-5" align="center">
    <div class="card-header">
	<center>
	<h1>Categories Shoe</h1>
	<form action="Categories.php" method="post">

	</div><br>
		      <div class="form-group" >

	<p>Shoe Material Type : <input type="text" name="ShoeMaterial_Type" size="15" maxlength="50"
	 value="<?php if (isset($_POST['ShoeMaterial_Type'])) echo $_POST['ShoeMaterial_Type'];?>" />
	<span class="error">
	<?php echo $errorsShoeMaterial_Type ; ?>
	</span>
	</div>
		      <div class="form-group" >
	<p>Shoe Type : <input type="text" name="ShoeType" size="15" maxlength="50"
	value="<?php if (isset($_POST['ShoeType'])) echo $_POST['ShoeType'];?>" />
	<span class="error">
	<?php echo $errorsShoeType ; ?>
	</span>
</div>
		      <div class="form-group" >
	<p>Made In : <input type="text" name="MadeIn" size="15" maxlength="50"
	value="<?php if (isset($_POST['MadeIn'])) echo $_POST['MadeIn'];?>" />
	<span class="error">
	<?php echo $errorsMadeIn ; ?>
	</span>
	</div>
		      <div class="form-group" >
	<p><input type="submit" name="submit" value="Submit" class="btn btn-info"/></p>
	<input type="hidden" name="submitted" value="TRUE" class="btn btn-info" /></p>
	<?php echo "$successfull"; ?>
	 </div>
	</center>
	</form>
	  </div>
  </div>
</div>
	<?php
	// include ('./includes/footer.html');
	?>
	</body>
