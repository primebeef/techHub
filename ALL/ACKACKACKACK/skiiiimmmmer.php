<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
</style>
</head>

<body>
<pre>
    <?php
    $DRX = array(
                'NEO' => array(
                    '000' => array(
                        
                        'info' => array(
                            'name' => 'hello',
                            'type' => 'synphian',
                                        )
                                    )
                            
      
    ));
// XXX. = $key, 000- = $pass, @@@_ = $title, desc = $desc.
$access = "NEO.000-info_name/";
PAR_string($access);
function PAR_string($access,$flow = null){
    $access = trim($access);
    $long = strlen($access);
//STEP 1: Parse XXX from beginning for array ID.
   $key = SCR_info($access,'.');
   $cut = strcspn($access,'.');
  
//Current Parseless
   $access = substr($access,$cut + 1);
  
//STEP 2: Parse 000.
   $pass = SCR_info($access,'-');
   $cut = strcspn($access,'-');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//STEP 3: Parse off 'title'.
 $title = SCR_info($access,'_');
   $cut = strcspn($access,'_');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//STEP 3: Parse off 'desc'.
 $desc = SCR_info($access,'/');
   $cut = strcspn($access,'/');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//
   echo $key."<br>";
   echo $pass."<br>";
   echo $title."<br>";
   echo $desc."<br>";
   
//Use Data.

}
SourcePAR($key,$pass,$title,$desc,'DRX');
echo $DRX['NEO']['000']['info']['name'];
function SCR_info($skim,$stop){
    
    $cut = strcspn($skim,$stop);
    $parse = substr($skim,0,$cut);
return $parse;
}
//Search data
function SRC_data($key,$pass,$title = null,$desc = null,$center='DRX'){
    $DRX = array(

    'NEO' => array(
        '000' => 'hi',
        '001' => 'Makenna2002',
        
    ),
    'P' => array(
        'id' => 3245,
        'usn' => 'sammyj',
        'psc' => 'Makenna2002',
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
//var_dump($DRX);
 /*if(($key != null)&&($pass != null)&&($title != null)&&($desc != null)){
   echo $DRX[$key][$pass];
    if($DRX[$key][$pass] != null){
        
    }
 }
*/ 
}
function SourcePAR($key,$pass,$title,$desc,$DIR){
 if(isset($DIR[$key][$pass][$title][$desc])==true){
     echo $DIR[$key][$pass][$title][$desc];
 }   
}
function SRCdata($key,$pass,$title,$desc,$DIR){
    $DRX = whichDRX($DIR);
    foreach($DRX as $m){
       if($m == $DRX[$key]){
           echo "YUP";
       } 
    }
}
function whichDRX($i){
    switch($i){
        
        default:
            $DRX = array(
                'NEO' => array(
                    '000' => array(
                        
                        'info' => array(
                            'name' => 'hello',
                            'type' => 'synphian',
                                        )
                                    )
                            
      
    ),
    'NEO' => array(
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
    }
    return $DRX;
}

?>
</pre>
</body>
</html>