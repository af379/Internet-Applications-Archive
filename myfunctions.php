<?php
function authenticate( $db,$ucid,$pass)
{
	
	$s= "select*from users where ucid = '$ucid'";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
	$r = mysqli_fetch_array($t,MYSQLI_ASSOC);
	$realhash = password_hash($r['pass'],PASSWORD_DEFAULT);
	$s = "update users SET hash='$realhash' where ucid='$ucid'";
	($y=mysqli_query($db,$s)) or die(mysqli_error($db));
	$hash = $r['hash'];
	return password_verify($pass,$hash);
;}


function list_transactions_wrapper($db,$ucid)
{
	global $t;
	$s="select * from transactions where ucid='$ucid'";
	echo "<br>SQL select statement is: $s<br>";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
	$num = mysqli_num_rows($t);
	echo"<br>$num rows retrieved from DB table.<br><br><br>";
	if ($num==0) {echo "<br>No rows retrieved.<br>";return;};
	
	
	echo"<table border=2 width =30%>";
	
	
	echo"<tr><th>ucid</th><th>amount</th><th>timestamp</th></tr>";
	
	
	while ($r=mysqli_fetch_array($t,MYSQLI_ASSOC))
	{
		echo"<tr>";
			$ucid=$r["ucid"]; $amount=$r["amount"]; $timestamp=$r["timestamp"];
			echo"<td>$ucid</td>";echo"<td>$amount</td>";echo"<td>$timestamp</td>";
		echo"</tr>";
	};
	echo"</table>";
}

function perform ($db, $ucid, $account, $amount)
{
	//insert transactions
	$s = "insert into transactions values('$ucid', '$amount', '$account', NOW())";
	echo "<br>insert: $s";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));

	//update accounts
	$s = "update accounts
			SET balance=balance+'$amount', mostRecentTrans=NOW()
			where ucid='$ucid' and account='$account'";
	echo "<br>update: $s";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
}

function list_accounts($db,$ucid)
{
	{
	global $t;
	$s="select * from accounts where ucid='$ucid'";
	echo "<br>SQL select statement is: $s<br>";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
	$num = mysqli_num_rows($t);
	echo"<br>$num rows retrieved from DB table.<br><br><br>";
	if ($num==0) {echo "<br>No rows retrieved.<br>";return;};
	
	
	echo"<table border=2 width =30%>";
	
	
	echo"<tr><th>ucid</th><th>balance</th><th>account</th><th>timestamp</th></tr>";
	
	
	while ($r=mysqli_fetch_array($t,MYSQLI_ASSOC))
	{
		echo"<tr>";
			$ucid=$r["ucid"]; $balance=$r["balance"]; $account=$r["account"]; $timestamp=$r["mostRecentTrans"];
			echo"<td>$ucid</td>";echo"<td>$balance</td>";echo"<td>$account</td>";echo"<td>$timestamp</td>";
		echo"</tr>";
	};
	echo"</table>";
}
}

function reset_account($db,$ucid,$account)
{
	//delete accounts
	$s = "DELETE from `accounts` WHERE account ='$account' AND ucid = '$ucid'";
	echo "<br>delete: $s<br>";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));

	//delete transactions
	$s = "DELETE from `transactions` WHERE account ='$account' AND ucid = '$ucid'";
	echo "<br>delete: $s";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
}

function list_number_transactions($db,$ucid,$account,$N)
{
	global $t;
	$s="select * from transactions where ucid='$ucid' and account='$account' ORDER BY timestamp DESC LIMIT $N";
	echo "<br>SQL select statement is: $s<br>";
	($t=mysqli_query($db,$s)) or die(mysqli_error($db));
	$num = mysqli_num_rows($t);
	echo"<br>$num rows retrieved from DB table.<br><br><br>";
	if ($num==0) {echo "<br>No rows retrieved.<br>";return;};
	
	
	echo"<table border=2 width =30%>";
	
	
	echo"<tr><th>ucid</th><th>amount</th><th>timestamp</th></tr>";
	
	
	while ($r=mysqli_fetch_array($t,MYSQLI_ASSOC))
	{
		echo"<tr>";
			$ucid=$r["ucid"]; $amount=$r["amount"]; $timestamp=$r["timestamp"];
			echo"<td>$ucid</td>";echo"<td>$amount</td>";echo"<td>$timestamp</td>";
		echo"</tr>";
	};
	echo"</table>";
}

?>