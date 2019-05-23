<?php
require ('db.php');
include ('./includes/header.php');

$product_id= $_GET['product_id'];
$sql = 'SELECT * FROM product WHERE product_id='.$product_id.'';
$statement = $connection->prepare($sql);
$statement->execute([':product_id' => $product_id ]);
$ListProduct = $statement->fetch(PDO::FETCH_OBJ);

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
   <body background="images/a.jpg">
 <form method="post">
<div class="row justify-content-center">
  <div class="card mt-5">
    <div class="card-header">
      <h2 align="center" style="font-weight: 600;">Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">


          <tr>
		   <th colspan="2"><?= $ListProduct ->name; ?> / <?= $ListProduct->brand; ?></th>
		  </tr>
		  <tr>
			<td><?php echo '<img width="400px" src="data:image/jpeg;base64,'.base64_encode(  $ListProduct->image).'" />'; ?></a></td>
			<td><b>Price: </b><br />
         RM<?= $ListProduct->price; ?><br><br>
         <b>Description</b><br />
            <?= $ListProduct -> description; ?><br>
            <br />
            <b>Size Available:</b><br />
            <?php
                      require_once ('mysql_connect.php');

                          $querySelect = "SELECT quantity , size FROM quantity_size where product_id='$product_id' ";
                          $result =@mysqli_query($dbc,$querySelect);

                          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                          echo "<b>".$row["size"]."</b><br>";


                          }

                      ?>
			</td>

		  </tr>
      </table>
    </div>
  </div>
</div>

      </form>
  </body>
