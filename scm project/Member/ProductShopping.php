<?php

require ('db.php');
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$Listproduct = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
  <body background="images/a.jpg">
<?php include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="center">Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">

        <?php foreach($Listproduct as $List): ?>
          <tr>

			<?php $imageData = $List->image;  ?>

			<td><a href="ViewDetailsProduct.php?product_id=<?= $List->product_id ?>" class="btn btn-info"><?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></a></td>
            <td><?= $List->name; ?> / <?= $List->brand; ?><br>

            RM<?= $List->price; ?><br></td>


          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php
// include ('./includes/footer.html');
?>
 </body>
