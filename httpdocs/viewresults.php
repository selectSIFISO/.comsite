<?php
    
    $searchbox = $_POST['searchbox'];   
    
    if(!$searchbox) 
    {
        header('Location: Index.php5');
        exit;
    };
    
    $degree = $_POST['degree'];
    
    require_once('globals.php');

    try {
        if ($degree=="artist") {
            $sql = "select DISTINCT ArtistName as course_name from tblartist where ArtistName LIKE '%$searchbox%'";
            $rsd = mysql_query($sql);            
        }
        elseif ($degree=="album") {
            $sql = "select DISTINCT AlbumName as course_name from tblalbum where AlbumName LIKE '%$searchbox%'";
            $rsd = mysql_query($sql);            
        }
        else {
            $sql = "select DISTINCT title as course_name from tbllyrics where title LIKE '%$searchbox%'";
            $rsd = mysql_query($sql);            
        } 
     
     $num_rows = mysql_num_rows($rsd); 
     
     if ($num_rows > 0)
     {
         while($rs = mysql_fetch_array($rsd)) {
            $cname = $rs['course_name'];
            echo "$cname\n";
            }
     }
     else
     {
         echo "no results found";
     
     }            
        //$query  = sprintf('select * from tblalbum where AlbumID = %d', $id);
        //$result = mysql_query($query, $db);
 
        //if (mysql_num_rows($result) == 0) {
            //throw new Exception('Image with specified ID not found');
        //}
 
        //$image = mysql_fetch_array($result);
    }
    catch (Exception $ex) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
 
    //header('Content-type: ' . $image['mime_type']);
    //header('Content-length: ' . $image['file_size']);
 
    //echo $image['AlbumIMG'];
  
?>