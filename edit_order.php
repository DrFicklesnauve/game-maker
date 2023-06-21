<?php

define('TITLE', 'Edit Order');
include('templates/header.php');

$id = $_GET['id'];

if ($_POST['submit_change']) {

	if ($result = mysqli_query($dbc, "SELECT * FROM users AS u INNER JOIN requests AS r ON u.UserID = r.UserID INNER JOIN request_details AS rd ON r.RequestID = rd.RequestID INNER JOIN inventory AS i ON rd.InventoryID = i.InventoryID WHERE r.RequestID = $id")) {

			while ($row = mysqli_fetch_array($result)) {
				$inventory_id = $row['InventoryID'];
				$quant = "newQuant" . $row['InventoryID'];
				$stock = $row['InventoryStock'];
				$req = $row['RequestID'];
				$add_q = mysqli_real_escape_string($dbc, trim(strip_tags($_POST[$quant])));
				if ($_POST[$quant] != "" && $add_q <= $stock) {


					mysqli_query($dbc, "UPDATE request_details SET Request_DetailsQuantity = $add_q WHERE InventoryID = $inventory_id AND RequestID = $req");


					header("Location: order-invoice.php");
				} else if ($_POST[$quant] == "" || $add_q >= $stock) {
					$_SESSION['error'] = "Please make sure the quantity field is filled. Also make sure you are not ordering more than is in stock.";
					$_SESSION['redirect'] = "order-invoice.php";
					header("Location: errorpage.php");
				}
			}
		}
}

if (!isset($_SESSION['username'])) {
	print '<h1 style="font-family: \'Raleway\'; text-align: center">Sorry, you do not have permission to view this</h1>';
} else {
	if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
		$id = $_GET['id'];
		print 
		"<div class='container store-header'>
			<div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
				<h1 id='store-h1' style='font-family: \"Raleway\";font-weight: bold; padding: ''>Edit Order: $id <a href='delete.php?id=$id' style='color: white;'>&times;</a></h1>
			</div>
		</div>
		<div class='container'>
			<form method='post'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";

		if ($result = mysqli_query($dbc, "SELECT * FROM users AS u INNER JOIN requests AS r ON u.UserID = r.UserID INNER JOIN request_details AS rd ON r.RequestID = rd.RequestID INNER JOIN inventory AS i ON rd.InventoryID = i.InventoryID WHERE r.RequestID = $id")) {
			while ($row = mysqli_fetch_array($result)) {
				$total = sprintf("%0.2f", $row['InventoryPrice'] * $row['Request_DetailsQuantity']);
				$_SESSION['request_id'] = $row['RequestID'];
				print 
					'<div class="row product-row">
						<div class="col-sm-2 col-xs-2 col-md-2 col-lg-2">
							<img style="width: 100%"" src="' . $row['InventoryPicture'] . '">
						</div>
						<div class="col-sm-8 col-xs-8 col-md-8 col-lg-8">
							<h2>' . $row['InventoryName'] . '- <small><a href="delete-order.php?id=' . $row['InventoryID'] . '">Delete</a></small></h2>
							<p>You Ordered: </p><input type="text" name="newQuant' . $row['InventoryID'] .'" size="18" value="' . htmlentities($row['Request_DetailsQuantity']) . '">
						</div>
						<div class="col-sm-2 col-xs-2 col-md-2 col-lg-2">
							<p class="price">$ ' . $total . '</p>
						</div>
					</div>';

				
			}
		}

		print "</div></div><button type='submit' name='submit_change' value='Order Now' style='margin-top: 20px;' class='submit-button'>Change Order</button></form></div>";				
	}
}
 
include('templates/footer.php');

?>