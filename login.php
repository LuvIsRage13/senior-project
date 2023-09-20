<?php
include "db_conn.php";
if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    $sql = "SELECT * FROM users WHERE uname = '$uname' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if($row['uname'] === $uname && $row['password'] === $password) {
            echo "Logged in!";
            header("Location: home.php");
        }
        else{

        }
    }
    else{
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
}else{
    header("Location: index.php");
    exit();
}

