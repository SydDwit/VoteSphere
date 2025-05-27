<?php
// Include your database connection file
include("../api/connect.php");

// Select the candidate with the highest votes
$sql = "SELECT * FROM `user` WHERE `role` = 3 ORDER BY `votes` DESC LIMIT 1";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $winner = mysqli_fetch_assoc($result);
    echo "The winner is: " . $winner['name'];
} else {
    echo "No winner found.";
}
?>
