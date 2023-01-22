<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>
<style> td{color:black;} th {color:black; } </style>
<style> tr:nth-child(even){background-color:#cccccc}</style>
<?php
session_start();
$ucid = $_SESSION["ucid"];
setcookie("doneBy","$ucid",time()+(86400+30),"/");
setcookie("doneAt",date('l j S\of F Y h:i:s A'),time()+(86400*30),"/");

include("error-report-connect-db.php");
include("myfunctions.php");

if ( !isset($_SESSION["authenticated"]))
	{
		echo "Please login, Redirecting to form";
		header( "refresh: 4 , url=authenticate.html");
		exit ("");
	;}
list_transactions_wrapper($db,$ucid);
?>
<br><br><br>

		<a href="logout.php">Logout?</a>