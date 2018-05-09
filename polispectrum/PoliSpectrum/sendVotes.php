<?php
    session_start();
    $mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $num = 0;
    $numTot = 0;
    $user = $_SESSION['isLoggedIn'];
    function sendRanks()
    {
        global $mysqli, $num, $numTot;
        $newsRank = $_POST["sitenum"];
        $sql  = "SELECT * FROM ranks WHERE id = '$newsRank'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $numTot = $_POST['value'] + $row['total'];
            $num = $row['num'] + 1;
        }
        $sql = "UPDATE ranks SET total='$numTot', num='$num' WHERE id='$newsRank'";
        $result = $mysqli->query($sql);
    }
    sendRanks();

    $sql  = "SELECT * FROM userbase WHERE `userID` = '$user'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    if ($numTot/$num > 60){
        $numTot = $_POST['value'] + $row['consVotes'];
        $num = $row['consVotesCount'] + 1;
        $sql = "UPDATE userbase SET consVotes='$numTot', consVotesCount='$num' WHERE userID='$user'";
        $result = $mysqli->query($sql);
    } 
    else if ($numTot/$num < 40){
        $numTot = $_POST['value'] + $row['libVotes'];
        $num = $row['libVotesCount'] + 1;
        $sql = "UPDATE userbase SET libVotes='$numTot', libVotesCount='$num' WHERE userID='$user'";
        $result = $mysqli->query($sql);
    }
    else{
        $numTot = $_POST['value'] + $row['centVotes'];
        $num = $row['centVotesCount'] + 1;
        $sql = "UPDATE userbase SET centVotes='$numTot', centVotesCount='$num' WHERE userID='$user'";
        $result = $mysqli->query($sql);
    }
?>