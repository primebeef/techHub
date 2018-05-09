<pre>
<?php
include "../Library/Tech30Lib.php";
$DRX = array(
    'SEE' => array(
        'def' =>    'to have sight',
        'rts' =>    array('see','nari'),
        'PST' =>    array('saw','nars'), //Past tense, past tense with have.
        'PSH' =>    array('seen','nars'),
        'PRE' =>    array('see','nare'),
        'FUT' =>    array('see','nar'),
        'SEC' =>    array(null,'nari'),
        
        ),
    
    
    );
    $info = array();
function create_word(){
    $info['def']= 'add';  
}

var_dump($DRX);
$DRX = add($DRX,$info);
function add($array,$info){
    $array[]=$info;
    return $array;
}
var_dump($DRX);
?>
</pre>