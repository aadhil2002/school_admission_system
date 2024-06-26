<?php
session_start();
$email=$_SESSION["email"];
include '../includes/connect.php';
$s = "SELECT payment_status FROM tbl_student WHERE email = '$email'";
$s1 = "SELECT admission_status FROM tbl_student WHERE email = '$email'";
$status = mysqli_query($conn, $s);
$status1 = mysqli_query($conn, $s1);
$row=mysqli_fetch_assoc($status);
$row1=mysqli_fetch_assoc($status1);
if($row['payment_status']==0)
{
    $message="COMPLETE YOUR APPLICATION FORM TO SEE YOUR ADMISSION STATUS";
    $bg_color="rgba(0, 159, 255, 0.6)";
}
elseif($row1['admission_status']==0)
{
    $message="YOUR ADMISSION IS UNDER PROCESS";
    $bg_color="rgba(255, 255, 93, 0.6)";
    
}
elseif($row1['admission_status']==1)
{
    $message="YOUR ADMISSION IS APPROVED";
    $bg_color="rgba(0, 255, 104, 0.6)";
}
elseif($row1['admission_status']==2)
{
    $message="YOUR ADMISSION IS REJECTED";
    $bg_color="rgba(255, 0, 0, 0.6)";
}
elseif($row1['admission_status']==3)
{
    $message="APPLICATION IS CANCELLED BY YOU";
    $bg_color="rgba(255, 0, 0, 0.6)";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .bg-img {
    background: url('../images/banner1.jpg');
    height: 100vh;
    width: 100%;
    background-size: cover;
    background-position: center;
}

.bg-img::after {
    position: absolute;
    content: '';
    left: 14%;
    height: 100%;
    width: 85.5%;
    background-color: rgba(0, 0, 0, 0.7);
}
    .content {
    position: absolute;
    top: 81%;
    left: 56%;
    width: 1000px;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 999;
    padding: 100px;
    box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);

}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="bg-img">
<div class="content" style="background-color:<?php echo $bg_color; ?>;color:white;"><h1><?php echo $message; ?></h1>
</div>
</div>
<?php include('../includes/footer.php'); ?> 
</body>
</html>
