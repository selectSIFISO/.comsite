//Browser Support Code
        function ajaxFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!
            
            try{
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            } catch (e){
                // Internet Explorer Browsers
                try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            // Create a function that will receive data sent from the server
            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                    
                    var checkresponse = ajaxRequest.responseText;
                    
                    if (checkresponse =="nosuch")
                    {
                        var ajaxDisplayns = document.getElementById('displaymsg');                        
                        
                        //document.getElementById('lusername').style.visibility='visible';
                        //document.getElementById('lusername').value="Username";
                        
                        //document.getElementById('lpassword').style.visibility='visible';
                        //document.getElementById('lpassword').value="Password";
                        
                        document.getElementById('lsubmit').style.visibility='visible';
                        
                        logoutDisplay.innerHTML = "<a href='#'>Forgot Password</a> | <a href='#'>Register</a>";                                    
                        ajaxDisplayns.innerHTML = "**invalid username or password";
                    }
                    else
                    {
                        document.getElementById('lusername').style.visibility='hidden';
                        document.getElementById('lpassword').style.visibility='hidden';
                        document.getElementById('lsubmit').style.visibility='hidden';
                        
                        logoutDisplay.innerHTML = "<a href='#'>Manage Account</a> | <a href='#' onclick='logoutFunction()'>Log Out</a>";
                    
                        ajaxDisplay2.innerHTML = ajaxRequest.responseText; 
                    }
                }
            }
            
            var lusername = document.getElementById('lusername').value;
            var lpassword = document.getElementById('lpassword').value;
            
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            var ajaxDisplay2 = document.getElementById('displaymsg');
            
            var logoutDisplay = document.getElementById('loginwelcomeRIGHT');
                        
            if (lusername === "Username") 
                {
                    ajaxDisplay2.innerHTML = "**please enter a username";
                    return false;
                }
            else if (lusername.length < 5) 
                {
                    ajaxDisplay2.innerHTML = "**length of username is too short";
                    return false;
                }             
            else if (!filter.test(lusername)) 
                {
                    ajaxDisplay2.innerHTML = "**please provide a valid email address";
                    return false;
                }             
            else if (lpassword === "Password") 
                {
                    ajaxDisplay2.innerHTML = "**please enter a password";
                    return false;
                }
            else if (lpassword.length < 5) 
                {
                    ajaxDisplay2.innerHTML = "**length of password is too short";
                    return false;
                }             
            else
                {
                    var queryString = "?lusername=" + lusername + "&lpassword=" + lpassword;
                    ajaxRequest.open("GET", "ajax-example.php" + queryString, true);                    
                    ajaxRequest.send(null);                                         
                }   
           } 
           
           //log out
        function logoutFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!
            
            try{
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            } catch (e){
                // Internet Explorer Browsers
                try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            
            var logoutDisplay = document.getElementById('loginwelcomeRIGHT');
            var ajaxDisplay2 = document.getElementById('displaymsg'); 
            
            document.getElementById('lusername').style.visibility='visible';
            document.getElementById('lusername').value="Username";
            
            document.getElementById('lpassword').style.visibility='visible';
            document.getElementById('lpassword').value="Password";
            
            document.getElementById('lsubmit').style.visibility='visible';
            
            logoutDisplay.innerHTML = "<a href='#'>Forgot Password</a> | <a href='#'>Register</a>";                                    
            ajaxDisplay2.innerHTML = "";                                    
             
           }
           
           //$().ready(function() {        
            //    $("#course").autocomplete("get_course_list.php", {
            //        width: 356,
            //        matchContains: true,
                    //mustMatch: true,
                    //minChars: 0,
                    //multiple: true,
                    //highlight: false,
                    //multipleSeparator: ",",
            //        selectFirst: false
            //    });
            //});
           
           function autolyricsearch() 
            {        
                    $("#course").autocomplete("get_course_list.php", {
                        width: 356,
                        matchContains: true,
                        selectFirst: false
                    });
                    
                    if (event.keyCode == 13) {
                        document.forms["lyricsearchform"].submit();
                    };        
            };
            
            function autologin() 
            {        
                if (event.keyCode == 13) {
                    ajaxFunction();
                 }; 
            };
            
            function showUser(str)
             {
             if (str=="")
               {
                return;       
               }
            if (window.XMLHttpRequest)
               {// code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp=new XMLHttpRequest();
               }
            else
               {// code for IE6, IE5
               xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
               }       
             xmlhttp.onreadystatechange=function()
               {
               if (xmlhttp.readyState==4 && xmlhttp.status==200)
                 {       
                 }
               }
             xmlhttp.open("GET","senddropdownval.php?q="+str,true);
             xmlhttp.send();
             
             document.getElementById('course').value="";
             
             } 