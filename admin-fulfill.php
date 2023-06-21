<?php

include('login-config.php');

$id = $_GET['id'];

mysqli_query($dbc, "UPDATE requests SET RequestFulfilled = 1 WHERE RequestID = $id");

header("Location: admin-orders.php");

?>