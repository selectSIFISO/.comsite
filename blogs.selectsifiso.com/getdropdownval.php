<?php
if(isset($_POST['formSubmit'])) 
    {
        $aCountries = $_POST['formCountries'];
        
        if(!isset($aCountries)) 
        {
            echo("<p>You didn't select any countries!</p>\n");
        } 
        else 
        {
            $nCountries = count($aCountries);
            
            echo("<p>You selected $nCountries countries: ");
            for($i=0; $i < $nCountries; $i++)
            {
                echo($aCountries[$i] . " ");
            }
            echo("</p>");
        }
    }
?>