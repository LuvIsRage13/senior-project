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
        <a href="list.html">Track</a>
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
                <th>Went to sleep</th>
                <th>Woke up</th>
                <th>Last time changed:</th>
                <th>Notes:</th>
                <th>Last Time Ate:</th>
                <th>Food:</th>
            </tr>

                <tr>
                <td><?php echo $rows['height'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo $rows['age'];?></td>
                <td><?php echo $rows['time'];?></td>
                <td><?php echo $rows['bedtime'];?></td>
                <td><?php echo $rows['wakeUp'];?></td>
                <td><?php echo $rows['lastChanged'];?></td>
                <td><?php echo $rows['notes'];?></td>
                <td><?php echo $rows['lastAte'];?></td>
                <td><?php echo $rows['foodType'];?></td>
                </tr>
            <?php
                }
                ?>
</body>
</html>