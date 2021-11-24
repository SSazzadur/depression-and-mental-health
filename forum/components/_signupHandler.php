<?php
$showError = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbConnect.php";
    $u_name = $_POST["name"];
    $u_email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //Checking the existance
    $existSql = "SELECT * FROM users WHERE u_email='$u_email'";
    $existResult = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($existResult);

    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (`u_name`, `u_email`, `u_pass`, `timestamp`) VALUES ('$u_name', '$u_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /clg-internship/forum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
    header("Location: /clg-internship/forum/index.php?signupsuccess=false&error=$showError");
}