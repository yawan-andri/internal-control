<?php
// $serverName = "WIANTORO\sa";   
// $database = "IT";  
// $uid = "sa";  
// $pwd = "test";  

// $serverName = "192.168.0.102";   
$serverName = "26.171.94.254";   
$database = "IT";  
$uid = "subsuper";  
$pwd = "gulacokelat"; 

try {  
	$conn = new PDO( "sqlsrv:server=$serverName;Database = $database", $uid, $pwd);   
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
	$conn->setAttribute(\PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 300);
}  

catch( PDOException $e ) {  
	die( "Error connecting to SQL Server" );   
}  

