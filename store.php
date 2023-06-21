<?php

define('TITLE', 'Store');
include('templates/header.php');

	// ON SUBMIT GETS QUANTITY AND IF ORDERED AND CREATES RECORDS ON THE requests AND requests_details TABLES
	if ($_POST['order']) {
		$un = ['username'];
		$user_id = $_SESSION['user-id'];
		$current_time = time();

		mysqli_query($dbc, "INSERT INTO requests (RequestID, UserID, RequestFulfilled, RequestTime) VALUES (0, $user_id, 0, $current_time)");


		// GETS NEWEST RECORD FROM requests THAT WAS JUST ENTERED AND SETS A VARIABLE FOR IT'S ID
		if ($newestRecordResult = mysqli_query($dbc, "SELECT max(RequestID) FROM requests")) {
			
			while ($newestRow = mysqli_fetch_array($newestRecordResult)) {
				$record_id = $newestRow['max(RequestID)'];
				$record_time = $newestRow['RequestTime'];

				if ($result = mysqli_query($dbc, "SELECT * FROM inventory")) {
			
					while ($row = mysqli_fetch_array($result)) {
						$inventory_id = $row['InventoryID'];
						$checked_inv = "checkbox" . $inventory_id;
						$quantity_inv = "quantity" . $inventory_id;
						$inven_inStock = $row['InventoryStock'];
						$add_q = mysqli_real_escape_string($dbc, trim(strip_tags($_POST[$quantity_inv])));


						if (isset($_POST[$checked_inv]) && $_POST[$quantity_inv] != "" && $add_q <= $inven_inStock) {
							mysqli_query($dbc, "INSERT INTO request_details (Request_DetailsID, InventoryID, Request_DetailsQuantity, RequestID) VALUES (0, $inventory_id, $add_q, $record_id)"); 


							mysqli_query($dbc, "UPDATE inventory SET InventoryStock = InventoryStock - $add_q WHERE InventoryID = $inventory_id");


							header("Location: order-invoice.php?id=$record_id");
						} else if (isset($_POST[$checked_inv]) && $_POST[$quantity_inv] == "" || $add_q >= $inven_inStock) {
							$_SESSION['error'] = "Please make sure if the order box is checked, the quantity field is filled as well. Also make sure you are not ordering more than is in stock.";
							$_SESSION['redirect'] = "store.php";
							header("Location: errorpage.php");
						}



					}
				}
			}
		}
		
		
	}

if (!isset($_SESSION['username'])) {
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
		<form name=\'order_form\' action=\'store.php\' method=\'post\'>';


	if ($inven_result = mysqli_query($dbc, $inven_query)) {
		while ($inven_row = mysqli_fetch_array($inven_result)) {
			print 
			"<div class='row product-row'>
				<div class='col-sm-3 col-xs-3 col-md-3 col-lg-3'>
					<img style='width: 100%'' src='{$inven_row['InventoryPicture']}'>
				</div>
				<div class='col-sm-7 col-xs-7 col-md-7 col-lg-7'>
					<h2>{$inven_row['InventoryName']}</h2>
					<p>{$inven_row['InventoryDesc']} - {$inven_row['InventoryStock']} In Stock <br>Order?&nbsp;<input id='checkbox{$inven_row['InventoryID']}' type='checkbox' name='checkbox{$inven_row['InventoryID']}' value='{$inven_row['InventoryID']}'>

					&nbsp;Quantity&nbsp;<input id='quantity{$inven_row['InventoryID']}' type='text' size='10' name='quantity{$inven_row['InventoryID']}''></input></p>

				</div>
				<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
					<p class='price'>$ {$inven_row['InventoryPrice']}</p>
				</div>
			</div>";
		}
	}

	print "<br><button type='submit' name='order' value='Order Now' class='submit-button'>Order Now</button></form></div>

	<!-- CART -->

	<aside>
		<div class='cart'>
			<a href='order-invoice.php'><img style='width: 100%; padding: 20%' src='Pictures/cart.png'></a>
		</div>
	</aside>";



	
}

include('templates/footer.php');

?>