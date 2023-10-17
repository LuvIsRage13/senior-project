<?php
include "db_conn.php";
if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['bName'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $name = validate($_POST['name']);
    $BName = validate($_POST['bName']);

    $sql = "INSERT INTO users (uname, password, name)
    VALUES ('$uname', '$password', '$name')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: index.html");

}