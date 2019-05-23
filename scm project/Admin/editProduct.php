<?php

require 'db.php';
$product_id= $_GET['product_id'];
$sql = 'SELECT * FROM product WHERE product_id=:product_id';
$statement = $connection->prepare($sql);
$statement->execute([':product_id' => $product_id ]);
$ListSneakers = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['description'])  && isset ($_POST['brand'])  && isset($_POST['price'])  && isset($_POST['categories'])) {

  $name = $_POST['name'];
  $description = $_POST['description'];
   $brand = $_POST['brand'];
  $price = $_POST['price'];
  $categories = $_POST['categories'];

  $sql = 'UPDATE product SET  name= :name, description=:description  , brand=:brand , price=:price  , categories=:categories WHERE product_id=:product_id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name,':description' => $description,':brand' => $brand,':price' => $price, ':categories' => $categories, ':product_id' => $product_id])) {
    header("Location: /project/Admin/ProductUpdate.php");
  }




}


 ?>
  <body background="images/a.jpg">
<?php  include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2>Update Sneakers</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $ListSneakers ->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
          <div class="form-group">
          <label for="description">Description</label>
          <input value="<?= $ListSneakers -> description; ?>" type="text" name="description" id="description" class="form-control">
        </div>
          <div class="form-group">
          <label for="brand">Brand</label>
          <input value="<?= $ListSneakers ->  brand; ?>" type="text" name="brand" id="brand" class="form-control">
        </div>
		  <div class="form-group">
          <label for="price">Price</label>
          <input value="<?= $ListSneakers -> price; ?>" type="text" name="price" id="price" class="form-control">
        </div>
          <div class="form-group">
          <label for="FOOTWEAR">Categories</label>
          <input value="<?= $ListSneakers ->  categories; ?>" type="text" name="categories" id="categories" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" style="cursor: pointer;" class="btn btn-info">Update product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
 </body>
