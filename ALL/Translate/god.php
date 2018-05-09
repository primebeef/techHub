<?php include "library-xgen.php"; printDoctype();?>
<?php
$size = isset($_GET['size'])?$_GET['size']:100;
$type = isset($_GET['type'])?$_GET['type']:'experiment';
$data = isset($_GET['data'])?$_GET['data']:false;
?>
<style>
body{
     background-color:#1C2321;
}
table{
    border-collapse:collapse;
    border:1px solid black;
}
td,th{
   border:1px solid transparent; 
   text-align:center;
   color:black;
   font-family: 'Press Start 2P', cursive;
   font-size:10px;
   user-select:none;
   
}
td.part{ position:relative;
        width:20px;
        height:20px;
    }
</style>
<?php
 $colors = array(
 0 => '#CEC3C1',
 1 => '#FFCF9C',
 2 => '#9CE5B4',
 3 => '#79CE96',
 4 => '#82B593'
    );
    
$offical = sum4($size);
$nite = toAtS($offical);
//simpledisp($offical);
if($data == true){
 $freq = newarray($nite);
asort($freq);
display($freq);
echo count($freq);   
}

startTable();
gotos($offical, $colors);
endTable();
// HAVE TO DO POBABILITY TO SEE IF FIX, COLOR COORD.
?>







