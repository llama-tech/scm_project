<style>
    .error {color: #FF0000;}
</style>
<?php # Script 7.3 - members.php

$page_title = 'Members Registration';
include ('./includes/header.php');

$errorusername = $errorpassword = $errorname = $erroric = $erroraddress = $erroremail =  $errorphone = '';
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
	if(empty($_POST['ic'])){
		$erroric = 'You forgot to insert your ic.';
	}
	else
	{
		$ic = trim($_POST['ic']);
	}
	if(empty($_POST['address'])){
		$erroraddress = 'You forgot to insert your address.';
	}
	else
	{
		$address = trim($_POST['address']);
	}
	if(empty($_POST['email'])){
		$erroremail = 'You forgot to insert your email.';
	}
	else
	{
		$email = trim($_POST['email']);
	}
	if(empty($_POST['phone'])){
		$errorphone = 'You forgot to insert your phone number .';
	}
	else
	{
		$phone = trim($_POST['phone']);
	}


	if (empty($errorusername) && empty($errorpassword) && empty($errorname) && empty($erroric) && empty($erroraddress) && empty($erroremail) && empty($errorphone)){



		require_once ('mysql_connect.php');


				$query = "INSERT INTO members (username,password,name,ic,address,email,phone_no) VALUES
				('$username','$password','$name','$ic','$address','$email','$phone')";

					$result = @mysqli_query($dbc,$query) OR die ('Could not select the database 1: ' . mysqli_connect_error() );

				header("Location: /project/Public/Login.php");
				}


	}
	?>

<body background="images/a.jpg">

        <div class="row justify-content-center">
            <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
                <div class="card-header">
                    <h2 align="center" style="font-weight: 700;">Register</h2>
                </div>

                <div class="card-body">

                    <form action="members.php" method="post">
                        <div class="form-group">
                            <p>Username: <br /><input type="text" name="username" size="24" maxlength="50" value="<?php if (isset($_POST['username'])) echo $_POST['username'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $errorusername ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>Password: <br /><input type="password" name="password" size="24" maxlength="50" value="<?php if (isset($_POST['password'])) echo $_POST['password'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $errorpassword ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>Name: <br /><input type="text" name="name" size="24" maxlength="50" value="<?php if (isset($_POST['name'])) echo $_POST['name'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $errorname ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>IC Number: <br /><input type="text" name="ic" size="24" maxlength="50" value="<?php if (isset($_POST['ic'])) echo $_POST['ic'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $erroric ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>Address: <br /><input type="text" name="address" size="24" maxlength="50" value="<?php if (isset($_POST['address'])) echo $_POST['address'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $erroraddress ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>Email: <br /><input type="text" name="email" size="24" maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $erroremail ; ?>
                                </span>
                        </div>
                        <div class="form-group">
                            <p>Phone Number: <br /><input type="text" name="phone" size="24" maxlength="50" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>" />
                                <br />
                                <span class="error">
                                    <?php echo $errorphone ; ?>
                                </span>
                        </div>
                        <div class="form-group" align="center">
                            <p><input type="submit" name="submit" value="Register" style="cursor: pointer;" class="btn btn-info" /></p>
                            <input type="hidden" name="submitted" value="TRUE" class="btn btn-info" /></p>
                        </div>
                    </form>
                </div>




    </div>
    </div>
    <?php include ('./includes/footer.html');
	?>
</body>
