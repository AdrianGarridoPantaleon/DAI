<?php

session_start();
$_SESSION["autentificado"]=false;

header('Location: login.html');

?>