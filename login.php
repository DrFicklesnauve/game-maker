<?php

define('TITLE', 'Login/Signup');
include('login-config.php');
include('templates/header.php');

print "<h2 style='color: red; text-align: center;'>{$_SESSION['success']}</h2>";

?>

	<!-- LOGIN BOX -->

	<div class="container body-image">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 login-modal login-left">
			<form class="login" method="post" action="login.php">
				<h2 style="font-family: 'Raleway', sans-serif; text-align: center;">Login</h2>
				<div class="form-wrap">
					<label for="username">Username: </label>
					<input style="width: 100%" name="username" type="text">
				</div>
				<div class="form-wrap">
					<label for="password">Password: </label>
					<input type="password" style="width: 100%" name="password"></input>
				</div>
				<button name="login_user" class="submit-button" type="submit" value="Log In">Log In</button>
			</form>
		</div>
	
		<!-- SIGNUP --->

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 login-modal signup-right">
			<form class="signup" method="post" action="login.php">
				<h2 style="font-family: 'Raleway', sans-serif; text-align: center;">Sign Up</h2>
				<div class="form-wrap">
					<label for="fName">First Name:</label>
					<input style="width: 100%" name="fName" type="text">
				</div>
				<div class="form-wrap">
					<label for="lName">Last Name:</label>
					<input style="width: 100%" name="lName"></input>
				</div>
				<div class="form-wrap">
					<label for="email">Email:</label>
					<input style="width: 100%" name="email"></input>
				</div>
				<div class="form-wrap">
					<label for="username2">Username: </label>
					<input style="width: 100%" name="username2" type="text">
				</div>
				<div class="form-wrap">
					<label for="password2">Password: </label>
					<input type="password" style="width: 100%" name="password2"></input>
				</div>
				<div class="form-wrap">
					<label for="repeat-password">Repeat Password: </label>
					<input type="password" style="width: 100%" name="repeat-password"></input>
				</div>
				<button name="reg_user" class="submit-button" type="submit" value="Sign Up">Sign Up</button>
			</form>

		</div>

		</div>
		<h2 style="text-align: center;"><a href="admin-login.php">Login As Admin</a></h2>
	</div>

<?php

include('templates/footer.php');

?>