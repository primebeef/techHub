<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php

$list = getImageNames('Images','');	// you will write this later
		// for testing purposes only
$file = pickRandom($list);	// you will write this later
	// for testing purposes only
?>


<html>
<head>
    <!--
    Extension: Made it file specific.
    -->
<title></title>
<style>
    html,body{
        padding:0;
    }
    body{
         text-align:center;
    }
    img{
       
    }
</style>
</head>
<body>
<img src="Images/<?php echo $file?>">
<script></script>
</body>
</html>
