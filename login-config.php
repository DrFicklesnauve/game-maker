<?php

session_start();

$dbc_servername = "localhost";
$dbc_username = "gamekeeper";
$dbc_password = "1234";
$dbc_database = "GameKeeper";

$dbc = mysqli_connect($dbc_servername, $dbc_username, $dbc_password, $dbc_database);

// REG USER

if ($_POST['reg_user']) {
	$fName = mysqli_real_escape_string($dbc, $_POST['fName']);
	$lName = mysqli_real_escape_string($dbc, $_POST['lName']);
	$username2 = mysqli_real_escape_string($dbc, $_POST['username2']);
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	$password2 = mysqli_real_escape_string($dbc, $_POST['password2']);
	$repeat_password = mysqli_real_escape_string($dbc, $_POST['repeat-password']);

	$user_check_query = "SELECT * FROM users WHERE UserUsername = '$username2' OR UserEmail = '$email' LIMIT 1";

	$result = mysqli_query($dbc, $user_check_query);

	$user = mysqli_fetch_assoc($result);

	if ($user) {
		if ($user['UserUsername'] === $username2) {
			echo "<script type='text/javascript'>return false; alert('That username already exists'); </script>";
		}

		if ($user['UserEmail'] === $email) {
			echo "<script type='text/javascript'>return false; alert('That email is already in use'); </script>";
		}
	} else {
		$password_final = md5($password2);

		$query = "INSERT INTO users (UserID, UserFirstName, UserLastName, UserEmail, UserUsername, UserPassword, UserAdminStatus) VALUES (0, '$fName', '$lName', '$email', '$username2', '$password_final', 0)";
		mysqli_query($dbc, $query);
		$_SESSION['username'] = $username2;
		$_SESSION['logged'] = TRUE;

		if ($result_id = mysqli_query($dbc, "SELECT UserID FROM users WHERE UserUsername = '$username2'")) {
			while ($row_id = mysqli_fetch_array($result_id)) {
				$_SESSION['user-id'] = $row_id['UserID'];
			}
		}

		header('location: index.php');
	}

} 

// LOGIN 

else if ($_POST['login_user']) {
	$username = mysqli_real_escape_string($dbc, $_POST['username']);
  	$password = mysqli_real_escape_string($dbc, $_POST['password']);

  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE UserUsername = '$username' AND UserPassword = '$password'";
  	$results = mysqli_query($dbc, $query);
  	if (mysqli_num_rows($results) == 1) {
  		$_SESSION['username'] = $username;
  		$_SESSION['success'] = "This shows that it succeeded";
  		$_SESSION['logged'] = TRUE;

  		if ($result_id = mysqli_query($dbc, "SELECT UserID FROM users WHERE UserUsername = '$username'")) {
			while ($row_id = mysqli_fetch_array($result_id)) {
				$_SESSION['user-id'] = $row_id['UserID'];
			}
		}

  		header('location: index.php');
  	} else {
  		$_SESSION['success'] = "Wrong username/password";
  	}
} 

// ADMIN LOGIN

else if ($_POST['admin_user']) {
	$username = mysqli_real_escape_string($dbc, $_POST['username']);
	$password = mysqli_real_escape_string($dbc, $_POST['password']);

	$password = md5($password);
	$query = "SELECT * FROM users WHERE UserUsername = '$username' AND UserPassword = '$password' AND UserAdminStatus = 1";
	$results = mysqli_query($dbc, $query);
	if (mysqli_num_rows($results) == 1) {
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in as an admin";
		$_SESSION['logged'] = TRUE;
		$_SESSION['admin'] = TRUE;
		header('location: admin-orders.php');
	} else {
		$_SESSION['success'] = "Wrong username/password or you are not an admin";
	}

	
}


?>