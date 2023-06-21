<?php

define('TITLE', 'Inventory');
include('templates/header.php');


$record_id = 163;

	// ON SUBMIT GETS QUANTITY AND IF ORDERED AND CREATES RECORDS ON THE requests AND requests_details TABLES
	if ($_POST['change']) {

		$new_query = "SELECT * FROM inventory";
		
		if ($result = mysqli_query($dbc, $new_query)) {
			
			while ($row = mysqli_fetch_array($result)) {
				$inventory_id = $row['InventoryID'];
				$quantity_inv = "quantity" . $inventory_id;
				$inven_inStock = $row['InventoryStock'];
				$add_q = mysqli_real_escape_string($dbc, trim(strip_tags($_POST[$quantity_inv])));
				if ($_POST[$quantity_inv] != "") {


					mysqli_query($dbc, "UPDATE inventory SET InventoryStock = $add_q WHERE InventoryID = $inventory_id");


					header("Location: admin-inventory.php");
				} else if ($_POST[$quantity_inv] == "" || $add_q < 0) {
					$_SESSION['error'] = "Please make sure if the order box is checked, the quantity field is filled as well. Also make sure you are not ordering more than is in stock.";
					$_SESSION['redirect'] = "admin-inventory.php";
					header("Location: errorpage.php");
				}
			}
		}
	}

if (!isset($_SESSION['username']) && !isset($_SESSION['admin'])) {
	print '<h1 style="font-family: \'Raleway\'; text-align: center">Sorry, you do not have permission to view this</h1>';
} else {
	

	$inven_query = "SELECT * FROM inventory ORDER BY InventoryID ASC";

	print '
	<!-- HEADER THING -->

	<div class="container store-header">
		<div class="col-sm-12 col-xs-12">
			<h1 id="store-h1" style="font-family: \'Raleway\';font-weight: bold; padding: ">Welcome to Our Store</h1>
			<h3 id="store-h3" style="font-family: \'Raleway\'";">We have a wide selection of wooden games and toys.</h3>
		</div>
	</div>

	<!-- STORE -->

	<div class="container">
		<form method=\'post\'>';


	if ($inven_result = mysqli_query($dbc, $inven_query)) {
		while ($inven_row = mysqli_fetch_array($inven_result)) {
			print 
			"<div class='row product-row'>
				<div class='col-sm-3 col-xs-3 col-md-3 col-lg-3'>
					<img style='width: 100%'' src='{$inven_row['InventoryPicture']}'>
				</div>
				<div class='col-sm-7 col-xs-7 col-md-7 col-lg-7'>
					<h2>{$inven_row['InventoryName']}</h2>
					<p>{$inven_row['InventoryDesc']} - {$inven_row['InventoryStock']} In Stock <br>
					Quantity&nbsp;<input 


					id='quantity{$inven_row['InventoryID']}' type='text' size='10' value='{$inven_row['InventoryStock']}' name='quantity{$inven_row['InventoryID']}''></input></p>

				</div>
				<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
					<h2><a style='color: black' href='admin-delete-inv.php?id={$inven_row['InventoryID']}'><b>&times;</b></a></h2>
				</div>
			</div>";
		}
	}

	print "<br><button type='submit' name='change' value='Change Inventory' class='submit-button'>Change Inventory</button></form></div>";



	
}

include('templates/footer.php');

?>