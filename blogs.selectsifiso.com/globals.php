<?php
    $db = mysql_connect('localhost', 'root', 'thulabo11');
 
    if (!$db) {
        echo "Unable to establish connection to database server";
        exit;
    }
 
    if (!mysql_select_db('shashaz_db', $db)) {
        echo "Unable to connect to database";
        exit;
    }
?>