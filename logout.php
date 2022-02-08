<?php
session_start();
unset($_SESSION['username']);
header('location:http://localhost/BIT/login.html');
?>