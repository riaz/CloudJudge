<?php
	//database connection establishment
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("testdb") or die(mysql_error());
?>