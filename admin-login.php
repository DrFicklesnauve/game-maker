<?php

define('TITLE', 'Admin Login');
include('templates/header.php');
include('login-config.php');

print "<h2 style='color: red; text-align: center;'>{$_SESSION['success']}</h2>";

?>

<!-- LOGIN BOX -->

	<div class="container body-image">
		<div class="col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 login-modal">
			<form class="login" method="post" action="admin-login.php">
				<h2 style="font-family: 'Raleway', sans-serif; text-align: center;">Login As Admin</h2>
				<div class="form-wrap">
					<label for="username">Username: </label>
					<input style="width: 100%" name="username" type="text">
				</div>
				<div class="form-wrap">
					<label for="password">Password: </label>
					<input type="password" style="width: 100%" name="password"></input>
				</div>
				<button name="admin_user" class="submit-button" type="submit" value="Log In">Log In</button>
			</form>
		</div>
		<div class="col-md-1 col-lg-1"></div>
	</div>

<?php

include('templates/footer.php');

?>