<?php include "../Library/Taehros.php"; Doctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php

//Parse Script & parse stop and start
// (t) is to break each appart into individuals
// {setvalue} is to assign to a previous the value listed.
LinkParse("[des](t).'them,there,those,that'.{setvalue}=1/end^",'[',']');
function LinkParse($PS,$kstart,$kstop){
    $flist = array(
    'des' => array(
        't' => 'desT',
        ),
    
    );
    $PS = trim($PS);
    $kstart = strcspn($PS,$kstart);
    $kstop = strcspn($PS,$kstop);
    $key = substr($PS,$kstart + 1,$kstop - 1);
   // echo $key;
   $PS = trim($PS);
    $pstart = (strcspn($PS,'('));
    echo $pstart;
    $pstop = (strcspn($PS,')')-4);
    echo $pstop;
    $pass = substr($PS,$pstart + 1,$pstop - 2);
    echo $pass;
    $istart = strcspn($PS,"'");
    //echo $istart;
    $info = substr($PS,$istart + 1);
    $istop = strcspn($info,"'");
    //echo $istop;
    $info = substr($PS,$istart + 1,$istop);
    //echo $info;
    $WRDl = explode(",",$info);
    //echo CON_AtS($WRDl);
   switch($flist[$key][$pass]) {
       case 'desT':
           echo 'hi';
           break;
   }
   
}
function runFunct(){
    
}

//echo $flist['des']['t'];
?>
<script></script>
</body>
</html>