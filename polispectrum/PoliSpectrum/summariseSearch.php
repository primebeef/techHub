<?php
    session_start();
    $endResponseContent = array();
    $endResponseTitle = array();
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
        $content = json_decode('"' . str_replace('"', '\"', $content) . '"');
        return $content;
    }

    function getTitle($response, $startCut, $endCut){
        $pos = strpos($response, '"title"');
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=5;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }
    $endStr = '';
    //Gets content from URL
    function scrape($nodes){
        global $endResponseTitle, $endResponseContent, $endStr;
        $DOM = new DOMDocument;
        $node_count = count($nodes);
        $curl_arr = array();        
        $master = curl_multi_init();
        for($i = 0; $i < $node_count; $i++){
            $url =$nodes[$i];
            $curl_arr[$i] = curl_init($url);
            curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }
        do {
            curl_multi_exec($master,$running);
        } while($running > 0);
        for($y = 0; $y < $node_count; $y++){
            if (strpos($nodes[$y], "url=http") == false){
                $endResponseTitle[$y] = false;
                $endResponseContent[$y] = false;
            }
            else{
                $results = curl_multi_getcontent($curl_arr[$y]);
                $endResponseTitle[$y] = getTitle($results, 8, -2);
                $content = getContent($results);
                if ($y == 2){
                    $endResponseContent[$y] = $endResponseTitle[$y];
                }else if (trim($content) !== ''){
                
                    $endResponseContent[$y] = $content;
                }
            }
        }
        for ($x = 1; $x <= 6; $x++){
            if (isset($endResponseContent[$x])){
                $endStr = $endStr.'<div class = "hidden" id = "hidden'.$x.'_2">'.$endResponseContent[$x].'</div>';
            }
        }
        print $endStr;
    }
    scrape($_SESSION['extractURLs']);
    session_write_close();


?>