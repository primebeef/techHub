<?php
session_start();
$mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
function getContent($response){
        $content = get_string_between($response, '"summary":["', '"],"source"');
        $content = str_replace ('","', ' ' , $content);
        $content = json_decode('"' . str_replace('"', '\"', $content) . '"');
        return $content;
    }
    
function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
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
    
function getRank($site){
        global $mysqli;
        $sql = "SELECT * FROM ranks WHERE id = '$site'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $numTot = $row['total'];
            $num = $row['num'];
        }
        return $numTot/$num;
    return 50;
    }

$endResponseSource = $_SESSION['urls']; 
$endResponseTitle = $_SESSION['titles']; 
$endResponseImg = $_SESSION['images'];
$endResponseDesc = $_SESSION['desc'];
$extractUrls = array();
$endStr = '';
$loc = 0;
for ($i = 10; $i <= 14; $i++){
    $_SESSION['usedNum'][] = $loc;
    do{
        $_SESSION['usedNum'][count($_SESSION['usedNum'])-1] = $loc;
        $loc = rand (1, count($endResponseTitle)-1);
    if (in_array($loc, $_SESSION['usedNum']) == false){
            break;
        }
    } while ($endResponseImg[$loc] == NULL || $endResponseImg[$loc] == "");
    $_SESSION['usedNum'][] = $loc;

    $endStr = $endStr.'<a href="javascript:void(0);" onclick="openModal('.$i.')">';
    $extractURLs[] = 'http://clipped.me/algorithm/clippedapi.php?url='.$endResponseSource[$loc];
    $endStr = $endStr.'<div class = "hidden" id = "hidden_'.$i.'">'.$endResponseSource[$loc].'</div>';
    $src = $endResponseSource[$loc];
    if (strpos($src, "nytimes") !== false){
        $src = "images/nyt_white.png";
        $srcName = "New York Times";
        $rank = getRank(5);
    }
    else if (strpos($src, "cnn") !== false){
        $src = "images/Cnn.png";
        $srcName = "CNN";
        $rank = getRank(3);
    }
    else if (strpos($src, "breitbart") !== false){
        $src = "images/Breitbart_News.png";
        $srcName = "Breitbart";
        $rank = getRank(2);
    }
    else if (strpos($src, "bbc") !== false){
        $src = "images/bbc.png";
        $srcName = "BBC";
        $rank = getRank(1);
    }
    else if (strpos($src, "ap") !== false){
        $src = "images/ap.png";
        $srcName = "AP";
        $rank = getRank(4);
    }
    else if (strpos($src, "wsj") !== false){
        $src = "https://www.wsj.com/apple-touch-icon.png";
        $srcName = "Wall Street Journal";
        $rank = getRank(6);
    }

    if ($rank > 60){
         $background = "rgba(168, 11, 68, 0.77)";
    }
    else if ($rank < 40){
         $background = "rgba(9, 27, 188, 0.77)";
    }
    else{
         $background = "rgba(85, 21, 168, 0.77)";
    }
    $endStr = $endStr.'<div class = "newsArticle"><div class = "container"><img src = "'.$endResponseImg[$loc].'" id = "img'.$i.'"/></div><div class = "overlay" id = "overlay'.$i.'" style = "background: '.$background.'">';

    $endStr = $endStr."<img src = '".$src."'/><h2 id = 'overlay".$i."Txt'>";
        if ($rank < 40){
            $endStr = $endStr."Liberal";
        } else if ($rank > 60){
            $endStr = $endStr."Cons.";
        } else{
            $endStr = $endStr."Center";
        }
    $endStr = $endStr.'</h2></div><h1 id = "title'.$i.'">';
    $endStr = $endStr."<span>".$endResponseTitle[$loc]."</span><p>".$srcName."- ".date('M d').'</h1></div></a>';
    $endStr = $endStr.'<div class = "hidden" id = "hidden_1_'.($i).'">'.$endResponseDesc[$loc].'</div>';
   
}
session_write_close ();

$endStr = $endStr.'<img src = "images/arrow.png" class = "moreNewsImg"/>';
print $endStr;
?>