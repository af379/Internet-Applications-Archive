<?php
session_start();
unset ($_SESSION["authenticated"] );
include ("error-report-connect-db.php");


$ucid = $_SESSION["ucid"];
$ucid=mysqli_real_escape_string($db,$ucid);
echo "<br>ucid $ucid<br>";

$pass = $_SESSION["pass"];
$pass=mysqli_real_escape_string($db,$pass);
echo "<br>pass $pass<br>";	

$hash = password_hash($pass, PASSWORD_DEFAULT);

echo "<br>hash is $hash<br>";

include("myfunctions.php");

if ( !authenticate( $db,$ucid,$pass))
	{
		echo "Bad password, Redirecting to form";
		header( "refresh: 4 , url=authenticate.html");
		exit ("");
	;}
else
	{
		echo "Good password, Redirecting to form";
		$_SESSION["authenticated"] = true;
		$_SESSION["ucid"]=$ucid;
		header( "refresh: 4 , url=KB1.php");
		exit ("");
	;}
?>