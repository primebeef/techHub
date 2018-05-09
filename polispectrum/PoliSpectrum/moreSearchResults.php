<?php
session_start();
$mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
$offsetCount = $_GET['offset'];
$endResponseTitle = array();
    $endResponseContent = array();
    $endResponseImg = array();
    $endResponseDate = array();
    $endResponseDate[] = "";
    $endResponseSource = array();
    $endStr = '';

$searchTerm = $_SESSION['query']; 
$endStr = '';
session_write_close();

function getRank($site){
        global $mysqli;
        $sql = "SELECT * FROM ranks WHERE id = '$site'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $numTot = $row['total'];
            $num = $row['num'];
        }
        return $numTot/$num;
    }


function scrape(){
        global $endResponseTitle, $endResponseContent, $endStr, $endResponseImg, $endResponseDate, $endResponseSource, $offsetCount;
        $node_count = 6;
    for ($x = 0; $x < $node_count; $x++){
        if (isset($endResponseTitle[$x]) == true){
            $endStr = $endStr.'<div class = "searchContainer" onclick = "openModal('.($x+(7*$offsetCount)).')"><div class = "searchResult">';
            if (is_null($endResponseImg[$x]) || $endResponseImg[$x] == ''){ 
                $endStr = $endStr.'<img src = "images/placeholderpolispectrum.png" id = "img'.($x+(7*$offsetCount)).'"/>';
            }else{
                $endStr = $endStr.'<img src = "'.$endResponseImg[$x].'"" id = "img'.($x+(7*$offsetCount)).'"/>';
            }
            $endStr = $endStr.'<div class = "searchOverlay" id = "overlay'.($x+(7*$offsetCount)).'">';
            if ($x == 1){
                $src = "images/bbc.png";
                $name = "BBC";
            } else if ($x == 2){
                $src = "images/Breitbart_News.png";
                $name = "Breitbart";
            } else if ($x == 3){
                $src = "images/Cnn.png";
                $name = "CNN";
            } else if ($x == 4){
                $src = "images/ap.png";
                $name = "AP";
            } else if ($x == 5){
                $src = "images/nyt_white.png";
                $name = "New York Times";
            } else{
                $src = "https://www.wsj.com/apple-touch-icon.png";
                $name = "Wall Street Journal";
            }
            $endStr = $endStr.'<img src = "'.$src.'" class = "logo"/><span id = "overlay'.($x+(7*$offsetCount)).'Txt">';
            $rank = getRank($x+1);
            if ($rank < 40){
                $endStr = $endStr."Liberal";
            } else if ($rank > 60){
                $endStr = $endStr."Cons.";
            } else{
                $endStr = $endStr."Center";
            }
            $endStr = $endStr.'</span></div></div><div class = "container"><h1 id = "title'.($x+(7*$offsetCount)).'">'.$endResponseTitle[$x].'</h1>';
            $endStr = $endStr.'<h4>'.$name.' - '.$endResponseDate[$x].'</h4>';
            $endStr = $endStr."<p>".substr($endResponseContent[$x], 0, 150)."...".'</p></div>';
            $endStr = $endStr.'<script type = "text/javascript">var i = '.($x+(7*$offsetCount)).';
            var varStrText = "overlay"+i+"Txt";
            var varStrColor = "overlay"+i;
            var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 11, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script></div><div class = "hidden" id = "hidden'.($x+(7*$offsetCount)).'">'.$endResponseSource[$x].'</div><div class = "hidden" id = "hidden'.($x+(7*$offsetCount)).'_2">'.$endResponseContent[$x].'</div>';
        }
    }
    echo $endStr;
}


function getRequests($table){
    global $mysqli, $searchTerm, $endResponseTitle, $endResponseSource, $endResponseImg, $endResponseContent, $endResponseDate, $offsetCount;
    $searchTerm = mysqli_real_escape_string($mysqli, $searchTerm);

    $sql = "SELECT * FROM $table WHERE description LIKE '%$searchTerm%' ORDER BY id DESC LIMIT 1 OFFSET ".$offsetCount.";";
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error: " . $sql . "<br><br>" . $mysqli->error;
    } 
    else{
        $row = $result->fetch_assoc();
        array_push($endResponseSource, $row["url"]);
        array_push($endResponseTitle, $row["title"]);
        array_push($endResponseImg, $row["imgSrc"]);
        $endResponseContent[] = $row["description"];
        $t = strtotime($row["date"]);
        if ($t < strtotime('-10 year')){
            $date = date('M d');
            $endResponseDate[] = $date;
        } else{
            $endResponseDate[] = date('M d',$t);
        } 
    }
}
getRequests('BBC');
getRequests('Breit');
getRequests('CNN');
getRequests('AP');
getRequests('NYT');
getRequests('WSJ');
scrape();
?>