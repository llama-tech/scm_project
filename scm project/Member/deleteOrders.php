<?php
require ('db.php');
$order_id = $_GET['id'];

$sql2 = "SELECT * FROM orders WHERE order_id='$order_id'";
	$statement2 = $connection->prepare($sql2);
	$statement2->execute([':order' => $order_id ]);
	$Listorder = $statement2->fetch(PDO::FETCH_OBJ);
	$sneaker_id =  ($Listorder  ->sneaker_id);

$sql = "DELETE FROM orders WHERE order_id='$order_id'";
$statement = $connection->prepare($sql);

	if ($statement->execute([':order_id' => $order_id])) {
	//session_start();
//$sneaker_id =$_SESSION["sneaker_id"] ;

	$sql = "SELECT * FROM sneakers WHERE sneaker_id='$sneaker_id'";
	$statement = $connection->prepare($sql);
	$statement->execute([':sneaker_id' => $sneaker_id ]);
	$ListSneakers = $statement->fetch(PDO::FETCH_OBJ);
	$quantity =  ($ListSneakers ->quantity) +1; 
		
	
	
	
	
	//$quantity =  ($_SESSION["quantity"])+1; 
	
	$sql2 = "UPDATE sneakers SET  quantity= '$quantity'  WHERE sneaker_id='$sneaker_id'";
	
  $statement = $connection->prepare($sql2);
    if ($statement->execute([':quantity' => $quantity, ':sneaker_id' => $sneaker_id])) {
	header("Location: /project/Member/MemberCheckOut.php");
	}
}

?>