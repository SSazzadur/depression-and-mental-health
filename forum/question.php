<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "true") {
    $loggedIn = true;
} else {
    $loggedIn = false;
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
        <div class="question-viewer">
            <h1>Question Title</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic ipsam itaque repellat voluptas deserunt at
                libero quidem, a id ab harum recusandae vel magnam nisi nesciunt doloremque sapiente quam fugit.</p>
            <p class="user">
                Asked By: <span>User Name</span>
            </p>
        </div>
        <?php
        echo $loggedIn ? '<div class="answer-form">
                            <form action="/clg-internship/forum/question.php" method="POST">
                                <div class="form-group">
                                    <label for="description"> Write Your Answer</label>
                                    <textarea name="content" id="description" class="answer-description"></textarea>
                                </div>
                                <input type="text" value="1" hidden>
                                <button type="submit" class="answer-button">POST</button>
                            </form>
                          </div>'
            : '<div class="not-logged-in">
                    <h1>You are not logged in. Please login to post questions!</h1>
                    <button class="modal-open">Login</button>
                </div>'
        ?>



        <div class="answers-container">
            <h1>Answers to the question</h1>

            <div class="answer">
                <div class="img-container">
                    <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                        alt="userlogo" width="65px">
                </div>
                <div class="answer-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>

                    <div class="answer-footer">
                        <p>Answered by <span>John Doe</span></p>
                    </div>
                </div>
            </div>
            <div class="answer">
                <div class="img-container">
                    <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/v_collection_png/512x512/shadow/user_generic_green.png"
                        alt="userlogo" width="65px">
                </div>
                <div class="answer-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>

                    <div class="answer-footer">
                        <p>Answered by <span>John Doe</span></p>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <?php include './components/_footer.php' ?>

    <script src="../assets/js/app.js"></script>
</body>

</html>