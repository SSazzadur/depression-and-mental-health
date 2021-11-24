<?php
session_start();
session_unset();
session_destroy();

header("Location: /clg-internship/forum/index.php");
exit();