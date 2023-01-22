<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>

<?php 
session_start();
include("myfunctions.php");
if ( isset ( $_GET["ucid"]  ) )
{
	$ucid = $_GET["ucid"];
	$pass = $_GET["pass"];
	
	//sanitizes ucid
	$ucidSanitized = filter_var($ucid,FILTER_SANITIZE_STRING);
	echo "sanitized ucid: $ucidSanitized";
	//sanitizes pass
	$passSanitized = filter_var($pass,FILTER_SANITIZE_STRING);
	
	//validates ucid, simple REGEXP because ucid's in databases are just names such as "james"
	$res = array("options"=>array("regexp"=>"/^[a-z]/i"));
	if(filter_var($ucidSanitized,FILTER_VALIDATE_REGEXP,$res))
		echo "<br>valid ucid";
	else
		echo "<br>invalid ucid";
	
	//regexp pattern for the ucid
	$pattern = '/^[a-z]/i';
	$count = preg_match($pattern,$ucidSanitized);
	
	if ($count ==1) 
	{ $_SESSION["ucid"]=$ucidSanitized;
	  $_SESSION["pass"]=$passSanitized;
	  echo "<br><br>good ucid, redirecting to next block."; 
      header("refresh:3, url=authenticate.php"); 
	  exit(); 
	}
	
    else 
	{ echo "<br><br>Entered  Bad ucid. Sticky form below.<br><br>.";   }
	
}

?>

<form action="v-sticky.php">
    <input type		=   text 	 name = "ucid"    autocomplete = off 
	       value	=   "<?php  echo $ucid;  ?>"   >  ucid <br><br>
	<input type		=   "password" id="pass" 	 name = "pass"    autocomplete = off 
	       value	=   "<?php  echo $pass;  ?>"   >  pass <br><br>
	<input type="checkbox" onclick="myFunction()">Show Password
	<input type=submit>
</form>

<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>