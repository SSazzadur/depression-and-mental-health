<?php session_start(); ?>
<?php include './components/_dbConnect.php'; ?>

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

            <div class="questions-container">
                <h1 style="border:none">Search result for <em>"<?php echo $_GET["search"]; ?>"</em></h1>

                <div class="questions-container">
                    <?php
                    $search = $_GET["search"];

                    $sql = "SELECT * FROM questions WHERE MATCH(`q_title`, `q_desc`) AGAINST('$search');";
                    $result = mysqli_query($conn, $sql);
                    $noResult = true;

                    while ($row = mysqli_fetch_assoc($result)) {
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