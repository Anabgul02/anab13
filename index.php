<?php

session_start();
$_SESSION;

include("connection.php");
include("functions.php");

 $user_data=check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
<title> MY Website </title>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Great to see you here</h1>
<br>
Welcome!! <?php echo $user_data['user_name'];?>

</body>
</html>