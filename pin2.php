<?php
session_start();
unset ($_SESSION["pinpassed"] );
include ("error-report-connect-db.php");
$pin = $_POST["pin"];
$pin=mysqli_real_escape_string($db,$pin);
if ( !isset($_SESSION["pin"]))
	{
		echo "Please enter pin. Redirecting to form";
		header( "refresh: 4 , url=pin1.php");
		exit ("");
	;}

if($pin ==$_SESSION["pin"])
{
		echo "Correct pin. Redirecting to form.";
		$_SESSION["pinpassed"] = true;
		header( "refresh: 4 , url=services1.php");
		exit ("");
}
else
{
		echo "Incorrect pin. Redirecting to form.";
		header( "refresh: 4 , url=pin1.php");
		exit ("");
}

?>
