<?php
    session_start();
    $endResponseContent = array();
    //Gets content from URL

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
        $content = preg_replace('/\\\\u[0-9A-F]{4}/i', '', $content);
        return $content;
    }

    $endStr = '';
    $DOM = new DOMDocument;
    $node_count = count($_SESSION['extracts']);
    $curl_arr = array();        
    $master = curl_multi_init();
    for($i = 0; $i < $node_count; $i++){
        $url =$_SESSION['extracts'][$i];
        $curl_arr[$i] = curl_init($url);
        curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
        curl_multi_add_handle($master, $curl_arr[$i]);
    }
    do {
        curl_multi_exec($master,$running);
    } while($running > 0);
    for($y = 0; $y < $node_count; $y++){
        if (strpos($_SESSION['extracts'][$y], "url=http") == false){
            $endResponseContent[$y] = false;
        }
        else{
            
            $results = curl_multi_getcontent($curl_arr[$y]);
            $content = getContent($results);

            if (trim($content) == ""){
                $endResponseContent[$y] = $_SESSION['desc'][$y];
            } else{    
                $endResponseContent[$y] = $content;
            }
            if ($y == 0){
                $endStr = $endStr.'<div class = "hidden" id = "hidden_1_-1">'.$endResponseContent[$y].'</div>';
            } else{
                $endStr = $endStr.'<div class = "hidden" id = "hidden_1_'.($y).'">'.$endResponseContent[$y].'</div>';
            }
        }
    }
    print $endStr;
       
?>