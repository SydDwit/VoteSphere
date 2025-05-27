<?php
session_start();

// if (!isset($_SESSION["adminData"])) {
//     header("Location: login.php"); // Redirect to login page if not logged in as admin
// }

// Include your database connection file
include("../api/connect.php");

// $userdata = $_SESSION["userdata"];
// $candidatesdata = $_SESSION["candidatesdata"];
$adminData = $_SESSION["adminData"];

// Fetch any additional admin data if needed
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/stylessheet_admin.css">
</head>

<body>

    <div id="headerSection">
        <a href="../"><button id="backbtn">Back</button></a>
        <a href="../routes/logout.php"><button id="logoutbtn">Logout</button></a>
        <h1>Admin Dashboard</h1>
        <hr />
    </div>

    <div id="container">
        <div id="AdminProfile" class="section-box">
            <h2>ADMIN</h2>
            <center><img src="../uploads/<?php echo $adminData['photo']; ?>" height="100" width="100" /><br><br></center>
            <b>Name:</b> <?php echo $adminData['name'] ?> <br><br>
            <b>Email:</b> <?php echo $adminData['email'] ?> <br><br>
        </div>

        <div id="CandidateManagement" class="section-box">
            <a href="manage_candidates.php"><button>Manage Candidates</button></a>
        </div>

        <div id="VoterManagement" class="section-box">
            <a href="manage_voters.php"><button>Manage Voters</button></a>
        </div>

        <form action="../api/end_voting.php" method="post">
    <button type="submit" name="end_voting">End Voting</button>
</form>

        <!-- Add more admin-specific content or functionalities here -->

    </div>

</body>

</html>

