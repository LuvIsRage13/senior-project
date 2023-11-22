<?php
include "db_conn.php";
session_start();
$user_id = $_SESSION['id'] ;


    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        echo "$user_id";
        $sql1 = "DELETE FROM users WHERE id = $user_id";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();

        $sql2 = "DELETE FROM baby WHERE id = $user_id";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        header("Location: index.html");

    }
    else{
        echo "you suck mf";
    }


?>

