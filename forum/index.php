<?php include './components/_dbConnect.php'; ?>

<?php
session_start();
$loggedIn = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "true") {
    $loggedIn = true;
}
?>

<?php
$showAlert = false;
$showError = false;
$alertMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $q_title = $_POST['title'];
    $q_desc = $_POST['description'];
    $u_id = $_SESSION['userid'];

    $sql = "INSERT INTO questions (`q_title`, `q_desc`, `u_id`, `timestamp`) VALUES ('$q_title', '$q_desc', '$u_id', current_timestamp()) ORDER BY a.timestamp DESC;";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $showAlert = true;
        $showError = false;
        $alertMessage = "Question added successfully!";
    } else {
        $showError = true;
        $showAlert = false;
        $alertMessage = "Error adding question!";
    }
}


if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true') {
    $showAlert = true;
    $showError = false;
    $alertMessage = "Signup successful! Please login to continue.";
} else if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'false') {
    $showError = true;
    $showAlert = false;
    $alertMessage = $_GET['error'];
}

if (isset($_GET['error'])) {
    $showError = true;
    $showAlert = false;
    $alertMessage = $_GET['error'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include './components/_user.php' ?>
    <?php include './components/_nav.php' ?>
    <section>
        <div class="alert-container">
            <?php if ($showAlert) { ?>
            <div class="alert alert-success">
                <p>
                    <?php echo $alertMessage; ?>
                </p>

                <div class="alert-close">
                    &times;
                </div>
            </div>
            <?php } else if ($showError) { ?>
            <div class="alert alert-error">
                <p>
                    <?php echo $alertMessage; ?>
                </p>

                <div class="alert-close">
                    &times;
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="search">
            <form action="./search.php">
                <input type="text" name="search" placeholder="Search" class="search-input">
                <button type="submit" class="search-button">SEARCH</button>
            </form>
        </div>

        <div class="forum-container">
            <div class="heading">
                <h1>Forum</h1>
                <div class="sub-heading">
                    <h3>Post your questions here</h3>
                </div>
            </div>

            <?php
            echo $loggedIn ? '<div class="question-form">
                    <form action="/clg-internship/forum/" method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="question-title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="question-description"></textarea>
                        </div>
                        <button type="submit" class="question-button">POST</button>
                    </form>
                </div>'
                : '<div class="not-logged-in">
                       <h1>You are not logged in. Please login to post questions!</h1>
                       <button class="modal-open">Login</button>
                   </div>';
            ?>

            <div class="questions-container">
                <h1>Browse your related questions</h1>

                <div class="questions-container">

                    <?php
                    $sql2 = "SELECT * FROM questions q LEFT JOIN users u ON q.u_id=u.u_id;";
                    $result2 = mysqli_query($conn, $sql2);
                    $noResult = true;

                    while ($row = mysqli_fetch_assoc($result2)) {
                        $noResult = false;
                        echo '<div class="question">
                                <div class="img-container">
                                    <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                                        alt="userlogo" width="65px">
                                </div>
                                <div class="question-content">
                                    <a href="./question.php?q_id=' . $row["q_id"] . '">
                                        <h3>' . $row["q_title"] . '</h3>
                                        <p>' . $row["q_desc"] . '</p>

                                        <div class="question-footer">
                                            <p>Asked by <span>' . $row['u_name'] . '</span></p>
                                        </div>
                                    </a>
                                </div>  
                              </div>';
                    }

                    if ($noResult) {
                        echo '<div class="no-result">
                                <h1>There is no questions here.</h1>
                                <p>
                                    <b>Be the first person to ask a question!</b>
                                </p>
                              </div>';
                    }

                    ?>

                </div>
            </div>
    </section>

    <?php include './components/_footer.php' ?>

    <script src="../assets/js/app.js"></script>
</body>

</html>