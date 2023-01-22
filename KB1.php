<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>

<?php

session_start();
$ucid = $_SESSION["ucid"];
setcookie("doneBy","$ucid",time()+(86400+30),"/");
setcookie("doneAt",date('l j S\of F Y h:i:s A'),time()+(86400*30),"/");
unset($_SESSION["AI"]);

include("error-report-connect-db.php");
include("myfunctions.php");

if ( !isset($_SESSION["authenticated"]))
	{
		echo "Please login and answer Security Questions. Redirecting to form";
		header( "refresh: 4 , url=authenticate.html");
		exit ("");
	;}

$s="select MIN(AI) AS smallest from ```security-questions``` where ucid='$ucid'";
echo "select is $s<br>";
($t=mysqli_query($db,$s))or die(mysqli_error($db));
$r=mysqli_fetch_array($t,MYSQLI_ASSOC);
$AI_Low=$r["smallest"];
echo "AI_Low is $AI_Low<br>";


$m="select MAX(AI) AS biggest from ```security-questions``` where ucid='$ucid'";
echo "select is $m<br>";
($t=mysqli_query($db,$m))or die(mysqli_error($db));
$r=mysqli_fetch_array($t,MYSQLI_ASSOC);
$AI_High=$r["biggest"];
echo "AI_High is $AI_High<br>";


$randomAI= mt_rand($AI_Low,$AI_High);
$s = "select * from ```security-questions``` where AI='$randomAI'";
($t=mysqli_query($db,$s))or die(mysqli_error($db));
$r=mysqli_fetch_array($t,MYSQLI_ASSOC);
echo "randomAI: $randomAI<br><br>";
$question = $r["questions"];
$answer = $r["answer"];

$_SESSION["AI"]=$randomAI;
$_SESSION["answer"]=$answer;

echo "Security Question: $question<br><br>"; 
echo "Answer: $answer<br>"
?>
<br><br><br>

<form action="KB2.php" >
	<input type=text name="answer">Security Answer<br>
	<input type=submit>
</form>