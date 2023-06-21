<?php

session_start();

$dbc_servername = "localhost";
$dbc_username = "gamekeeper";
$dbc_password = "1234";
$dbc_database = "GameKeeper";

$dbc = mysqli_connect($dbc_servername, $dbc_username, $dbc_password, $dbc_database);

?>

<!DOCTYPE html>
<html>
<head>
	<title>
	<?php
		if (defined('TITLE')) { // Is the title defined?
			print TITLE;
		} else { // The title is not defined.
			print 'GameKeeper LLC';
		}
	?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,800" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="Pictures/company-favicon.png"/>
</head>
<body>

	<!-- NAV --> 

	<div style="width: 100%; background-color: white;">
		<div class="container" style="background-color: white;">
			<div class="row" style="padding: 1% 0">
				<div class="col-xs-4 col-sm-5 col-md-5">
					<ul style="padding-left: 0;" class="hidden-md hidden-lg hidden-xl gk-nav" id="mobile">
						<li id="buttonClick" class="gk-nav-li"><img style="width: 30px" src="Pictures/hamburger.png"></li>
					</ul>
					<ul class="hidden-xs hidden-sm gk-nav">
						<li class="gk-nav-li"><a class="header-link" href="store.php">Store</a></li>
						<li class="gk-nav-li"><a class="header-link" href="about.php">About</a></li>
						<li class="gk-nav-li"><a class="header-link" href="news.php">News</a></li>
						<li class="gk-nav-li"><a class="header-link" href="contact.php">Contact Us</a></li>
					</ul>
				</div>
				<a href="index.php" class="col-xs-4 col-sm-2"><img style="width: 100%" src="Pictures/company-logo.png"></a>
				<div class="col-xs-4 col-sm-5 col-md-5">

<?php
$user_id = $_SESSION['user-id'];
	if ($_SESSION['logged'] == TRUE && $_SESSION['admin'] == FALSE) {
		echo "<p id='menuPara'><a class='header-link' href='logout.php'>Log Out</a></p>";
	} else if ($_SESSION['logged'] == TRUE && $_SESSION['admin'] == TRUE) {
		echo "<p id='menuPara'><a class='header-link' href='admin-orders.php'>Orders</a> | <a class='header-link' href='admin-inventory.php'>Inventory</a> | <a class='header-link' href='logout.php'>Log Out</a></p>";
	} else {
		echo "<p id='menuPara'><a class='header-link' href='login.php'>Log In | Sign Up</a></p>";
	}
?>
				</div>
			</div>
		</div>
	</div>