<?php
    session_start();

    if ($_SESSION["autentificado"] != 1)
    {
        header('Location: http://localhost/Practica2/login.html');
    }
?>