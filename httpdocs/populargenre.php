<?php
    require_once('globals.php');
 
    try {                                                        
        $id = (int) $_GET['id'];                                 
        
        $query  = 'select * from tblalbum where GenreID = '.$id.' LIMIT 1';
        $result = mysql_query($query, $db);                       
        
        $image = mysql_fetch_array($result);                         
        header('Content-type: ' . $image['mime_type']);
        header('Content-length: ' . $image['file_size']);         
        echo $image['AlbumIMG'];                                  
    }
    catch (Exception $ex) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }    
?>