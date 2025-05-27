<?php
session_start();

// if (!isset($_SESSION["adminData"])) {
//     header("Location: login.php");
// }

// Include your database connection file
include("../api/connect.php");

if (isset($_POST['delete_btn'])) {
    $voterId = $_POST['voter_id'];

    // Perform the deletion
    $deleteQuery = mysqli_query($connect, "DELETE FROM user WHERE id = $voterId");

    if ($deleteQuery) {
        echo '<script>alert("Voter deleted successfully."); window.location.href="manage_voters.php";</script>';
    } else {
        echo '<script>alert("Error deleting voter."); window.location.href="manage_voters.php";</script>';
    }
} else {
    header("Location: manage_voters.php");
}
?>
