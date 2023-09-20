<?php
session_start();
include "db_conn.php";

$user_id = $_SESSION['id'] ;



$sql = "SELECT * FROM baby WHERE id=$user_id";
$result = $conn->query($sql);
?>
<header>
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <nav>
        <a href="home.php">Home</a>
        <a href="track.html">Track</a>
        <a href="index.html" id="sign">Sign out</a>
    </nav>
</header>
<body>
<table>
<?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <div>
            <?php echo $rows['name'];?>
                </div>
            <tr>
                <th>Height(cm)</th>
                <th>Weight(lbs)</th>
                <th>Age(months)</th>
                <th>Last Time Fed</th>
            </tr>

                <tr>
                <td><?php echo $rows['height'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo $rows['age'];?></td>
                <td><?php echo $rows['time'];?></td>
                </tr>
            <?php
                }
                ?>
</body>
</html>