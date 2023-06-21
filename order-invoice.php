<?php

define('TITLE', 'Order Invoice');
include('templates/header.php');

$user_id = $_SESSION['user-id'];
$un = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
	print '<h1 style="font-family: \'Raleway\'; text-align: center">Sorry, you do not have permission to view this</h1>';
} else {
	print "<div class='container store-header'>
			<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
				<h1 id='store-h1' style='font-family: \"Raleway\";font-weight: bold; padding: ''>$un's Orders</h1>
			</div>
		</div>

		<div class='container'>
			<div class='row'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";

	if ($result = mysqli_query($dbc, "SELECT * FROM requests WHERE UserID = $user_id")) {
		while ($row = mysqli_fetch_array($result)) {
			$request_id = $row['RequestID'];
			if ($row['RequestFulfilled'] == TRUE) {
				$fulfilled = "Fulfilled";
				print '<h2 style="font-family: \'Raleway\', sans-serif;">Request Number: ' . $request_id . ' - <small>Fulfilled</small></h2>';
			} else {
				$fulfilled = "Unfulfilled";
				print "<h2 style=\"font-family: 'Raleway', sans-serif;\">Request Number: $request_id - <small><a href=\"edit_order.php?id={$row['RequestID']}\">Edit</a></small></h2>";
			}

			if ($disp_results = mysqli_query($dbc, "SELECT * FROM request_details WHERE RequestID = $request_id")) {
				while ($new_row = mysqli_fetch_array($disp_results)) {
					$inventory_id = $new_row['InventoryID'];
					$q = $new_row['Request_DetailsQuantity'];

					if ($inven_results = mysqli_query($dbc, "SELECT * FROM inventory WHERE InventoryID = $inventory_id")) {
						while ($inven_row = mysqli_fetch_array($inven_results)) {
							$total = sprintf("%0.2f", $q * $inven_row['InventoryPrice']);

							print 
							"<div class='row product-row'>
								<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
									<img style='width: 100%'' src='{$inven_row['InventoryPicture']}'>
								</div>
								<div class='col-sm-8 col-xs-8 col-md-8 col-lg-8'>
									<h2>{$inven_row['InventoryName']}</h2>
									<p>{$inven_row['InventoryDesc']} - $q Ordered</p>

								</div>
								<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
									<p class='price'>$ $total</p>
								</div>
							</div>";
						}
					}
				}
			}
		}
		
	} else {
		print '<h1 style="font-family: \'Raleway\', sans-serif;">You have no orders</h1>';
	}

	print "</div></div></div>";

}

include('templates/footer.php');

?>