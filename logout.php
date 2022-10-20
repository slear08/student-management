<?php
    session_start();
    unset($_SESSION['StudentName']);
    unset($_SESSION['StudentID']);
    echo header('Location:index.php');
?>