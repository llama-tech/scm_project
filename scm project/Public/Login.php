<style>
    .error {color: #FF0000;}
</style>
<?php
$errorusername = $errorpassword = $errorsTryAgain = '';
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
	if (empty($errorusername) && empty($errorpassword) ){
	require_once ('mysql_connect.php');
	$query =  "SELECT * FROM members";
	$query2 =  "SELECT * FROM admin";
		$result =@mysqli_query($dbc,$query);
		$result2 =@mysqli_query($dbc,$query2);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if ($username ==  $row['username'] && $password == $row['password'])
				{
					session_start();
					$_SESSION['username'] = $row['username'];
					$_SESSION["id"] = $row['member_id'];
					  header("Location: /project/Member/indexMember.php");
				}
				}
		while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				if ($username ==  $row['username'] && $password == $row['password'])
				{
					  header("Location: /project/Admin/indexAdmin.php");
					  session_start();
					$_SESSION['username'] = $row['username'];
					$_SESSION["admin_id"] = $row['admin_id'];
				}

				}
				if (!$username ==  $row['username'] && !$password == $row['password'] && !$username ==  $row['username'] && !$password == $row['password'])
				{	$errorsTryAgain = "Please Correct Input Username and Password ";}
				@mysqli_free_result ($result);

	}
}
 ?>
<?php  include ('./includes/header.php'); ?>

<body background="images/a.jpg">
    <div class="row justify-content-center">
        <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
            <div class="card-header">
                <h2 align="center" style="font-weight: 700;">Login</h2>
            </div>
            <div class="card-body">

                <form action="Login.php" method="post">

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
                    <span class="error">
                        <?php echo $errorsTryAgain ; ?>
                    </span>
                    <br>

                    <div class="form-group" align="center">
                        <p><input type="submit" name="submit" value="Login" style="cursor: pointer;" class="btn btn-info" /></p>
                        <p><input type="hidden" name="submitted" value="TRUE" /></p>
                    </div>

                    <div class="form-group" align="center">
                        <a onclick="return confirm('Are you sure sure want to Register?')" href="members.php">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php  include ('./includes/footer.html');?>
</body>
