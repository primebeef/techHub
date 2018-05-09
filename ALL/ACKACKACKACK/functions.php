<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php
$sentence = "This maze was not  meant for you.";
PostW($sentence);
function PostW($sentence){
    $sentence = trim($sentence);
   $cut = strcspn($sentence," ");

   $long = strlen($sentence);
  
   $length = 0;
   while($length <= $long){
      $cut = strcspn($sentence,"/");
        //$cut = strspn($sentence,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
       $sent =  substr($sentence,0,$cut);
       $sentence = substr($sentence,$cut);
       $sentence = trim($sentence);
       $sentence = rtrim($sentence,".");
          //echo $sentence."<br>";
       echo $sent."<br>";
       $length = $length + 1;
       
   }
   if($length > $long || $length == $long){
       
   }
}
?>
</body>
</html>