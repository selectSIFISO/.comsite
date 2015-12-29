<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <title>eshashalazini - Celebrating South African Music</title>  
  
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
    <script type="text/javascript" src="prot/js/gallery.js"></script>
            
    <link rel="SHORTCUT ICON" href="images/e1.ico" />
    
    <link rel="stylesheet" href="prot/style.css" type="text/css" />
    <link rel="stylesheet" href="prot/styles.css" type="text/css" />
    <link rel="stylesheet" href="prot/body_layer_style.css" type="text/css" />
    <link rel="stylesheet" href="css/cssstyle.css" type="text/css" /> 
    
 </head>
<body style="background: url(images/background_11.png) repeat-x #e6e3dc;margin: 0;font-family:Verdana, Geneva, sans-serif;padding:0;width:100%;">
     <div style="width:900px;margin: 0 auto">
        <div style="background: url(images/logo4.png) no-repeat; width: 380px; height: 73px; margin-left: 0px;">
        </div>
        <div id="updates">
            <div style="margin-left:2pt; margin-top:-19pt; width:600px;">
                <form name="lyricsearchform" action="viewresults.php" method="post">                    
                    <select onchange="showUser(this.value)" style="width:97px; border: solid thin #859c0a; background-color:#e6e3dc" name="degree">                                        
                    <option value="title">title</option>
                    <option value="artist">artist</option>
                    <option value="album">album</option>                    
                    </select>
                     <input title="username" name="searchbox" class="username" id="course" onkeyup="autolyricsearch()" />
                    <input type="submit" name="submitsearch" class="submit" value="search" tabindex="3" />                                        
                </form>
            </div>
        </div>
        <div id="login">
            <div id="loginwelcome">Welcome ...</div>
            <div id="loginwelcomeRIGHT"><a href="#">Forgot Password</a> | <a href="#">Register</a></div>
            <div class="loginFRMmsg" id="displaymsg"></div>
            <div id="loginFRM">
                <input title="username" id="lusername" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ' }"/>
                <input name="password" id="lpassword" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ' }" onkeyup="autologin()"/>
                <input type="submit" name="Login" id="lsubmit" class="submit" value="login" tabindex="3" onclick='ajaxFunction()'/>
            </div>            
        </div>
        <div id="gallery">
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 1</h1>Gallo Music Song 1" alt="Gallo Music Artis 1"></a>             
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 2</h1>Gallo Music Song 2" alt="Gallo Music Artis 2"></a>
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 3</h1>Gallo Music Song 3" alt="Gallo Music Artis 3"></a>
            <div class="caption"><div class="content"></div></div>
        </div> 
        <div id="gallery2">
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 4</h1>Gallo Music Song 4" alt="Gallo Music Artis 4"></a>
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 5</h1>Gallo Music Song 5" alt="Gallo Music Artis 5"></a>
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 6</h1>Gallo Music Song 6" alt="Gallo Music Artis 6"></a>
            <div class="caption"><div class="content"></div></div>
        </div>
        <div id="gallery3">
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 7</h1>Gallo Music Song 7" alt="Gallo Music Artis 7"></a>
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 8</h1>Gallo Music Song 8" alt="Gallo Music Artis 8"></a>
            <a href="#" class="show"><img width="225" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 9</h1>Gallo Music Song 9" alt="Gallo Music Artis 9"></a>
            <div class="caption"><div class="content"></div></div>
        </div>
        <div id="gallery4">
            <a href="#" class="show"><img width="222" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 1</h1>Gallo Music Song 1" alt="Gallo Music Artis 10"></a>
            <a href="#" class="show"><img width="222" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 2</h1>Gallo Music Song 2" alt="Gallo Music Artis 11"></a>
            <a href="#" class="show"><img width="222" height="229px" src="/Chrysanthemum.jpg" rel="<h1>Gallo Music Artist 3</h1>Gallo Music Song 3" alt="Gallo Music Artis 12"></a>
            <div class="caption"><div class="content"></div></div>
        </div>
        <div class="clear"></div>
        <div id="tabs">
          <ul>
            <li><a href="#"><span>#</span></a></li>
            <li><a href="#"><span>A</span></a></li>
            <li><a href="#"><span>B</span></a></li>
            <li><a href="#"><span>C</span></a></li>
            <li><a href="#"><span>D</span></a></li>
            <li><a href="#"><span>E</span></a></li>
            <li><a href="#"><span>F</span></a></li>
            <li><a href="#"><span>G</span></a></li>
            <li><a href="#"><span>H</span></a></li>
            <li><a href="#"><span>I</span></a></li>
            <li><a href="#"><span>J</span></a></li>
            <li><a href="#"><span>K</span></a></li>
            <li><a href="#"><span>L</span></a></li>
            <li><a href="#"><span>M</span></a></li>
            <li><a href="#"><span>N</span></a></li>
            <li><a href="#"><span>O</span></a></li>
            <li><a href="#"><span>P</span></a></li>
            <li><a href="#"><span>Q</span></a></li>
            <li><a href="#"><span>R</span></a></li>
            <li><a href="#"><span>S</span></a></li>
            <li><a href="#"><span>T</span></a></li>
            <li><a href="#"><span>U</span></a></li>
            <li><a href="#"><span>V</span></a></li>
            <li><a href="#"><span>W</span></a></li>
            <li><a href="#"><span>X</span></a></li>
            <li><a href="#"><span>Y</span></a></li>            
            <li><a href="#"><span>Z</span></a></li>
          </ul>
        </div>
        <div class="box">
            <div class="h3menuW">
                <a>Lyrics Menu</a>
             </div>
             <div style="background-color:White; border:none; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 5px;padding-right: 5px">
                <ul>
                    <li class="defmenu"><a href="#">homepage</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">submit lyrics</a></li>
                    <li><a href="#">correct lyrics</a></li>
                    <li><a href="#">lyrics by genre</a></li>
                    <li><a href="#">affiliate sites</a></li>
                    <li><a href="#">advertise</a></li>
                    <li><a href="#">terms of use</a></li>
                    <li><a href="#">privacy policy</a></li>
                    <li><a href="#">contact us</a></li>
                </ul>
             </div>
             <div class="h3menuW">
                <a>ad space</a>
             </div>
             <div style="background-color:White;font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 0px;padding-right: 0px">
                 <img width="190px" height="380px" src="images/ad_space_ad_1%20copy.jpg" alt="add space" />
             </div>
        </div>
        <div class="mbox">          
            <div class="h3menuW"><a>Latest Lyrics</a></div>
             <div style="background-color:White; border:none; font-size:11px;font-family: Tahoma;font-weight:normal">
                    <div class="ListsbdaysIMG" style="width:129px; position:absolute; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                    <table style="text-align:center">
                    <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist"/></a></td></tr>
                    <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:18px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                    <tr><td style="border-bottom: solid 1px black;line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>"Gallo Music Artist"</i></a></td></tr>
                    <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>                                        
                    </table>
                    </div>                                        
                    
                    <div class="ListsbdaysIMG" style="width:129px; position:absolute; border-bottom:solid 1px #9bb50b; margin-left:130px; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                    <table style="text-align:center">
                    <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist"/></a></td></tr>
                    <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:18px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                    <tr><td style="border-bottom: solid 1px black;line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>"Gallo Music Artist"</i></a></td></tr>
                    <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>                                        
                    </table>
                    </div>
                    
                    <div class="ListsbdaysIMG" style="width:129px; position:absolute; border-bottom:solid 1px #9bb50b; margin-left:258px; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                    <table style="text-align:center">
                    <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist"/></a></td></tr>
                    <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:18px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                    <tr><td style="border-bottom: solid 1px black;line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>"Gallo Music Artist"</i></a></td></tr>
                    <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>                                        
                    </table>
                    </div>
                              
                    <div class="ListsbdaysIMG" style="width:126px; position:absolute; border-bottom:solid 1px #9bb50b; margin-left:388px; border-left:solid 1px #9bb50b; border-right:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                    <table style="text-align:center">
                    <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist"/></a></td></tr>
                    <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:18px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                    <tr><td style="border-bottom: solid 1px black;line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>"Gallo Music Artist"</i></a></td></tr>
                    <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>                                        
                    </table>
                    </div>
                    
             </div>
             <div class="h3menuW" style="margin-top:105pt"><a>Popular Artists</a></div>
             <div style="background-color:White; border:none; font-size:11px;font-family: Tahoma;font-weight:normal">
                <div class="ListsbdaysIMG" style="width:129px; position:absolute; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:121px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                                                                    
                <div class="ListsbdaysIMG" style="width:129px; position:absolute; margin-left:130px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:119px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:129px; position:absolute; margin-left:258px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:121px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:126px; position:absolute; margin-left:388px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; border-right:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:129px; margin-top:86pt; border-bottom:solid 1px #9bb50b; position:absolute; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:121px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                                        
                <div class="ListsbdaysIMG" style="width:129px; margin-top:86pt; position:absolute; margin-left:130px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:119px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#" style="border-color:none;border-style:none;border-width:none"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:129px; margin-top:86pt; position:absolute; margin-left:258px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:121px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                                        
                <div class="ListsbdaysIMG" style="width:126px; margin-top:86pt; position:absolute; margin-left:388px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; border-right:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:120px;line-height:16px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                            <tr><td><a href="#"><img src="/Chrysanthemum.jpg" width="80" height="65" alt="Gallo Music Artist" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                                                                        
             </div>
             <div class="h3menuW" style="margin-top:174pt"><a>Popular Genres</a></div>
             <div style="background-color:White; border:none; font-size:11px;font-family: Tahoma;font-weight:normal">
                            <div class="ListsbdaysIMG" style="width:129px; position:absolute; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="width:120px;border-bottom: solid 1px black;border-top: solid 1px black; line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>Gallo Music Genre</i></a></td></tr>
                            <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:129px; position:absolute; margin-left:130px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="width:120px;border-bottom: solid 1px black;border-top: solid 1px black; line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>Gallo Music Genre</i></a></td></tr>
                            <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                                                
                <div class="ListsbdaysIMG" style="width:129px; position:absolute; margin-left:258px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="width:120px;border-bottom: solid 1px black;border-top: solid 1px black; line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>Gallo Music Genre</i></a></td></tr>
                            <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                <div class="ListsbdaysIMG" style="width:126px; position:absolute; margin-left:388px; border-bottom:solid 1px #9bb50b; border-left:solid 1px #9bb50b; border-right:solid 1px #9bb50b; background-color:White;padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px">
                            <table style="text-align:center">
                            <tr><td style="width:120px;border-bottom: solid 1px black;border-top: solid 1px black; line-height:14px; padding: 1px 0px 2px 0px"><a href="#"><i>Gallo Music Genre</i></a></td></tr>
                            <tr><td><a><img src="/Chrysanthemum.jpg" width="80" height="65" alt="" /></a></td></tr>
                            <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a href="#">buy music</a></td></tr>
                            </table>
                            </div>
                            
                </div>                         
        </div> 
        <div class="rbox">
            <div class="h3menuW"><a>join the club</a></div>          
             <div style="background-color:White; font-size:11px;font-family: Tahoma;font-weight:normal; border-left-color: white; border-left-style: solid;  border-left-width: thin;">                
                <table>
                    <tr>
                        <td><a href="#"><img src="images/facebook.gif" alt="join our Facebook page" /></a></td>
                        <td><a href="#"><img src="images/twitter.gif" alt="join our Twitter page" /></a></td>
                    </tr>
                </table>
             </div>
             <div class="h3menuW"><a>musicians' birthday</a></div>
             <div class="Listsbdays" style="background-color:White; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 5px;padding-right: 2px">
                <a href="#">Gallo Music Artist 1, Gallo Music Artist 2, Gallo Music Artist 3, Gallo Music Artist 4, Gallo Music Artist 5, Gallo Music Artist 6, Gallo Music Artist 7</a>
                </div>
             <div class="h3menuW"><a>lyrics of the day</a></div>            
            <div class="ListsbdaysIMG" style="background-color:White; padding-bottom:5px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px;padding-right: 2px">                
                <table style="text-align:center">
                    <tr>                        
                        <td>
                            <table style="text-align:center">
                                <tr><td style="border-bottom: solid 1px black; border-top: solid 1px black; width:90px;line-height:18px; padding: 1px 0px 2px 0px"><a href="#">Gallo Music Artist</a></td></tr>
                                        <tr><td style="border-bottom: solid 1px black;line-height:18px; padding: 1px 0px 2px 0px"><a href="#"><i>" Song Title "</i></a></td></tr>
                                        <tr><td style="background: url(images/updates.png) repeat-x #e6e3dc;font-size:9px;text-transform:uppercase; border: solid 1px black;line-height:10px; padding: 1px 0px 1px 0px"><a style="color:white" href="#">buy music</a></td></tr>
                                        </table></td>
                                        <td><a href="#"><img src="/Chrysanthemum.jpg" width="79" height="65" alt="Gallo Music Artist"/></a></td>
                                
                    </tr>                    
                </table>
            </div>
            <div class="h3menuW"><a>top 15 lyrics</a></div>            
             <div class="Listsbox" style="background-color:White; height:351px; font-size:11px;font-family: Tahoma;font-weight:normal;padding-left: 2px;padding-right: 2px">
                 <ul>                  
                      <li><a style="color:orange" href="#">1. </a><a href="#">Gallo Music Artist 1 - Song Title</a></li>
                      <li><a style="color:orange" href="#">2. </a><a href="#">Gallo Music Artist 2 - Song Title</a></li>
                      <li><a style="color:orange" href="#">3. </a><a href="#">Gallo Music Artist 3 - Song Title</a></li>
                      <li><a style="color:orange" href="#">4. </a><a href="#">Gallo Music Artist 4 - Song Title</a></li>
                      <li><a style="color:orange" href="#">5. </a><a href="#">Gallo Music Artist 5 - Song Title</a></li>
                      <li><a style="color:orange" href="#">6. </a><a href="#">Gallo Music Artist 6 - Song Title</a></li>
                      <li><a style="color:orange" href="#">7. </a><a href="#">Gallo Music Artist 7 - Song Title</a></li>
                      <li><a style="color:orange" href="#">8. </a><a href="#">Gallo Music Artist 8 - Song Title</a></li>
                      <li><a style="color:orange" href="#">9. </a><a href="#">Gallo Music Artist 9 - Song Title</a></li>
                      <li><a style="color:orange" href="#">10. </a><a href="#">Gallo Music Artist 10 - Song Title</a></li>
                      <li><a style="color:orange" href="#">11. </a><a href="#">Gallo Music Artist 11 - Song Title</a></li>
                      <li><a style="color:orange" href="#">12. </a><a href="#">Gallo Music Artist 12 - Song Title</a></li>
                      <li><a style="color:orange" href="#">13. </a><a href="#">Gallo Music Artist 13 - Song Title</a></li>
                      <li><a style="color:orange" href="#">14. </a><a href="#">Gallo Music Artist 14 - Song Title</a></li>
                      <li><a style="color:orange" href="#">15. </a><a href="#">Gallo Music Artist 15 - Song Title</a></li>
                        
                </ul>                                   
            </div>            
        </div> </div>
    <div id="footer">
        <div id="copyright">&copy; 2012 All Rights Reserved. Designed by <a href="http://www.crownstyles.com">Sifiso W. Ndlovu</a>. <a href="http://www.zymic.com/free-web-hosting/">Eshashalazini Media</a>.
    </div>
</div>       
     </div>                                         
 </body>
</html> 