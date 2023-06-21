<?php

define('TITLE', 'Admin Page');
include('templates/header.php');

if (!isset($_SESSION['username']) && !$_SESSION['admin']) {
	print '<h1 style="font-family: \'Raleway\'; text-align: center">Sorry, you do not have permission to view this</h1>';
} else {

	print "<div class='container store-header'>
			<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
				<h1 id='store-h1' style='font-family: \"Raleway\";font-weight: bold; padding: ''>Admin Orders</h1>
			</div>
		</div>

		<div class='container'>
			<div class='row'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";

	if ($result = mysqli_query($dbc, "SELECT * FROM requests")) {
		while ($row = mysqli_fetch_array($result)) {

			$request_id = $row['RequestID'];
			if ($row['RequestFulfilled'] == TRUE) {
				$fulfilled = "Fulfilled";
				print '<h2 style="font-family: \'Raleway\', sans-serif;">Request Number: ' . $request_id . ' - <small>Fulfilled</small></h2>';
			} else {
				$fulfilled = "Unfulfilled";
				print "<h2 style=\"font-family: 'Raleway', sans-serif;\">Request Number: $request_id - <small><a href=\"admin_edit_order.php?id={$row['RequestID']}\">Edit</a></small></h2>";
			}

			if ($inner_result = mysqli_query($dbc, "SELECT * FROM users AS u INNER JOIN requests AS r ON u.UserID = r.UserID INNER JOIN request_details AS rd ON r.RequestID = rd.RequestID INNER JOIN inventory AS i ON rd.InventoryID = i.InventoryID WHERE r.RequestID = $request_id")) {
				while ($inner_row = mysqli_fetch_array($inner_result)) {
					$q = $inner_row['Request_DetailsQuantity'];
					$total = sprintf("%0.2f", $q * $inner_row['InventoryPrice']);

					print 
						"<div class='row product-row'>
							<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
								<img style='width: 100%'' src='{$inner_row['InventoryPicture']}'>
							</div>
							<div class='col-sm-8 col-xs-8 col-md-8 col-lg-8'>
								<h2>{$inner_row['InventoryName']}</h2>
								<p>{$inner_row['InventoryDesc']} - $q Ordered</p>
							</div>
							<div class='col-sm-2 col-xs-2 col-md-2 col-lg-2'>
								<p class='price'>$ $total</p>
							</div>
						</div>";
				}
			}
		}
	}

	print "</div></div></div>";
}

include('templates/footer.php');

?>