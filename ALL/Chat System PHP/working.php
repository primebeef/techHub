<?php include "library-chat.php";?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php

$pre['domain'] = "talk";
$enter_newchat = false;
$new = array();
$new['name']=null;
$new['pass']=null;
if(isPost() == null){
   if(getValue('send',null) != null){
        $name = "Makenna";
    $send = getValue('user_message');
    //echo "$send";
    $domain = $pre['domain'];
               $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               
            $maxim = "<span>$name: $send</span><br>\n";
            fwrite($file,$maxim);
               fclose($file);
               //echo $maxim;
   }
   if(getValue('newchat',null)!= null){
       $enter_newchat = true;
   }
   if(getValue($new['name'],null)!=null && getValue($new['pass'],null)!=null){
        $domain = strtolower($new['name'])."_404".".php";
               $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               
            $maxim = "<?";
            fwrite($file,$maxim);
               fclose($file);
               //echo $maxim;
   }
}
startForm('post',$_SERVER['PHP_SELF']);



echo "<label id='logheader'style='font-size:30px;'>Chat</label>";
textInput('     ', 'user_message', null, null,$pre['domain']);
echo "<br>";
textInput('Message  ', 'user_message', null, null,'');
echo "<br>";
makeSubmit('Send', 'send');

endForm();
?>
<?php
startForm('post',$_SERVER['PHP_SELF']);
echo "<br>";
makeSubmit('New Chatroom', 'newchat');
echo "<br>";
if($enter_newchat == true){
    echo "<br>";
   textInput('Name ', 'new_name', null, null,'');
     echo "<br>";
   textInput('Password ', 'new_pass', null, null,'');
    
}
endForm();

?>
<script>
        function getTable(){
        var xmlHttp = new XMLHttpRequest();
        var url = "<?php echo $pre['domain'];?>.html";
        xmlHttp.open("GET", url, true);

        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    document.getElementById("current").innerHTML = xmlHttp.responseText;
                }
            }
        }
        xmlHttp.send();
    }




var timerNum = setInterval ("getTable()",1000);
 function deleterow(name){
    var objective = document.getElementById(name)
    document.write(objective)
 }
 
    </script>
<div id='current'></div>
</body>
</html>