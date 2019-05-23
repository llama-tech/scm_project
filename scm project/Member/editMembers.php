<?php
require 'db.php';
$member_id= $_GET['id'];
$sql = 'SELECT * FROM members WHERE member_id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $member_id ]);
$ListMember = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['username'])  && isset($_POST['password'])  && isset($_POST['name']) && isset($_POST['ic']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone_no'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $ic = $_POST['ic'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];
  $sql = 'UPDATE members SET username= :username, password= :password , name= :name, ic= :ic, address= :address, email= :email, phone_no= :phone_no WHERE member_id= :id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':username' => $username,':password' => $password, ':name' => $name,':ic' => $ic,':address' => $address,':email' => $email,':phone_no' => $phone_no, ':id' => $member_id])) {
    header("Location: /project/Member/membersUpdate.php");
  }

}


 ?>
   <body background="images/a.jpg">
<?php  include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2>Update Profile</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group">
          <label for="username">Username:</label>
          <input value="<?= $ListMember-> username; ?>" type="text" name="username" id="username" class="form-control">
        </div>
          <div class="form-group">
          <label for="password">Password:</label>
          <input value="<?= $ListMember-> password; ?>" type="text" name="password" id="password" class="form-control">
        </div>
		  <div class="form-group">
          <label for="name">Name:</label>
          <input value="<?= $ListMember-> name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
		<div class="form-group">
          <label for="ic">IC:</label>
          <input value="<?= $ListMember->ic; ?>" type="text" name="ic" id="ic" class="form-control">
        </div>
		<div class="form-group">
          <label for="address">Address:</label>
          <input value="<?= $ListMember->address; ?>" type="text" name="address" id="address" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">Email:</label>
          <input value="<?= $ListMember->email; ?>" type="text" name="email" id="email" class="form-control">
        </div>
		<div class="form-group">
          <label for="phone_no">Phone Number:</label>
          <input value="<?= $ListMember-> phone_no; ?>" type="text" name="phone_no" id="phone_no" class="form-control">
        </div>
        <div class="form-group" align="center">
          <button type="submit" style="cursor: pointer;" class="btn btn-info">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php  include ('./includes/footer.html');?>
  </body>
