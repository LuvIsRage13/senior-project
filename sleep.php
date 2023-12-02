<?php
session_start();
$user_id = $_SESSION['id'] ;

include "db_conn.php";
if(isset($_POST['bedtime']) && isset($_POST['wakeUp'])) { //checks user input and strips data to a more readable format
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $bedtime = validate($_POST['bedtime']);
    $wakeUp = validate($_POST['wakeUp']);
  
    $sql = "SELECT * FROM baby WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "Hello";
           
    } else{
        $sql2 = "UPDATE baby SET bedtime = '$bedtime', wakeUp = '$wakeUp' WHERE id = $user_id";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        header("Location: list.html");
    }
}      