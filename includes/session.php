<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['admin_uname']) || (trim($_SESSION['admin_uname']) == '')) {
    header("location: home.php");
    exit();
}
$session_id=$_SESSION['admin_uname'];

?>