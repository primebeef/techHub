<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title>KYLOS</title>
</head>
<body>
<?php
include "wordlib.php";
$page = "And in these most unfortunate of dispositions, I no longer trust in the stability of my own intuition.";
$ps;
$ps0;
$pre = array();
$pre['domain'] = 'wordlib.php';
$drx = array();
function splits(){
    global $page;
    global $ps0; // page split
    $ps0 = preg_replace("/[^A-Za-z0-9 ]/", '', $page);
$ps0 = explode(" ", $ps0);
//return $new;
}
function format_0(){
    global $ps0;
    global $ps;
    foreach($ps0 as $e){
        $ps[] = strtoupper($e);
    }
    
}
function unknown(){
    global $ps;
    global $DRX;
    $s = array_keys($DRX);
    foreach($ps as $i){
        $check = false;
        foreach($DRX['w'] as $e){
            if($e['info']['word'] == $i){
                $check = true;
            }
            if($e['info']['plrl'] == $i){
                $check = true;
            }
            else{}
        }
        if($check == false){
            insert($i);
            echo "NO<br>";
            
        }
        if($check == true){
        
            echo "YES<br>";
        }
    }
    /*foreach($DRX['w'] as $i=>$e){
        foreach($ps as $b){
            if(isset($b) == $b)
        }
      //echo $e['info']['word'];  
    }
    */
}
function gen_code(){
        global $DRX;
        $a = rand(0,9);
        $b = rand(0,9);
        $x = rand(0,9);
        $y = rand(0,9);
        $m = rand(0,9);
        $n = rand(0,9);
        $sim = range("a","z");
        $one = rand(0,25);
        switch($n){
            case 0:
                $new = $a.$b.$x.$sim[$one].$y.$m.$n;
                break;
            case 1:
                $new = $b.$x.$y.$m.$n.$a.$sim[$one]; 
                break;
            case 2:
                $new = $x.$sim[$one].$y.$m.$n.$a.$b; 
                break;
            case 3:
                $new = $y.$m.$n.$a.$b.$sim[$one].$x; 
                break;
            case 4:
                $new = $b.$x.$y.$m.$n.$a.$sim[$one]; 
                break;
            case 5:
                $new = $x.$sim[$one].$y.$m.$n.$a.$b; 
                break;
            case 6:
                $new = $y.$m.$n.$a.$b.$sim[$one].$x; 
                break;
            case 7:
                $new = $b.$x.$y.$m.$n.$a.$sim[$one]; 
                break;
            case 8:
                $new = $x.$sim[$one].$y.$m.$n.$a.$b; 
                break;
            case 9:
                $new = $y.$m.$n.$a.$b.$sim[$one].$x; 
                break;
        }
        $new = "_".$new;
if(array_key_exists($new,$DRX) == true){
    gen_code();
}
else{
    return $new;
}

}
function insert($name){
    global $pre;
    $domain = $pre['domain'];
    $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               $contents = file_get_contents($domain);
$contents = str_replace("),);?>", '', $contents);
file_put_contents($domain, $contents);
$GREY = gen_code();
$maxim = "\n
'$GREY' => array(
                    'info'  => array(
                        'word'  => \"$name\",
                        'defn'  => \"null\",
                        'posp'  => \"null\",
                        'plrl'  => \"null\",
                        'type'  => \"null\",
                        ),
                    'data'  => array(
                        
                        ),
                    'assc'  => array(
                        
                        ),
                        
                ),";
            
            fwrite($file,$maxim);
            fwrite($file,"),);?>");
               fclose($file);
}
splits();
format_0();
unknown();
foreach($ps as $e){
    echo $e." ";
}
function define_pull($word){
    $content = file_get_contents("https://www.merriam-webster.com/dictionary/$word");

preg_match('#<tr><th>(.*)</th> <td><b>price</b></td></tr>#', $content, $match);
$price = $match[1];

preg_match('#<input type="hidden" name="quantity_on_hand" value="(.*?)">#', $content, $match);
$in_stock = $match[1];

echo "Price: $price - Availability: $in_stock\n";
}
?>
</body>
</html>