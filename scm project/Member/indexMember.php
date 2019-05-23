
<?php
session_start();
$member_id =$_SESSION["id"];
require ('db.php');
$sql = "SELECT orders.* , product.image
FROM orders
INNER JOIN product ON product.product_id = orders.product_id
WHERE member_id='$member_id' AND order_status = 'Pending'";
$statement = $connection->prepare($sql);
$statement->execute();
$ListOrder = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<style>

@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr {
		display: block;
	}

	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr {
		position: absolute;
		top: -9999px;
		left: -9999px;
	}

	tr { border: 1px solid #ccc; }

	td {
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee;
		position: relative;ss
		padding-left: 50%;
		font-size: 10px;
	}
	td > img{

				width: 100%;

		}
	td:before {
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%;
		padding-right: 10px;
		white-space: nowrap;

	}</style>
<html>
<head></head>
<body background="images/a.jpg">
<?php
$page_title = 'Home Page Admin';
include ('./includes/header.php');
?>


<center><img width="20%" src="images/llamaplug.png" /> </center>

<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2 align="center">Order List</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
		<thead>
          <th>Order ID</th>

          <th>Sneaker Image</th>
          <th>Quantity</th>
          <th>Amount</th>
		  <th>Order Status</th>
          <th>Date Order</th>
	</thead>
        </tr>
        <?php foreach($ListOrder as $List): ?>
          <tr>
            <td><?= $List->	order_id; ?></td>

            <td><?php echo '<img  width="50%" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></td>
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
