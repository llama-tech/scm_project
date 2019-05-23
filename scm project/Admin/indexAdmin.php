<html>
<head></head>
<body background="images/a.jpg">
<?php
session_start();
$admin_id =$_SESSION["admin_id"];
require ('db.php');

$sql = "SELECT orders.* , product.image
FROM orders
INNER JOIN product ON product.product_id = orders.product_id";
$statement = $connection->prepare($sql);
$statement->execute();
$ListOrder = $statement->fetchAll(PDO::FETCH_OBJ);


$page_title = 'Home Page Admin';
include ('./includes/header.php');
?>

<center><img width="10%"  src="images/llamaplug.png" /> </center>

<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 10px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="center">Order List</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Order Id</th>
		  <th>member Id</th>
          <th>Sneaker Image</th>
          <th>Quantity</th>
          <th>Amount</th>
		  <th>Order Status</th>
          <th>Date Purchase</th>

        </tr>
        <?php foreach($ListOrder as $List): ?>
          <tr>
            <td><?= $List->	order_id; ?></td>
			<td><?= $List->	member_id; ?></td>
            <td><?php echo '<img width="300px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></td>
            <td><?= $List->quantity; ?></td>
			<td><?= $List->amount; ?></td>
			<td><?= $List->order_status; ?></td>
            <td><?= $List->date_purchase; ?></td>

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
</html>
