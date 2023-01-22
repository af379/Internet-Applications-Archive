<style>
div{ padding:10px}
form {border:2px solid red; margin:auto; margin-top 5em; width: 50%; padding:10px;}
</style>
<style> div{display:none;} </style>
<?php
session_start();
include("error-report-connect-db.php");
include("myfunctions.php");
if ( !isset($_SESSION["pinpassed"]))
	{
		echo "Pin not authenticated. Redirecting to form";
		header( "refresh: 4 , url=pin1.php");
		exit ("");
	;}

?>
<br><br><br>
<form action="services2.php"><br>
<input type="radio" id="choose" checked="checked" name="services" value="choose" onclick="javascript:F();">
<label for="choose">Choose</label><br>
<input type="radio" id="listTrans" name="services" value="listTrans" onclick="javascript:F();">
<label for="listTrans">List Transactions</label><br>
<input type="radio" id="perform" name="services" value="perform" onclick="javascript:F();">
<label for="perform">Perform Transaction</label><br>
<input type="radio" id="listAcc" name="services" value="listAcc" onclick="javascript:F();">
<label for="listAcc">List Accounts</label><br>
<input type="radio" id="resetAcc" name="services" value="resetAcc" onclick="javascript:F();">
<label for="resetAcc">Reset Account</label><br>
<input type="radio" id="recentTrans" name="services" value="recentTrans" onclick="javascript:F();">
<label for="recentTrans">Recent Transactions</label><br>


<div id = "account"><input type=text name="account">Enter Account<br></div>
<div id="amount"><input type=text name="amount">Enter Amount<br></div>
<div id="number"><input type=text name="number">Enter Number</div><br>

<input type=submit>
</form>

<script type="text/javascript">
function F() {
    if (document.getElementById('choose').checked) {
        document.getElementById('account').style.display = 'none';
		document.getElementById('amount').style.display = 'none';
		document.getElementById('number').style.display = 'none';
    } 
	else if (document.getElementById('listTrans').checked) {
        document.getElementById('account').style.display = 'none';
		document.getElementById('amount').style.display = 'none';
		document.getElementById('number').style.display = 'none';
    } 
	else if (document.getElementById('perform').checked) {
        document.getElementById('account').style.display = 'block';
		document.getElementById('amount').style.display = 'block';
		document.getElementById('number').style.display = 'none';
    }
	else if (document.getElementById('listAcc').checked) {
        document.getElementById('account').style.display = 'block';
		document.getElementById('amount').style.display = 'none';
		document.getElementById('number').style.display = 'none';
    }
	else if (document.getElementById('resetAcc').checked) {
        document.getElementById('account').style.display = 'block';
		document.getElementById('amount').style.display = 'none';
		document.getElementById('number').style.display = 'none';
    }
	else if (document.getElementById('recentTrans').checked) {
        document.getElementById('account').style.display = 'block';
		document.getElementById('amount').style.display = 'none';
		document.getElementById('number').style.display = 'block';
    }
	
    }

</script>

