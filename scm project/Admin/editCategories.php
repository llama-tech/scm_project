<?php
require 'db.php';
$cat_id= $_GET['id'];
$sql = 'SELECT * FROM categories WHERE cat_id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $cat_id ]);
$ListCategories = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['shoe_type'])  && isset($_POST['shoe_material'])  && isset($_POST['made_in'])) {

  $shoe_type = $_POST['shoe_type'];
  $shoe_material = $_POST['shoe_material'];
  $made_in = $_POST['made_in'];
  $sql = 'UPDATE categories SET shoe_type=:shoe_type, shoe_material=:shoe_material , made_in=:made_in WHERE cat_id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':shoe_type' => $shoe_type,':shoe_material' => $shoe_material, ':made_in' => $made_in, ':id' => $cat_id])) {
    header("Location: /project/Admin/CategoriesUpdate.php");
  }



}


 ?>
 <body background="images/background.jpg">
<?php  include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5">
    <div class="card-header">
      <h2 >Update Categories</h2>
    </div>
    <div class="card-body"  align="center">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group" >
          <label for="shoe_type">Shoe Type</label>
          <input value="<?= $ListCategories->shoe_type; ?>" type="text" name="shoe_type" id="shoe_type" class="form-control">
        </div>
          <div class="form-group">
          <label for="shoe_material">Shoe Material</label>
          <input value="<?= $ListCategories->shoe_material; ?>" type="text" name="shoe_material" id="shoe_material" class="form-control">
        </div>
		  <div class="form-group">
          <label for="made_in">Made In</label>
          <input value="<?= $ListCategories->made_in; ?>" type="text" name="made_in" id="made_in" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
 </body>
