<?php
session_start();

$_SESSION = array();		//Make $_SESSION  empty
session_destroy();			//Terminate session on server

echo "Your session is terminated.<br><br>";

echo "You have been logged out, redirecting back to login page.";
header( "refresh: 4 , url=authenticate.html");

?>