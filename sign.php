<?php
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $name = validate($_POST['name']);
    


    $sql = "INSERT INTO users (uname, password, name)
    VALUES ('$uname', '$password', '$name')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

   
    $sql2= "INSERT INTO baby (height, weight, age, time, name, bedtime, wakeUp, lastChanged, notes, lastAte, foodType)
    VALUES (0,0,0,0,'BabyName',0,0,0,0,0,0)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    header("Location: index.html");

}