<?php
require 'db.php';
$admin_id= $_GET['id'];
$sql = 'SELECT * FROM admin WHERE admin_id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $admin_id ]);
$ListAdmin = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['username'])  && isset($_POST['password'])  && isset($_POST['name'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $sql = 'UPDATE admin SET username=:username, password=:password , name=:name WHERE admin_id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':username' => $username,':password' => $password, ':name' => $name, ':id' => $admin_id])) {
    header("Location: /project/Admin/adminUpdate.php");
  }

}


 ?>
  <body background="images/a.jpg">
<?php  include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="center">Update Admin</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group">
          <label for="username">Username</label>
          <input value="<?= $ListAdmin-> username; ?>" type="text" name="username" id="username" class="form-control">
        </div>
          <div class="form-group">
          <label for="password">Password</label>
          <input value="<?= $ListAdmin-> password; ?>" type="text" name="password" id="password" class="form-control">
        </div>
		  <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $ListAdmin->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" style="cursor: pointer;" class="btn btn-info">Update Admin</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
 </body>
