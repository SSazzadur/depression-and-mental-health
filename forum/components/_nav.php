<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "true") {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>

<header>
    <a href="/clg-internship" class="logo">College <span>INTERNSHIP</span></a>

    <div id="menu">
        <div class="line-1"></div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>

    <nav class="navbar">
        <a href="/clg-internship/">Home</a>
        <a href="/clg-internship/forum">Forum</a>
        <?php
        if ($loggedIn) echo '<a href="./components/_logoutHandler.php">Logout</a>';
        else echo '<a href="javascript:void(0)" class="modal-open">Login</a>';
        ?>


    </nav>
</header>