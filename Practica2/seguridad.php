<?php
    session_start();

    $user = $_POST['user'];
    $pass = $_POST['password'];

    echo "USER: $user  YYYY PASS: $pass";
    if ($user == "admin" && $pass == "1234")
    {
        $_SESSION["autentificado"] = true;
        header('Location: home.php');
    }else
    {
        $_SESSION["autentificado"] = 2;
        header('Location: login.html');
        exit();
    }
?>