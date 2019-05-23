<style>
.error {color: #FF0000;}
</style>
<?php # Script 7.3 - admin.php

$page_title = 'Admin Registration';
include ('./includes/header.php');

$errorusername = $errorpassword = $errorname = $successfull = '';
if (isset($_POST['submitted'])) {




	if(empty($_POST['username'])){
		$errorusername = 'You forgot to insert your username.';
	}
	else
	{
		$username = trim($_POST['username']);
	}

	if(empty($_POST['password'])){
		$errorpassword = 'You forgot to insert your password.';
	}
	else
	{
		$password = trim($_POST['password']);
	}
	if(empty($_POST['name'])){
		$errorname = 'You forgot to insert your name.';
	}
	else
	{
		$name = trim($_POST['name']);
	}

	if (empty($errorusername) && empty($errorpassword) && empty($errorname)){
		$successfull = "Registration Successfull ";
		require_once ('mysql_connect.php');


				$query = "INSERT INTO admin (username,password,name) VALUES
				('$username','$password','$name')";

					$result = @mysqli_query($dbc,$query) OR die ('Could not select the database 1: ' . mysqli_connect_error() );


				}


	}
	?>
<body background="images/a.jpg">

	<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
	<h1 align="center">Admin Registration</h1>
	<form action="admin.php" method="post">
	 </div>
    <div class="card-body">
	 <div class="form-group">
	<p>Username: <br /><input type="text" name="username" size="46" maxlength="50"
	 value="<?php if (isset($_POST['username'])) echo $_POST['username'];?>" />
	 <br />
	<span class="error">
	<?php echo $errorusername ; ?>
	</span>
	</div>
		<div class="form-group">
	<p>Password: <br /><input type="password" name="password" size="46" maxlength="50"
	value="<?php if (isset($_POST['password'])) echo $_POST['password'];?>" />
	<br />
	<span class="error">
	<?php echo $errorpassword ; ?>
	</span>
	</div>
		<div class="form-group">
	<p>Name: <br /><input type="text" name="name" size="46" maxlength="50"
	value="<?php if (isset($_POST['name'])) echo $_POST['name'];?>" />
	<br />
	<span class="error">
	<?php echo $errorname ; ?>
	</span>
	</div>
		<div class="form-group" align="center">
	<p><input type="submit" name="submit" value="Submit" style="cursor: pointer;" class="btn btn-info"/></p>
	<input type="hidden" name="submitted" value="TRUE" class="btn btn-info"/></p>
	<?php echo "$successfull"; ?>

	</form>
	</div>
		</div>
  </div>
</div>
	<?php
	// include ('./includes/footer.html');
	?>
	</body>
