<?php

require_once('config.php');

class Connect { 
    // Store the single instance of Database 
    private static $instance;
    private static $connection; 

    /*
    * Constructor
    */
    private function __construct() {
        
    } 
    
    public static function getInstance() { 
 
        if (!self::$instance) { 
 
            self::$instance = new Connect();
            
            self::$connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
            
            $select_db = @mysql_select_db(DB_NAME, self::$connection);
            
            if (!$select_db || !self::$connection) {
                //Handle Error
                 header("Location: http://www.google.com"); 
                die("Connection Error");
            }
        }
        
        return self::$instance; 
    }
    
    public function query($sql) {
        
        $result = mysql_query($sql, self::$connection);
        
        if (!$result) {
            //Do error handler
           header("Location: http://www.google.com"); 
           die();
        }
        
        return $result;
    }
    
    /**
    * fetch records of the table
    */
    public function fetchObjects($results) {
        
        $data = array();
        while ($row = mysql_fetch_object($results)) {
            $data[] = $row;
        }
                 //ArtistID, AlbumID, AlbumName, filename
        
        //Free Memory
        mysql_free_result($results);
        return $data;
    }

 
} 


?>
