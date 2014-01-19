<?php
	
	//------------------------------------------------------------//
	//Example php script to fetch data from the database          //
	//------------------------------------------------------------//

	$host = "localhost";
	$username = "root";
	$password = "";

	$databaseName = "testdb";
	$tableName = "content";

	//--------------------------------------------//
	//connecting to the mysql database            //
	//--------------------------------------------//

	//include 'DB.php' 
	$con = mysql_connect($host,$username,$password) or die(mysql_error());
	$db  = mysql_select_db($databaseName,$con) or die(mysql_error());

	//---------------------------------------------//
	// Query database for data                     //
	//---------------------------------------------//

	$result = mysql_query("select * from $tableName") or die(mysql_error());

	$record = array();
	while($row = mysql_fetch_assoc($result)){
		array_push($record,$row);		
	}
	
	 
	//-----------------------------------------------//
	// echoing the result as json                    //
	//-----------------------------------------------//

	echo json_encode($record);
?>