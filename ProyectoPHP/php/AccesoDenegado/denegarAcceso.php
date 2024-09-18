<?php
if (!isset($_SESSION['usuario']) || $_SESSION['login'] != true) {
    header("Location: ../Login/Login.php");
    exit();
}
