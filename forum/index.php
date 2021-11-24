<?php
session_start();
$loggedIn = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "true") {
    $loggedIn = true;
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
                            <textarea name="content" id="description" class="question-description"></textarea>
                        </div>
                        <input type="text" value="1" hidden>
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
                    <div class="question">
                        <div class="img-container">
                            <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                                alt="userlogo" width="65px">
                        </div>
                        <div class="question-content">
                            <a href="./question.php">
                                <h3>How to install PHP on Ubuntu?</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>

                                <div class="question-footer">
                                    <p>Asked by <span>John Doe</span></p>
                                    <p>2 Answers</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="question">
                        <div class="img-container">
                            <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                                alt="userlogo" width="65px">
                        </div>
                        <div class="question-content">
                            <a href="#">
                                <h3>How to install PHP on Ubuntu?</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>

                                <div class="question-footer">
                                    <p>Asked by <span>John Doe</span></p>
                                    <p>2 Answers</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <?php include './components/_footer.php' ?>

    <script src="../assets/js/app.js"></script>
</body>

</html>