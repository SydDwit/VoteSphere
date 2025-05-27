<?php
session_start();

// if (!isset($_SESSION["adminData"])) {
//     header("Location: login.php");
// }

// Include your database connection file
include("../api/connect.php");

// Fetch voters data for management
$votersQuery = mysqli_query($connect, "SELECT * FROM user WHERE role = 2");
$votersData = mysqli_fetch_all($votersQuery, MYSQLI_ASSOC);
?>

<html>
<head>
    <title>Manage Voters</title>
    <link rel="stylesheet" href="../css/stylesheet_dashboard.css" />
</head>
<body>

    <div id="headerSection">
        <a href="admin_dashboard.php"><button id="backbtn">Back to Dashboard</button></a>
        <a href="../routes/logout.php"><button id="logoutbtn">Logout</button></a>
        <h1 style="color:white";>Manage Voters</h1>
    </div>

    <div id="container">
        <div id="Voters" class="section-box">
            <h2>VOTERS</h2>
            <?php
            if ($votersData) {
                foreach ($votersData as $voter) {
                    ?>
                    <div class="voter-box">
                        <img src="../uploads/<?php echo $voter['photo']; ?>" height="100" width="100" /><br><br>
                        <b>Voter Name: </b><?php echo $voter['name'] ?> <br><br>
                        <b>Email: </b><?php echo $voter['email'] ?> <br><br>
                        <!-- Add more voter details as needed -->
                        <form action="delete_voter.php" method="post">
                            <input type="hidden" name="voter_id" value="<?php echo $voter['id']; ?>">
                            <input type="submit" name="delete_btn" value="Delete Voter">
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No voters found.";
            }
            ?>
        </div>
    </div>

</body>
</html>
