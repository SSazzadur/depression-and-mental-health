<?php
$showError = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbConnect.php";
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE u_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["u_pass"])) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["userEmail"] = $email;
            $_SESSION["userid"] = $row["u_id"];
            $_SESSION["userName"] = $row["u_name"];
            $_SESSION["userRole"] = $row["u_role"];

            header("Location: /clg-internship/forum/index.php");
            exit();
        } else {
            echo $showError = "Invalid Credentials!";
        }
    } else {
        echo $showError = "Invalid Credentials!";
    }
    header("Location: /clg-internship/forum/index.php?error=$showError");
}
