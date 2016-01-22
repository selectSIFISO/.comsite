<?php
session_start();
ob_start();
require_once "config.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <title>Eshashalazini - Celebrating South African Music</title>  
  
  <style type="text/css">
      #updates {
      color: #e6e3dc;
      font-family: "Tahoma", Arial, Helvetica, sans-serif;
      padding-top: 31px;
      height: 3px;
      background: url(images/updates.png) repeat-x #e6e3dc;
    }
    #updates span {
      font-size: 13px;
    }
    #updates .username {
      border: none;
      background: url(images/formfield3.png) transparent no-repeat;
      width: 355px;
      height: 19px;
      color: #859c0a;
      font-family: "Tahoma", Arial, Helvetica, sans-serif;
      text-indent: 4px;
      font-size: 13px;}
      
    #updates .submit {
      border: solid 1px #e6e3dc;
      width: 100px;      
      font-weight:bold;
      background: none;
      font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
      color: #e6e3dc;
      text-indent: 4px;
      font-size: 13px;
    }   
    #login {
  background: url(images/loginbg.png);
  width: 356px;
  height: 73px;
  position: relative;
  /*top: -71px;*/
  top: -73px;
  /*left: 560px;*/
  left: 555px;
  color: #e6e3dc;
  font-family: "Tahoma", Arial, Helvetica, sans-serif;
  font-size: 13px;
}

#loginwelcome {
  padding-left: 20px; 
  font-weight:bold;
  color:white;    
  font-size: 12px; 
  float:left;
  position:absolute;
  margin-top:12pt;
}

#loginwelcomeRIGHT {
  padding-right: 20px; 
  font-weight:bold;
  color: #859c0a;
  font-size: 11px; 
  float:right;
  position:relative;
  margin-top:12pt;  
}

#loginwelcomeRIGHT a{
  color: #859c0a;
  text-decoration: none;
}

#loginwelcomeRIGHT a:hover{
  color: white;  
  text-decoration: underline;
}

#loginFRM {
  padding-left: 20px;  
  font-weight:bold;
  /*padding-top: 12px;*/ 
  color: #859c0a;
  font-size: 12px; 
  float:left;
  position:absolute;
  margin-top:34pt;
}

#login .loginFRMmsg {
  padding-left: 23px;  
  font-weight:bold;  
  color: red;
  font-size: 9px; 
  float:left;
  position:absolute;
  margin-top:24pt;
}

#login .username {
  border: none;
  background: url(images/formfield3.png) transparent no-repeat;
  width: 150px;
  height: 19px;
  color: #859c0a;
  font-family: "Tahoma", Arial, Helvetica, sans-serif;
  font-weight:bold;  
  text-indent: 4px;
  font-size: 13px;
}

#login .password {
  border: none;
  background: url(images/formfield3.png) transparent no-repeat;
  width: 105px;
  height: 19px;
  color: #859c0a;
  font-family: "Tahoma", Arial, Helvetica, sans-serif;
  font-weight:bold;  
  text-indent: 4px;
  font-size: 13px;  
}

#login .submit {
  border: solid 1px #e6e3dc;
  background: none;                                            
  width: 48px;
  font-weight:bold;  
  font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
  color: #e6e3dc;
  font-size: 13px; }

  .clear {
    clear:both
}

h1 {
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    font-weight:bold;
    margin:0;
    padding:0;
    }

#gallery {
    position:relative;
    /*height:360px
    margin-top: -18px;    */
    height:31px;
    margin-top: -31px;
    /*height:31px;    
    margin-left: 95px;*/
    
}
    #gallery a {
        float:left;
        position:absolute;
        top: 2px;
        left: 0px;
    }
    
    #gallery a img {
        border:none;
    }
    
    #gallery a.show {
        z-index:500
    }

    #gallery .caption {
        z-index:600; 
        background-color:#000; 
        color:#ffffff; 
        height:72px; 
        width:100%; 
        position:absolute;
        bottom:0;
    }

    #gallery .caption .content {margin:0px
    }
    
    #gallery .caption .content h1 {
        margin:0;
        padding:0;
        color: #9bb50b;     
    }

  </style>    
    <script type="text/javascript" src="jquery.js"></script>
    <!--<script type='text/javascript' src='jquery.autocomplete.js'></script>
    <script type='text/javascript' src='js/ajaxsearch.js'></script>        
    <script type="text/javascript" src="prot/js/gallery.js"></script>-->
            
    <link rel="stylesheet" href="prot/style.css" type="text/css" />
    <link rel="stylesheet" href="prot/styles.css" type="text/css" />
    <link rel="stylesheet" href="prot/body_layer_style.css" type="text/css" />
    <link rel="stylesheet" href="css/cssstyle.css" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />             
 </head>
<!--<body onload="showUser('title')" style="background: url(images/background_11.png) repeat-x #e6e3dc;margin: 0;font-family:Verdana, Geneva, sans-serif;padding:0;width:100%;">-->
<body style="background: url(images/background_11.png) repeat-x #e6e3dc;margin: 0;font-family:Verdana, Geneva, sans-serif;padding:0;width:100%;">
     <div style="width:900px;margin: 0 auto">
        <div style="background: url(images/logo4.png) no-repeat; width: 380px; height: 73px; margin-left: 0px;">
        </div>
        <div id="updates">
            <!--<div style="margin-left:2pt; margin-top:-19pt; width:600px;">
                <form name="lyricsearchform" action="viewresults.php" method="post">                    
                    <select onchange="showUser(this.value)" style="width:97px; border: solid thin #859c0a; background-color:#e6e3dc" name="degree">                                        
                    <option value="title">title</option>
                    <option value="artist">artist</option>
                    <option value="album">album</option>                    
                    </select>
                     <input title="username" name="searchbox" class="username" id="course" onkeyup="autolyricsearch()" />
                    <input type="submit" name="submitsearch" class="submit" value="search" tabindex="3" />                                        
                </form>
            </div>-->
        </div>
               
     </div>                                         
 </body>
</html> 