<?php
session_start();
$user_id = $_SESSION['id'] ;

include "db_conn.php";
if(isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['time']) && isset($_POST['name'])) {
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
    $name = validate($_POST['name']);
    $time = $time . ":00";



    $sql = "SELECT * FROM baby WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        if($name === ""){
            $sql3 = "INSERT INTO baby (height, weight, age, time)
            VALUES ('$height', '$weight', '$age', '$time')";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            header("Location: home.php");
        }else{
        $sql3 = "INSERT INTO baby (height, weight, age, time, name)
        VALUES ('$height', '$weight', '$age', '$time', '$name')";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        header("Location: home.php");
        }
    }
    else {
        if($name === ""){
            $sql2 = "UPDATE baby SET height='$height', weight = '$weight', age = '$age', time = '$time' WHERE id=$user_id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    header("Location: home.php");
        }else{
    $sql2 = "UPDATE baby SET height='$height', weight = '$weight', age = '$age', time = '$time', name = '$name' WHERE id=$user_id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    header("Location: home.php");
        }
    } 
}