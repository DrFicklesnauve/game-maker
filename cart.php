<?php

define('TITLE', 'Cart');
include('templates/header.php');

?>

	<!-- HEADER THING -->

	<div class="container store-header">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<h1 id="store-h1" style="font-family: 'Raleway';font-weight: bold; padding: ">Your Cart</h1>
		</div>
	</div>

	<!-- STORE -->

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<table class="table table-striped">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Price</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><img class="img-thumbnail" src="Pictures/plane.jpg"></td>
							<td>Wooden Plane</td>
							<td>$3.50</td>
							<td><p>&times;</p></td>
						</tr>
						<tr>
							<td><img class="img-thumbnail" src="Pictures/train.jpg"></td>
							<td>Wooden Train</td>
							<td>$3.50</td>
							<td><p>&times;</p></td>
						</tr>
						<tr>
							<td><img class="img-thumbnail" src="Pictures/doll.jpg"></td>
							<td>Wooden Doll</td>
							<td>$3.50</td>
							<td><p>&times;</p></td>
						</tr>
						<tr>
							<td><img class="img-thumbnail" src="Pictures/block.jpg"></td>
							<td>Wooden Block</td>
							<td>$3.50</td>
							<td><p>&times;</p></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 cart-form">
				<form>
					<div class="form-wrap">
						<label for="fName">First Name:</label>
						<input class="cart-input" name="fName" type="text">
					</div>
					<div class="form-wrap">
						<label for="lName">Last Name:</label>
						<input class="cart-input" name="lName" type="text">
					</div>
					<div class="form-wrap">
						<label for="email">Email:</label>
						<input class="cart-input" name="email" type="text">
					</div>
					<div class="form-wrap">
						<label for="address">Street Address:</label>
						<input class="cart-input" name="address" type="text">
					</div>
					<input class="submit-button" type="submit"></input>
				</form>
			</div>
		</div>
	</div>

<?php

include('templates/footer.php');

?>