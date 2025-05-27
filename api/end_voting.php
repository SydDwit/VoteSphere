<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION["adminData"])) {
    header("Location: login.php");
    exit();
}

// Include your database connection file
include("../api/connect.php");

// Check if the admin clicked the "End Voting" button
if (isset($_POST["end_voting"])) {
    // Update the voting status to indicate that voting has ended
    $sql = "UPDATE `user` SET `voting_status` = 0 WHERE `role` = 2";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Successful voting.";
    } else {
        echo "Error ending voting.";
    }
}
?>
