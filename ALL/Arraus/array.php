<?php
$users = array(

    array(
        'usn' => 'makenna',
       'psc' => 'Makenna2002',
        
    ),
    array(
        'id' => 3245,
        'usn' => 'sammyj',
        'psc' => 'Makenna2002',
    ),
    array(
        'id' => 5342,
        'usn' => 'makenna',
        'last_name' => 'Makenna2002',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
var_dump($users);
if($users[0]['usn'] != null){
    echo "YUP";
}
?>