<?php include "../Library/Taehros.php"; Doctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
BSC_parse('[end]','[',']');
function BSC_parse($access,$slice, $end){
    // USE TURNARY FOR SECOND PARSIER.
    $access = trim($access);
//STEP 1: Parse XXX from beginning for array ID.
   $key = SCR_info($access,$slice);
   echo $key;
   $cut = strcspn($access,$end);
  
//Current Parseless
   $access = substr($access,$cut + 1);
  
}
?>
<script></script>
</body>
</html>