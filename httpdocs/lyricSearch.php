<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "thulabo11";
$dbname = "shashaz_db";
    //Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
    //Select Database
mysql_select_db($dbname) or die(mysql_error());
    // Retrieve data from Query String
$lusername = $_GET['lusername'];
$lpassword = $_GET['lpassword'];

//$l_username = 'mafiswana';
$l_username = $lusername;
//$l_password = 'thulabo';
$l_password = $lpassword;
    // Escape User Input to help prevent SQL Injection
$l_username = mysql_real_escape_string($l_username);
$l_password = mysql_real_escape_string($l_password);
    //build query
//$query = "SELECT display_name FROM login_tb WHERE username = '$sex'";
$query = "SELECT display_name FROM login_tb WHERE username = '$l_username' and password = '$l_password'";
    //Execute query
$qry_result = mysql_query($query) or die(mysql_error());

    //Build Result String
$display_string = "<table>";

    // Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
    $display_string .= "<tr>";
    $display_string .= "<td style='font-size:16px; padding-top: 10px; padding-left: 80px; color:orange'>$row[display_name]</td>";    
    $display_string .= "</tr>";
    
}
echo $display_string .= "</table>";
?>