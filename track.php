<?php
include "db_conn.php";
if(isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['time'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $height = validate($_POST['height']);
    $weight = validate($_POST['weight']);
    $age = validate($_POST['age']);
    $time = validate($_POST['time']);
    $time = $time . ":00";

    echo "$time";

    $sql = "UPDATE baby SET height='$height', weight = '$weight', age = '$age', time = '$time' WHERE id=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: home.php");

}