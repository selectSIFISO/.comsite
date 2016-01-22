<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Papermashup.com | jQuery PHP Ajax Autosuggest</title>
 
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
    function lookup(inputString) {
        if(inputString.length == 0) {
            // Hide the suggestion box.
            $('#suggestions').hide();
        } else {
            $.post("rpc.php", {queryString: ""+inputString+""}, function(data){
                if(data.length >0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').html(data);
                }
            });
        }
    } // lookup
    
    function fill(thisValue) {
        $('#inputString').val(thisValue);
        setTimeout("$('#suggestions').hide();", 200);
    }
</script>

<style type="text/css">
    body {
        font-family: Helvetica;
        font-size: 11px;
        color: #000;
    }
    
    h3 {
        margin: 0px;
        padding: 0px;    
    }

    .suggestionsBox {
        position: relative;
        left: 30px;
        margin: 10px 0px 0px 0px;
        width: 200px;
        background-color: #212427;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        border: 2px solid #000;    
        color: #fff;
    }
    
    .suggestionList {
        margin: 0px;
        padding: 0px;
    }
    
    .suggestionList li {
        
        margin: 0px 0px 3px 0px;
        padding: 3px;
        cursor: pointer;
    }
    
    .suggestionList li:hover {
        background-color: #659CD8;
    }
</style>

</head>

<body>




 <form id="form" action="#">
    <div id="suggest">Start to type a country: <br />
      <input type="text" size="25" value="" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" />
     
      <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
   </div>
</form>

        <form>
            <div>
                Type your county:
                <br />
                <input type="text" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
            </div>
            
            <div class="suggestionsBox" id="suggestions" style="display: none;">
                <img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                <div class="suggestionList" id="autoSuggestionsList">
                    &nbsp;
                </div>
            </div>
        </form>



</body>
</html>