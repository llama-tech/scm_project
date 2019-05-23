<html>
<head>
<link rel="icon" href="images/favicon.png" type="image/png" />
</head>
<body background="images/a.jpg">
<?php
require ('dbPublic.php');
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$ListProduct = $statement->fetchAll(PDO::FETCH_OBJ);
$page_title = 'Home Page';
include ('./includes/header.php');
?>

<br />
<center><img width="20%" src="images/llamaplug.png" /> </center>

<div class="row justify-content-center">
  <div class="card mt-5"  style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header" align="center">
      <h2 style="font-weight: 600;">Available</h2>
    </div>
    <div class="card-body" >
      <table class="table table-bordered">
        <?php foreach($ListProduct as $List): ?>
          <tr>

			<?php $imageData = $List->image;  ?>

			<td><center><?php echo '<img width="300px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?>
			<br>
			<h3><?= $List->name; ?> / <?= $List->brand; ?><br>
            RM<?= $List->price; ?><br></h3> </center>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php
include ('./includes/footer.html');
?>
</body>
</html>
