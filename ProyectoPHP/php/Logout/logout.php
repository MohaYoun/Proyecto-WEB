<?php
session_destroy();
header("Location: ../Login/Login.php");
$_SESSION = array();
exit();