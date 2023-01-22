<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>

<?php
session_start();
include("error-report-connect-db.php");
include("myfunctions.php");
$service = $_GET["services"];
echo "service: $service<br>";
$account = $_GET["account"];
$account=mysqli_real_escape_string($db,$account);
echo "account: $account<br>";
$amount = $_GET["amount"];
$amount=mysqli_real_escape_string($db,$amount);
echo "amount: $amount<br>";
$number = $_GET["number"];
$number=mysqli_real_escape_string($db,$number);
echo "number: $number<br>";
$ucid = $_SESSION["ucid"];
$ucid=mysqli_real_escape_string($db,$ucid);
echo "ucid: $ucid<br>";
if ( !isset($_SESSION["pinpassed"]))
	{
		echo "Pin not authenticated. Redirecting to form";
		header( "refresh: 4 , url=services1.php");
		exit ("");
	;}
if($service =="listTrans"){
	list_transactions_wrapper($db,$ucid);
}
else if($service =="perform"){
	perform($db, $ucid, $account, $amount);
}
else if($service =="listAcc"){
	list_accounts($db,$ucid);
}
else if($service =="resetAcc"){
	reset_account($db,$ucid,$account);
}
else if($service =="recentTrans"){
	list_number_transactions($db,$ucid,$account,$number);
}


?>
		<br><a href="services1.php">Use another service?</a><br><br>

		<a href="logout.php">Logout?</a>
