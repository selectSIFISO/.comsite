<?php
$mysql_hostname = "mysql.selectsifiso.net";
$mysql_user = "shashaz_db";
$mysql_password = "thulabo11";
$mysql_database = "shashaz_db";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect to database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");



?>