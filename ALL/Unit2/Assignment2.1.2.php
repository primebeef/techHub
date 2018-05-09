<?php include '../Library/Tech30Lib.php'?>
<?php
printDoctype();
?>
<html>
    <!DOCTYPE html>
<html>
<!--
  Assignment: 2.1 
  Name: Makenna Turner

-->

<head>
<title></title>
<style>@import url('https://fonts.googleapis.com/css?family=Lato');</style>
<style>
html,body{
    padding:3;
    margin:0;
    
}
a:link{
    color:white;
}
a{
    color:white;
}
body{ background-color:#3E505B;
    font-family: 'Lato', sans-serif;
    color:white;
}
</style>
</head>
<body>
<?php
 $dir = getValue('path','.');
tonybologna($dir);

?>
</body>
</html>