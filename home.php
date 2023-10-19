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
        <a href="about.html">About</a>
        <span onclick="window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ','_blank')" target="_blank">&#128118;</span>
    </nav>
</header>
<body>
    <div>
<table class="first">
<?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <div>
            <div class="n"><?php echo $rows['name'];?></div>
                </div>
            <tr>
                <th colspan="3" class="big">Measurements</th>
                </tr>
            <tr>
                <th>Height(cm)</th>
                <th>Weight(lbs)</th>
                <th>Age(months)</th>
                </tr>
                <tr>
                <td><?php echo $rows['height'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo $rows['age'];?></td>               
                </tr>
                </table>
            <table class="second">
                <tr>
                    <th colspan="2" class="big">Bedtime</th>
                </tr>
                <tr>
                    <th>Went to sleep</th>
                    <th>Woke up</th>
                </tr>
                <tr>
                    <td><?php echo $rows['bedtime'];?></td>
                    <td><?php echo $rows['wakeUp'];?></td>
                </tr>
            </table>
            
            <table class="third">
                <tr>
                    <th colspan="2" class="big">Diapers</th>
                </tr>
                <tr>
                    <th>Last time changed:</th>
                    <th>Notes:</th>
                </tr>
                <tr>
                    <td><?php echo $rows['lastChanged'];?></td>
                    <td><?php echo $rows['notes'];?></td>
                </tr>
            </table>
            <table class="fourth">
                <tr>
                    <th colspan="2" class="big">Eating</th>
                </tr>
                <tr>
                    <th>Last Time Ate:</th>
                    <th>Food:</th>
                </tr>
                <tr>
                    <td><?php echo $rows['lastAte'];?></td>
                    <td><?php echo $rows['foodType'];?></td>
                </tr>
            </table>        
                </div>
            <?php
                }
                ?>
</body>
</html>