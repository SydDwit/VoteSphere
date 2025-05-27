<?php
session_start();
include("connect.php");

$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect, "SELECT * FROM user WHERE name='$name' AND password='$password' AND role='$role'");

if (mysqli_num_rows($check) > 0) {
    $userdata = mysqli_fetch_array($check);

    if ($role == '1') {
        // Redirect admin to admin_dashboard.php
        $_SESSION['adminData'] = $userdata;
        echo '<script>window.location.href="../admin/admin_dashboard.php";</script>';
    } else {
        // Redirect other users to user-dashboard.php
        $candidates = mysqli_query($connect, "SELECT * FROM user WHERE role=3");
        $candidatesdata = mysqli_fetch_all($candidates, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['candidatesdata'] = $candidatesdata;

        echo '<script>window.location.href="../routes/dashboard.php";</script>';
    }
} else {
    echo '<script>alert("Invalid Credentials or User not found!"); window.location.href="../";</script>';
}
?>
