<?php

define('TITLE', 'Error');
include('templates/header.php');

echo '<h1 style=\'text-align: center;font-family: font-family: \'Raleway\', sans-serif;\'>' . $_SESSION['error'] . ' You will be redirected in five seconds.</h1>';

$redirect_link = $_SESSION['redirect'];

header("refresh:5; url=$redirect_link");

include('templates/footer.php');

?>