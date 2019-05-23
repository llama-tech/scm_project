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
		font-size: 5px;

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
<?php
 session_start();

require ('db.php');
$sql = 'SELECT * FROM members where member_id= '.$_SESSION['id'].' ';
$statement = $connection->prepare($sql);
$statement->execute();
$ListMember = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
   <body background="images/a.jpg">
<?php include ('./includes/header.php'); ?>
<div class="row justify-content-center">
  <div class="card mt-5" style="border-radius: 8px; box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.8);">
    <div class="card-header">
      <h2>Profile Update</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
		<thead>
          <th> Member ID</th>
          <th> Username</th>
          <th> Password</th>
          <th> Name </th>
		  <th> IC </th>
		  <th> Address </th>
		  <th> Email </th>
		  <th> Phone Number </th>
		  <th> Action </th></thead>
        </tr>
        <?php foreach($ListMember as $List): ?>
          <tr>
            <td><?= $List->member_id; ?></td>
            <td><?= $List->username; ?></td>
            <td><?= $List->password; ?></td>
			<td><?= $List->name; ?></td>
			<td><?= $List->ic; ?></td>
			<td><?= $List->address; ?></td>
			<td><?= $List->email; ?></td>
			<td><?= $List->phone_no; ?></td>
            <td>
              <a href="editMembers.php?id=<?= $List->member_id ?>" >Edit</a>

            </td>
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
