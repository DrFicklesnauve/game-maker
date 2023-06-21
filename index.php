<?php

define('TITLE', 'GameKeeper LLC');
include('templates/header.php');

?>

	<!-- HERO IMAGE -->

	<div class="hero-image">
	  <div class="hero-text">
	    <h1 style="font-size: 4em;font-family: 'Raleway';font-weight: bold;">GameKeeper LLC.</h1>
	    <p>Welcome To Our Store</p>
	  </div>
	</div>

	<!-- SQUARES -->

	<div class="container">
		<div class="row">
		<a href="index.html">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 top-left square">
				<div class="bottom-text">
					<a href="store.php">Store</a>
				</div>
			</div>
			</a>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 top-right square">
				<div class="bottom-text">
					<a href="about.php">About</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bottom-left square">
				<div class="bottom-text">
					<a href="news.php">News</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bottom-right square">
				<div class="bottom-text">
					<a href="contact.php">Contact</a>
				</div>
			</div>
		</div>
	</div>

<?php

include('templates/footer.php');

?>