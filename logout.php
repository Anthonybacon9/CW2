<?php 
    session_start();
    unset($_SESSION['FName1']);
    unset($_SESSION['uid']);
    header("Location:index.php");
?>