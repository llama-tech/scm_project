<?php
require ('db.php');
$product_id= $_GET['product_id'];
$sql = 'SELECT * FROM product WHERE product_id='.$product_id.'';
$statement = $connection->prepare($sql);
$statement->execute([':product_id' => $product_id ]);
$ListProduct = $statement->fetch(PDO::FETCH_OBJ);

 ?>
   <body background="images/background.jpg">
 <form method="post">
<div class="row justify-content-center">
  <div class="card mt-5">
    <div class="card-header">
      <h2 align="center">P R O D U C T </h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
       
      
          <tr>
		   <th colspan="2"><?= $ListProduct ->name; ?> / <?= $ListProduct->brand; ?></th>
		  </tr>
		  <tr>			
			<td><?php echo '<img width="400px" src="data:image/jpeg;base64,'.base64_encode(  $ListProduct->image).'" />'; ?></a></td>  
			<td><br><?php 
									require_once ('mysql_connect.php');
										
											$querySelect = "SELECT quantity , size FROM quantity_size where product_id='$product_id' ";
											$result =@mysqli_query($dbc,$querySelect);
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											
											echo "Size Available : ".$row["size"]."<br>";

											
											}
										
									?> RM<?= $ListProduct->price; ?><br><br>
            <?= $ListProduct -> description; ?><br>
       
			</td>  
          
		  </tr>
      </table>
    </div>
  </div>
</div>

      </form>
  </body>