<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Bratislava" );  // http://www.php.net/manual/en/timezones.php

//define('DB_NAME', 'blogino');
//define('DB_USER', 'lukas');
//define('DB_PASSWORD', 'PassWord');
//define('DB_HOST', 'localhost');
//define('CONTENT_DIR', '/usr/share/beautys/');
$adminemail = array('lukves@outlook.com' => 'admin');

// meno zony => viditelny popisok
$users = array(
'lukas' => 'lukas11i',
'nina' => 'monika11a'); 

$author = "Copyright (c) 2020 - " . date("Y") . " Lukas Veselovsky"; 

if ($_POST['submit_btn']=="Sign In") {
$icount=0;

foreach($users as $x=>$x_value)
{
$name=$_POST['name'];
$password=$_POST['password'];
if ($icount<=6) {
	if ($x==$name) {
		if ($x_value==$password) {
			unset( $_SESSION['loginuser'] );
			$_SESSION['loginuser']=$x;
		}
	}
} 
$icount++;
}
}


//header( "Location: index.php" );
//exit; 
?>