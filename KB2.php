<?php
session_start();
unset ($_SESSION["KBpassed"] );
include ("error-report-connect-db.php");
$answer = $_GET["answer"];
$answer=mysqli_real_escape_string($db,$answer);


if ( !isset($_SESSION["AI"]))
	{
		echo "Please login. Redirecting to form.";
		header( "refresh: 4 , url=authenticate.html");
		exit ("");
	;}

if($answer ==$_SESSION["answer"])
{
		echo "Correct Answer. Redirecting to form.";
		$_SESSION["KBpassed"] = true;
		header( "refresh: 4 , url=pin1.php");
		exit ("");
}
else
{
		echo "Incorrect Answer. Redirecting to form.";
		header( "refresh: 4 , url=KB1.php");
		exit ("");
}
?>
