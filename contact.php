<?php

define('TITLE', 'Contact');
include('templates/header.php');

	if(isset($_POST['submit'])) {
		$fName = $_POST['fName'];
		$lName = $_POST['lName'];
		$name = $fName . " " . $lName;
		$visitor_email = $_POST['email'];
		$message = $_POST['comment'];
		$to = "gamekeeperphp@gmail.com";
		$subject = "Customer Feedback";
		$header = "From: " . $visitor_email;
		mail($to, $subject, $message, $header);
	}
?>

	<!-- MAP -->

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1396.8447144621903!2d-94.16811985688241!3d45.55657281698241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b45fd142b56e3b%3A0x1f3fb336f81bc8bf!2s1300+W+St+Germain+St%2C+St+Cloud%2C+MN+56301!5e0!3m2!1sen!2sus!4v1553194643844" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	<!-- FORM -->

	<div class="container">
	<h1 style="text-align: center;font-family: 'Raleway';font-weight: bold;">Contact Us</h1>
		
		<form method="post" action="" style="width: 90%; margin: auto;">
			<div class="form-wrap">
				<label class="form-label" for="fName">First Name:</label>
				<input class="form-text" name="fName" type="text">
			</div>
			<div class="form-wrap">
				<label class="form-label" for="lName">Last Name:</label>
				<input class="form-text" name="lName"></input>
			</div>
			<div class="form-wrap">
				<label class="form-label" for="email">Email:</label>
				<input class="form-text" name="email"></input>
			</div>
			<div class="form-wrap">
				<label class="form-label" for="comment">Comment:</label>
				<textarea class="form-textarea" name="comment"></textarea>
			</div>
			<input class="submit-button" name="submit" type="submit"></input>
		</form>
	</div>

<?php

include('templates/footer.php');

?>