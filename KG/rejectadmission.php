<?php
session_start();
$email = $_SESSION["email"];
$type = $_SESSION["admission_type"];
include '../includes/connect.php';
$SELECTquery = mysqli_query($conn, "SELECT admission_fee FROM `tbl_amount` WHERE admission_type='$type'");
$am=mysqli_fetch_assoc($SELECTquery);
$amount=$am['admission_fee'];
    if(isset($_POST['cancel']))
    {
        $SelectQry=mysqli_query($conn,"SELECT `admission_status` FROM `tbl_student` WHERE email='".$email."'");
        $admission=mysqli_fetch_assoc($SelectQry);
        $admission_status=$admission['admission_status'];
        if($admission_status==1)
        {
            $Qry=mysqli_query($conn,"SELECT `class` FROM `tbl_student` WHERE email='".$email."'");
        $class=mysqli_fetch_assoc($Qry);
        $class_kg=$class['class'];
            $query=mysqli_query($conn,"SELECT `aval_count`FROM `tbl_class_count` WHERE class='".$class_kg."'");
$count=mysqli_fetch_assoc($query);
$c=$count['aval_count'];
$c=$c+1;
mysqli_query($conn,"UPDATE `tbl_class_count` SET `aval_count`='".$c."' WHERE class='".$class_kg."'");
        }
            $UpdateQry="UPDATE `tbl_student` SET `admission_status`='3' WHERE email='".$email."'";
            if(mysqli_query($conn,$UpdateQry))
            {
            $_SESSION['message'] = "Admission Cancelled!";
                    $_SESSION['status'] = "success";
                    $_SESSION['location'] = "dashboard.php";	
            }
    }
    ?>
    <!DOCTYPE HTML>
<html>

<head></head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<?php include '../includes/config.php' ?>


<link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
<link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
</head>

<body>
<?php include 'header.php'; 
        ?>
        <h1><center>ADMISSION CANCELLATION</center></h1>
        <hr><center>Please read the below terms and conditions before cancelling your admission</center><hr>
        <center>
        <table>
            <tr>
                <th>Cancellations</th>
                <th>Refund Amount</th>
            </tr>
            <tr>
                <td>Made by the School(100% Refund)</td>
                <td><?php echo $amount; ?></td>
            </tr>
            <tr>
                <td>Made before 10 days of School Opening (50% Refund)</td>
                <td><?php echo $amount/2; ?></td>
            </tr>
            <tr>
                <td>Made between 10-0 days of School Opening (0% Refund)</td>
                <td><?php echo 0; ?></td>
            </tr>
            
        </table>
        </center>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="checkbox" required style="margin-left:40%;margin-top:2%"> I agree to the above Terms & Conditions<br>
                   <input type="submit" class="btn btn-danger" name="cancel" value="CANCEL YOUR ADMISSION" style="margin-left:40%;margin-top:1%">
                </form>
                <?php include '../includes/redirect.php';
                include '../includes/footer.php';?>
</body>
</html>
    