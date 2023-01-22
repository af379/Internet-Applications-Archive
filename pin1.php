<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>

<?php
session_start();
include ("error-report-connect-db.php");
if ( !isset($_SESSION["KBpassed"]))
	{
		echo "Complete Security Questions. Redirecting to form";
		header( "refresh: 4 , url=KB1.php");
		exit ("");
	;}

$pin = mt_rand(10000,99999);
$_SESSION["pin"]=$pin;

$to= "af379@njit.edu";
$message=$pin;
$subject="Authentication Pin";
$headers="MIME-Version: 1.0" . "\r\n";
mail($to,$subject,$message,$headers);

echo "<br> pin is $pin";
?>
<br><br><br>
<form action="pin2.php" method="POST">
	<input type=text name="pin">Enter pin here.<br>
	<input type=submit>
</form>