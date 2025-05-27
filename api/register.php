<?php

include("connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$dob = $_POST['dob'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, email, password, dob, photo, role, status, votes) VALUES('$name', '$email', '$password', '$dob', '$image', '$role', 0, 0)");
    if($insert){
        echo '
    <script>
        alert("Registration Successful!");
        window.location.href="../";
    </script>
    ';
    }
    else{
        echo '
    <script>
        alert("Some error occured!");
        window.location.href="../routes/register.html";
    </script>
    ';
    }
}
else{
    echo '
    <script>
        alert("Password and Confirm Password does not match!");
        window.location.href="../routes/register.html";
    </script>
    ';
}
?>