<?php
include "db_conn.php";
session_start();
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
            $_SESSION['id'] = $row['id'];
            $user_id = $_SESSION['id'] ;
          
            header("Location: home.php");
        }
    }
    else{

echo '<script type="text/javascript">

            window.onload = function () { alert("Incorrect Username or Password, try again.");
            history.go(-1); }
            
</script>';

    }
}else{
    header("Location: index.html");
    exit();
}

