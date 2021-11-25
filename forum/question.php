<?php include './components/_dbConnect.php' ?>

<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "true") {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>

<?php
$showAlert = false;
$showError = false;
$alertMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $answer = $_POST['answer'];
    $q_id = $_GET['q_id'];
    $u_id = $_SESSION['userid'];

    $sql = "INSERT INTO answers (`answer`, `q_id`, `u_id`, `timestamp`) VALUES ('$answer', '$q_id', '$u_id', current_timestamp());";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $showAlert = true;
        $showError = false;
        $alertMessage = "Answer submitted successfully!";
    } else {
        $showError = true;
        $showAlert = false;
        $alertMessage = "Error submitting answer!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
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
        <div class="question-viewer">
            <?php
            $q_id = $_GET["q_id"];
            $sql = "SELECT * FROM questions q LEFT JOIN users u ON q.u_id=u.u_id WHERE q.q_id='$q_id';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $q_title = $row['q_title'];
            $q_desc = $row['q_desc'];
            $u_name = $row['u_name'];

            echo "<h1>$q_title</h1>";
            echo "<p>$q_desc</p>";
            echo '<p class="user">
                    Asked By: <span>' . $u_name . '</span>
                 </p>';
            echo "</div>";
            ?>
            <?php
            echo $loggedIn ? '<div class="answer-form">
                            <form action="/clg-internship/forum/question.php?q_id=' . $q_id . '" method="POST">
                                <div class="form-group">
                                    <label for="answer"> Write Your Answer</label>
                                    <textarea name="answer" id="answer" class="answer-description"></textarea>
                                </div>
                                <button type="submit" class="answer-button">POST</button>
                            </form>
                          </div>'
                : '<div class="not-logged-in">
                    <h1>You are not logged in. Please login to post questions!</h1>
                    <button class="modal-open">Login</button>
                </div>'
            ?>

            <div class="answers-container">
                <h1>Answers of the question</h1>
                <?php
                $q_id = $_GET['q_id'];

                $sql = "SELECT * FROM answers a LEFT JOIN users u ON a.u_id=u.u_id WHERE a.q_id='$q_id' ORDER BY a.timestamp DESC;";
                $result = mysqli_query($conn, $sql);
                $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;
                    $answer = $row['answer'];
                    $u_name = $row['u_name'];

                    echo '<div class="answer">
                            <div class="img-container">
                                <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                                    alt="userlogo" width="65px">
                            </div>
                            <div class="answer-content">
                                <p>' . $answer . '</p>

                                <div class="answer-footer">
                                    <p>Answered by <span>' . $u_name . '</span></p>
                                </div>
                            </div>
                        </div>';
                }
                if ($noResult) {
                    echo '<div class="no-result">
                            <h1>No answers yet!</h1>
                            <p>Be the first to answer this question!</p>
                        </div>';
                }
                ?>
            </div>

    </section>


    <?php include './components/_footer.php' ?>

    <script src="../assets/js/app.js"></script>
</body>

</html>