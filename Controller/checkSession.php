<?php
    session_start();
    if (!isset($_SESSION['userData'])){
        header("Location:  http://localhost/QuizBackEnd/login.php");
    }
