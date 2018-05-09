<?php 
    function nameOf(){
        global $DRX_basic;
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
if(array_key_exists($new,$DRX_basic) == true){
    nameOf();
}
else{
    return $new;
}
    }
?>