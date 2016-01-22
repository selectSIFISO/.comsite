<?php
 $q=$_GET["q"];

 $con = mysql_connect('localhost', 'root', 'thulabo11');
 if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }

 mysql_select_db("shashaz_db", $con);

 $sql="truncate table tbldropdown";
 $result = mysql_query($sql);
    
 $sql="insert into tbldropdown values ('".$q."')";
 $result = mysql_query($sql);
 
 mysql_close($con);
 ?>