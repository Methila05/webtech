<?php
    session_start();

    if (isset($_SESSION['userName'])) {
        session_destroy();
        header("location:LOGIN.php");
    } else {
        header("location:LOGIN.php");
    }
?>