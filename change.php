<?php
session_start();
$user_id = $_SESSION['id'] ;

include "db_conn.php";
if(isset($_POST['lastChanged']) && isset($_POST['notes'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $lastChanged = validate($_POST['lastChanged']);
    $notes = validate($_POST['notes']);
  
    $sql = "SELECT * FROM baby WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "Hello";
           
    } else{
        $sql2 = "UPDATE baby SET lastChanged = '$lastChanged', notes = '$notes' WHERE id = $user_id";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        header("Location: home.php");
    }
}  