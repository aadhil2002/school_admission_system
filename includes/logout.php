<?php
session_start();
session_destroy();
header('location:../Guest/home.php');
?>