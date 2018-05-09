<?php
    session_start();
    $mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $user = $_SESSION['isLoggedIn'];
    if (isset($user)){
        $sql  = "SELECT * FROM userbase WHERE `userID` = '$user'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        if ($_POST['specPos'] > 60){
            $num = $row['consView'] + 1;
            $sql = "UPDATE userbase SET consView='$num' WHERE userID='$user'";
            $result = $mysqli->query($sql);
        } 
        else if ($_POST['specPos'] < 40){
            $num = $row['libView'] + 1;
            $sql = "UPDATE userbase SET libView='$num' WHERE userID='$user'";
            $result = $mysqli->query($sql);
        }
        else{
            $num = $row['centView'] + 1;
            $sql = "UPDATE userbase SET centView='$num' WHERE userID='$user'";
            $result = $mysqli->query($sql);
        }
    }
    $article = $_POST['articleURL'];
    $table = $_POST['source'];
    $sql  = "SELECT * FROM $table WHERE url = '$article'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $num = $row['views'] + 1;
    $sql = "UPDATE $table SET views='$num' WHERE url = '$article'";
    $result = $mysqli->query($sql);
?>
