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
      border: solid 1px #859c0a;
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
  padding-top: 15px;
  color: #859c0a;
  font-size: 16px; 
}
 /*
#login form {
  padding-left: 20px;
}   */

#login .username {
  border: none;
  background: url(images/formfield3.png) transparent no-repeat;
  width: 131px;
  height: 19px;
  color: #859c0a;
  font-family: "Tahoma", Arial, Helvetica, sans-serif;
  text-indent: 4px;
  font-size: 13px;
}

#login .password {
  border: none;
  background: url(images/formfield3.png) transparent no-repeat;
  width: 120px;
  height: 19px;
  color: #859c0a;
  font-family: "Tahoma", Arial, Helvetica, sans-serif;
  text-indent: 4px;
  font-size: 13px;  
}

#login .submit {
  border: solid 1px #859c0a;
  background: none;
  width: 48px;
  font-weight:bold;  
  font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
  color: #e6e3dc;
  font-size: 13px; 
}

  </style>

 </head>
 <body style="background: url(images/background_11.png) repeat-x #e6e3dc;margin: 0;font-family:Verdana, Geneva, sans-serif;padding:0;width:100%;">
     <div style="width:900px;margin: 0 auto;border: solid 2px red">
        <div style="background: url(images/logo4.png) no-repeat; width: 380px; height: 73px; margin-left: 0px;">
        </div>
        <div id="updates">
            <div style="margin-left:2pt; margin-top:-19pt; width:600px;">
                <form action="#">                    
                    <select style="width:97px; border: solid thin #859c0a; background-color:#e6e3dc" name="degree">
                    <option>lyrics</option>
                    <option>artist</option>
                    <option>album</option>
                    </select>
                    <input title="username" name="username" class="username" value="search ..." onclick="if ( value == 'search ...' ) { value = ''; }"/>  
                    <input type="submit" name="Login" class="submit" value="search" tabindex="3" />                                        
                </form>
            </div>
        </div>
        <div id="login">
            <div id="loginwelcome">Welcome</div><div style="margin-top: -16px;text-align:right; padding-right:15px;font-size:8pt"><a>Forgot Password</a> | <a>Register</a></div>
                <div style="width:320px;margin: 0 auto;padding-left:5px;margin-top:10pt"> 
                    <input title="username" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
                    <input name="password" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ''; }"/>
                    <input type="submit" name="Login" class="submit" value="login" tabindex="3" />
                </div>
            <!--<div style="margin-top:10pt;"> 
                <form action="#">
                    <input title="username" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
                    <input name="password" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ''; }"/>
                    <input type="submit" name="Login" class="submit" value="login" tabindex="3" />                
                </form>
            </div>-->
        </div>
            <?php
            echo '<br/><br/><a>This is a redirect test page</a>';
            ?>
     </div>
 
 </body>
</html> 