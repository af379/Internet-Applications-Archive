<?php

/*
  THIS CODE WILL CONNECT YOU TO YOUR DATABASE 
   WE WILL USE IT IN PHP SCRIPTS
  
  SAVE THIS  .txt  FILE AS connect.php
  Make ABSOLUTELY NO CHANGES TO THIS FILE
  BUT READ DIRCETIONS BELOW FOR  HOW TO USE IT

  Follow the upload directions in CONNECT-TO-DATABASE.docx 

*/  


include (  "account.php"     ) ; 
$db = mysqli_connect($hostname,$username,$password, $project );
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "You have successfully connected to MySQL database.<br>";
mysqli_select_db( $db, $project ); 

?>










