<?php
$username = 'kent';
$myfile = fopen("$username.php", "w") or die("Unable to open file!");
$key = 'KEN';
$pass = '000';
$title = 'info';
$desc = 'name';
$txt = "<?php  array(
                                '$pass' => array(
                                    
                                    '$title' => array(
                                        '$desc' => 'Makenna Turner',
                                        'type' => 'Human',
                                        'Xage' => 14,
                                        'Bday' => '03/04/2002',
                                        
                                                    )
                                                )
                                        
                  
    
    ); ?>";
fwrite($myfile, $txt);
fclose($myfile);
?>