<?php include "../Library/Taehros.php"; Doctype();?>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php
$sentence = "13/1/11/5/14/14/1. hello";
//USE FOREACH TO SHOW DATA RESULT
$alphas = range('1', '9');
$alphas = CON_AtS($alphas);
echo $alphas;
$note = strcspn($sentence,'.');
$letter = strcspn($sentence,$range);

$sentence = substr($sentence,$letter,$note);


$singular = explode('/',$sentence);
foreach($singular as $e){
 
    switch($e){
            case '1':
                echo 'A';
                break;
            case '2':
                echo 'B';
                break;
            case '3':
                echo 'C';
                break;
            case '4':
                echo 'D';
                break;
            case '5':
                echo 'E';
                break;
            case '6':
                echo 'F';
                break;
            case '7':
                echo 'G';
                break;
            case '8':
                echo 'H';
                break;
            case '9':
                echo 'I';
                break;
            case '10':
                echo 'J';
                break;
            case '11':
                echo 'K';
                break;
            case '12':
                echo 'L';
                break;
            case '13':
                echo 'M';
                break;
            case '14':
                echo 'N';
                break;
            case '15':
                echo 'O';
                break;
            case '16':
                echo 'P';
                break;
            case '17':
                echo 'Q';
                break;
            case '18':
                echo 'R';
                break;
            case '19':
                echo 'S';
                break;
            case '20':
                echo 'T';
                break;
            case '21':
                echo 'U';
                break;
            case '22':
                echo 'V';
                break;
            case '23':
                echo 'W';
                break;
            case '24':
                echo 'X';
                break;
            case '25':
                echo 'Y';
                break;
            case '26':
                echo 'Z';
                break;
                default:
                    echo "dumbo";
                break;
                 

}

}
?>
</body>
</html>

