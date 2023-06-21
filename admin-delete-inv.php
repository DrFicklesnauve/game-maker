<?php

define('TITLE', 'Delete Item');
include('templates/header.php');

$id = $_GET['id'];




if (isset($_POST['delete_inv'])) {
	$query = "DELETE FROM inventory WHERE InventoryID = $id LIMIT 1";
	$result = mysqli_query($dbc, $query);
	header("Location: admin-inventory.php");
}

if (!isset($_SESSION['username']) && !isset($_SESSION['admin'])) {
	print '<h1 style="font-family: \'Raleway\'; text-align: center">Sorry, you do not have permission to view this</h1>';
} else {
	if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
			
		print 
		"<div class='container store-header'>
			<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
				<h1 id='store-h1' style='font-family: \"Raleway\";font-weight: bold; padding: ''>Deleting Inventory Item</h1>
			</div>
		</div>
		<div class='container'>";

		echo '<h1 style=\'text-align: center;font-family: font-family: \'Raleway\', sans-serif;\'>Are you sure you want to delete this?</h1> <form method=\'post\'><input type=\'submit\' name=\'delete_inv\' id=\'delete_inv\' value=\'Delete Item\' class=\'submit-button\'></input></form>';

		print "</div>";

			
	}
}



include('templates/footer.php');

?>