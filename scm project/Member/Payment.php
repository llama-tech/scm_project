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

	}

.error {color: #FF0000;}
</style>
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
$Total = 0;
$errorCardNumber ="";

if (isset($_POST['submitted'])) {

	if(is_numeric($_POST['CardNumber'])){

			$sql2 = "UPDATE orders SET  order_status= 'Successful'  WHERE member_id='$member_id'";

			$statement = $connection->prepare($sql2);
    if ($statement->execute([':order_status' => 'Successful', ':member_id' => $member_id])) {
		header("Location: /project/Member/MemberCheckOut.php");
			}

	}
	else{ $errorCardNumber ="Please input numberic number ";}
}

 ?>
  <body background="images/background.jpg">
<?php include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5">
    <div class="card-header">
      <h2 align="center">Payment</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr> <thead>
          <th>Order_id</th>
		  <th>member_id</th>
          <th>Sneaker_id</th>
          <th>Quantity</th>
          <th>Amount</th>
		  <th>Order Status</th>
          <th>Date Order</th>
		   </thead>
        </tr>
        <?php foreach($ListOrder as $List): ?>
          <tr>
            <td><?= $List->	order_id; ?></td>
			<td><?= $List->	member_id; ?></td>
            <td><?php echo '<img width="400px" src="data:image/jpeg;base64,'.base64_encode(  $List->image).'" />'; ?></td>
            <td><?= $List->quantity; ?></td>
			<td><?= $List->amount; ?></td>
			<td><?= $List->order_status; ?></td>
            <td><?= $List->date_purchase; ?></td> <?php

			$Total = ($List->amount) + $Total; ?>

          </tr>

        <?php endforeach; ?>
		 <tr> <th colspan="7" align="Center">
             Total RM <?php echo "$Total"; ?>

            </th></tr>

      </table>
	   <form action="Payment.php" method="post" align="center">

        <div class="form-group">
          <p>Visa : <select>
					  <option>Visa</option>
					  <option>Master Card</option>
					  <option>Amex</option>

					</select>
        </div>
		<div class="form-group">
          <p>Card Number : <input type="CardNumber" name="CardNumber" size="15" maxlength="50"
			value="<?php if (isset($_POST['CardNumber'])) echo $_POST['CardNumber'];?>" />
			<span class="error">
			<?php echo $errorCardNumber ; ?>
		</span>

		<br><br>
        <div class="form-group" align="center">
          <p><input type="submit" name="submit" value="Submit" class="btn btn-info"/></p>
		<p><input type="hidden" name="submitted" value="TRUE" /></p>
        </div>

		    </form>
    </div>
  </div>
</div>



<?php
// include ('./includes/footer.html');
?>
 </body>
