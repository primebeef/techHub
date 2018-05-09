<?php
 $DRX = array(

    'NEO' =>
            array(
    '000' => array('yolk' => 'hi'),
        
    ),
    'NEO' => array(
        '000' => array(
                'info' => array(
                            'name' => 'hello'
                                )
                    ),
        '001' => array(),
        '002' => array(),
    ),
    'AST' => array(
        'id' => 5342,
        'usn' => 'makenna',
        'last_name' => 'Makenna2002',
    ),
    'KIP' => array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
$key = 'NEO';
$pass = 000;
$title = 'yolk';
$SYN = '';
foreach($DRX as $m){
        if($m == $DRX[$key]){
          echo "poe";
        }
}
// print_r( $DRX[$key][$pass][$title]);
?>