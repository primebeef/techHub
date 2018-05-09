<?php
    session_start();
    //Gets content from URL
$DOM = new DOMDocument;
$extractURLs[] = "";
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][1];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][2];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][3];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][4];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][5];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][6];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][7];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][8];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][9];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][10];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][11];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][12];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][13];
$extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$_SESSION['endUrl'][14];
$node_count = count($extractURLs);
$endStr = '';
$curl_arr = array();        
$master = curl_multi_init();
$endResponseContent = array();
$endResponseTitle = array();


    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
    function getContent($response){
        $content = get_string_between($response, '"summary":["', '"],"source"');
        $content = str_replace ('","', ' ' , $content);
        $content = json_decode('"' . str_replace('"', '\"', $content) . '"');
        return $content;
    }

for($i = 0; $i < $node_count; $i++){
    $url =$extractURLs[$i];
    $curl_arr[$i] = curl_init($url);
    curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
    curl_multi_add_handle($master, $curl_arr[$i]);
}
do {
    curl_multi_exec($master,$running);
} while($running > 0);
for($y = 1; $y <= $node_count; $y++){
    if (isset($extractURLs[$y]) == true){
        if (strpos($extractURLs[$y], "url=http") == false){
            $endResponseContent[$y] = false;
        }
        else{
            $results = curl_multi_getcontent($curl_arr[$y]);
            $content = getContent($results);

            
            if (trim($content) == ""){
                $endResponseContent[$y] = $_SESSION['endDesc'][$y+1];
            } else{    
                $endResponseContent[$y] = $content;
            }
            $endStr = $endStr.'<div class = "hidden" id = "hidden_'.($y).'_2">'.$endResponseContent[$y].'</div>';
        }
    }
}
echo $endStr;   
?>