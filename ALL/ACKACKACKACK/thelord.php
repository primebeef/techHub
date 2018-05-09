<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php include "../Library/Taehros.php";
      include"../Library/DRX.php";
?>
<html>
<head>
<title></title>
</head>
<body>
    <pre>
<?php
// First you'd need to ID the $flow. then use universal $DRX. Switch Statement.
//$YES = SRC('info', $DRX['EAP']['000']);
//echo $YES;
POSSKEY($DRX['KEN']);
POSSKEY($DRX['KEN']['000']);
POSSKEY($DRX['KEN']['000']['info']);
//$where = DATA_KLINK('The Raven',$DRX['EAP']['000']['info']);
//echo $where;
//$find = PARSE('EAP.000-info_titl/','BKS',false);
//echo $find;
//var_dump($DRX);
SHOWSTREAM();
function SHOWSTREAM($key,$pass,$title,$desc,$DIR){
    switch($DIR){
        case 'DRX':
            include"../Library/DRX.php"; 
            break;
        case 'BKS':
            include"../Library/BKS.php"; 
            break;
            default:
                break;
    }
    
    echo $path;
$long = strlen($path); 
echo $long;
}
?>
</pre>
<script></script>
</body>
</html>