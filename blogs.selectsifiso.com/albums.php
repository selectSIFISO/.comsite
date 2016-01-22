<?php
  require_once('DAO.php');
  $dao = new DAO();
  $rows = $dao->getAllAlbums();
?>
<html>
    <body>
    
    <ol>
    <?php 
    foreach ($rows as $key => $col) {
            
        print('<li>'. $col->AlbumName . ", " . $col->mime_type .'</li>');
    }
    ?>
    </ol>
    
    </body>
</html>

