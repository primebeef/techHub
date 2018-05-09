<?php include "../Library/Tech30Lib.php"; printDoctype();?>

<html>
<head>
<title></title>
</head>
<body>
<?php
// define all states in an associative array
// key = state code (2 letters)
// value = full state name

$state = array();
$state['AL']='Alabama';
$state['AK']='Alaska';
$state['AZ']='Arizona';
$state['AR']='Arkansas';
$state['CA']='California';
$state['CO']='Colorado';
$state['CT']='Connecticut';
$state['DE']='Delaware';
$state['DC']='District of Columbia';
$state['FL']='Florida';
$state['GA']='Georgia';
$state['HI']='Hawaii';
$state['ID']='Idaho';
$state['IL']='Illinois';
$state['IN']='Indiana';
$state['IA']='Iowa';
$state['KS']='Kansas';
$state['KY']='Kentucky';
$state['LA']='Louisiana';
$state['ME']='Maine';
$state['MD']='Maryland';
$state['MA']='Massachusetts';
$state['MI']='Michigan';
$state['MN']='Minnesota';
$state['MS']='Mississippi';
$state['MO']='Missouri';
$state['MT']='Montana';
$state['NE']='Nebraska';
$state['NV']='Nevada';
$state['NH']='New Hampshire';
$state['NJ']='New Jersey';
$state['NM']='New Mexico';
$state['NY']='New York';
$state['NC']='North Carolina';
$state['ND']='North Dakota';
$state['OH']='Ohio';
$state['OK']='Oklahoma';
$state['OR']='Oregon';
$state['PA']='Pennsylvania';
$state['RI']='Rhode Island';
$state['SC']='South Carolina';
$state['SD']='South Dakota';
$state['TN']='Tennessee';
$state['TX']='Texas';
$state['UT']='Utah';
$state['VT']='Vermont';
$state['VA']='Virginia';
$state['WA']='Washington';
$state['WV']='West Virginia';
$state['WI']='Wisconsin';
$state['WY']='Wyoming';

// top 50 cities in the US by population 
// key = City name
// value = state code
$cities = array();
$cities['Atlanta']='GA';
$cities['Austin']='TX';
$cities['Baltimore']='MD';
$cities['Birmingham']='AL';
$cities['Boston']='MA';
$cities['Buffalo']='NY';
$cities['Charlotte']='NC';
$cities['Chicago']='IL';
$cities['Cincinnati']='OH';
$cities['Cleveland']='OH';
$cities['Dallas']='TX';
$cities['Denver']='CO';
$cities['Detroit']='MI';
$cities['Hartford']='CT';
$cities['Houston']='TX';
$cities['Indianapolis']='IN';
$cities['Kansas City']='MO';
$cities['Las Vegas']='NV';
$cities['Los Angeles']='CA';
$cities['Louisville']='KY';
$cities['Memphis']='TN';
$cities['Miami']='FL';
$cities['Milwaukee']='WI';
$cities['Minneapolis']='MN';
$cities['Nashville']='TN';
$cities['New Orleans']='LA';
$cities['New York']='NY';
$cities['Orlando']='FL';
$cities['Philadelphia']='PA';
$cities['Phoenix']='AZ';
$cities['Portland']='OR';
$cities['Providence']='RI';
$cities['Raleigh']='NC';
$cities['Riverside']='CA';
$cities['Sacramento']='CA';
$cities['San Antonio']='TX';
$cities['San Diego']='CA';
$cities['San Francisco']='CA';
$cities['San Jose']='CA';
$cities['Seattle']='WA';
$cities['St. Louis']='MO';
$cities['Tampa']='FL';
$cities['Virginia Beach']='VA';
$cities['Washington']='DC';
$cities['Pittsburgh']='PA';
$cities['Columbus']='OH';
$cities['Jacksonville']='FL';
$cities['Richmond']='VA';
$cities['Oklahoma City']='OK';
$cities['Salt Lake City']='UT';
$cities['Rochester']='NY';

// top 50 cities in the US by population
// key = City Name
// value = population (2010) 
$pop = array();
$pop['Atlanta']=5268860;
$pop['Austin']=1716289;
$pop['Baltimore']=2710489;
$pop['Birmingham']=1128047;
$pop['Boston']=4552402;
$pop['Buffalo']=1135509;
$pop['Charlotte']=1758038;
$pop['Chicago']=9461105;
$pop['Cincinnati']=2130151;
$pop['Cleveland']=2077240;
$pop['Dallas']=6371773;
$pop['Denver']=2543482;
$pop['Detroit']=4296250;
$pop['Hartford']=1212381;
$pop['Houston']=5946800;
$pop['Indianapolis']=1756241;
$pop['Kansas City']=2035334;
$pop['Las Vegas']=1951269;
$pop['Los Angeles']=12828837;
$pop['Louisville']=1283566;
$pop['Memphis']=1316100;
$pop['Miami']=5564635;
$pop['Milwaukee']=1555908;
$pop['Minneapolis']=3279833;
$pop['Nashville']=1589934;
$pop['New Orleans']=1167764;
$pop['New York']=18897109;
$pop['Orlando']=2134411;
$pop['Philadelphia']=5965343;
$pop['Phoenix']=4192887;
$pop['Portland']=2226009;
$pop['Providence']=1600852;
$pop['Raleigh']=1130490;
$pop['Riverside']=4224851;
$pop['Sacramento']=2149127;
$pop['San Antonio']=2142508;
$pop['San Diego']=3095313;
$pop['San Francisco']=4335391;
$pop['San Jose']=1836911;
$pop['Seattle']=3439809;
$pop['St. Louis']=2812896;
$pop['Tampa']=2783243;
$pop['Virginia Beach']=1671683;
$pop['Washington']=5582170;
$pop['Pittsburgh']=2356285;
$pop['Columbus']=1836536;
$pop['Jacksonville']=1345596;
$pop['Richmond']= 1258251;
$pop['Oklahoma City']=1252987;
$pop['Salt Lake City']=1124197;
$pop['Rochester']=1054323;
?>
<script></script>

<pre>
    <?php
    $search = isset($_GET['src'])?$_GET['src']:"CO";
foreach($state as $key=>$e){
    if($key == $search){
        $stk = $key;
        $sk = $e;
       
        foreach($cities as $key=>$e){
            if($e == $stk){
                $cik = $key;
                
                
                foreach($pop as $key=>$e){
                    if($key == $cik){
                        $pol = $e;
                       
                    }
                }
            }
        }
    }
    else{}
}
echo "In $sk, the most populated city is $cik with a population of $pol";
?>
</pre>
</body>
</html>