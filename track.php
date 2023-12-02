<?php
session_start();
$user_id = $_SESSION['id'] ;

include "db_conn.php";
if(isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['name'])) { //checks user input and strips data to a more readable format
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $height = validate($_POST['height']);
    $weight = validate($_POST['weight']);
    $age = validate($_POST['age']);
    $name = validate($_POST['name']);
    



    $sql = "SELECT * FROM baby WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        if($name === ""){
            $sql3 = "INSERT INTO baby (height, weight, age)
            VALUES ('$height', '$weight', '$age')";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            header("Location: home.php");
        }else{
        $sql3 = "INSERT INTO baby (height, weight, age, name)
        VALUES ('$height', '$weight', '$age','$name')";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        header("Location: home.php");
        }
    }
    else {
        if($name === ""){
            $sql2 = "UPDATE baby SET height='$height', weight = '$weight', age = '$age' WHERE id=$user_id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    header("Location: home.php");
        }else{
    $sql2 = "UPDATE baby SET height='$height', weight = '$weight', age = '$age', name = '$name' WHERE id=$user_id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    header("Location: list.html");
        }
    } 
}