<?php
session_start();
$user_id = $_SESSION['id'] ;

include "db_conn.php";
if(isset($_POST['lastAte']) && isset($_POST['foodType'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $lastAte = validate($_POST['lastAte']);
    $foodType = validate($_POST['foodType']);
  
    $sql = "SELECT * FROM baby WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "Hello";
           
    } else{
        $sql2 = "UPDATE baby SET lastAte = '$lastAte', foodType = '$foodType' WHERE id = $user_id";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        header("Location: home.php");
    }
}  