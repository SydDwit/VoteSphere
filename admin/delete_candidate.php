<?php
session_start();

// if (!isset($_SESSION["adminData"])) {
//     header("Location: login.php");
// }

// Include your database connection file
include("../api/connect.php");

if (isset($_POST['delete_btn'])) {
    $candidateId = $_POST['candidate_id'];

    // Perform the deletion
    $deleteQuery = mysqli_query($connect, "DELETE FROM user WHERE id = $candidateId");

    if ($deleteQuery) {
        echo '<script>alert("Candidate deleted successfully."); window.location.href="manage_candidates.php";</script>';
    } else {
        echo '<script>alert("Error deleting candidate."); window.location.href="manage_candidates.php";</script>';
    }
} else {
    header("Location: manage_candidates.php");
}
?>
