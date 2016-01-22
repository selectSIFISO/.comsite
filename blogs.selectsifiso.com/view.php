<?php
    require_once('globals.php');
 
    try {                                                        
        $id = (int) $_GET['id'];                                 
        
        $query  = 'update tblalbum set InUse = 1 where albumID = '.$id;
        $result = mysql_query($query, $db);                       
        
        $query  = 'select * from tblalbum where albumID = '.$id;
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