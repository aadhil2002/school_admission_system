<?php
session_start();
$title = "";
$link = "";
$photo = "";
$location = "";
$email =$_SESSION["email"];


include '../includes/connect.php';
 include '../includes/config.php';

    $status = mysqli_query($conn, "SELECT payment_status FROM tbl_student WHERE email = '$email'");
	$status1 = mysqli_query($conn, "SELECT upload_cstatus FROM tbl_student WHERE email = '$email'");
	$status2 = mysqli_query($conn, "SELECT cstatus FROM tbl_family WHERE email = '$email'");
    $status3 = mysqli_query($conn,"SELECT stud_cstatus FROM tbl_student WHERE email = '$email'" );
    $s=mysqli_fetch_assoc($status);
    $s1=mysqli_fetch_assoc($status1);
    $s2=mysqli_fetch_assoc($status2);
    $s3=mysqli_fetch_assoc($status3);
	if($s['payment_status']==1)
	{
		$title = "Application Completed";
        $link = "";
		$photo= "../images/complete.jpg?v=<?= $version ?>";
        $iclass="";

	}
    elseif($s1['upload_cstatus']==1)
   {
	$title = "Payment Details";
        $link = "Complete your payment";
		$photo= "../images/payment.png?v=<?= $version ?>";
        $iclass="fa fa-arrow-right";
        $location="payment.php";
   }
   elseif($s2['cstatus']==1)
   {
	$title = "Upload Details";
        $link = "Complete your upload application";
		$photo= "../images/upload.jpg?v=<?= $version ?>";
        $iclass="fa fa-arrow-right";
        $location="kg_upload_details.php";
   }
   elseif($s3['stud_cstatus']==1)
   {
	$title = "Family Details";
$link = "Complete your family application";
$photo= "../images/kg_family.jpg?v=<?= $version ?>";
$iclass="fa fa-arrow-right";
$location="kg_family_details.php";
   }
   else
   {
	$title = "Students Details";
$link = "Complete your application";
$photo= "../images/kg_student.jpg?v=<?= $version ?>";
$iclass="fa fa-arrow-right";
$location="kg_student_details.php";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include 'header.php'; ?>
<div class="row">
    <div class="col-sm-3">
        <div class="card  text-dark">
            <img src="<?php print $photo ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h3 class="card-title"><?php print $title ?></h3>

                <a href="<?php print $location ?>"><?php print $link ?> <i class="<?php echo $iclass ?>"></i></a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-dark">
            <img src="../images/edit.png?v=<?= $version ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h3 class="card-title">Admission Application</h3>
                <a href="kg_edit.php" style="margin-left:10px ;">Edit <i class="fa fa-edit"></i></a>
                <a href="rejectadmission.php" style="margin-left:30px ;">Cancel <i class="fa fa-close"></i></a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-dark">
            <img src="../images/status.png?v=<?= $version ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h3 class="card-title">Admission Status</h3>

                <a href="admission_status.php">Check your Admission Status</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card  text-dark">
            <img src="../images/complaint.png?v=<?= $version ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h3 class="card-title">Your Complaint</h3>
                <a href="complaint.php" style="margin-left:10px ;">New Complaint <i class="fa fa-edit"></i></a>
                <a href="complaint_view.php" style="margin-left:30px ;"> View <i class="fa fa-eye"></i></a>
            </div>
        </div>
    </div>

</div>
<div class="row">
    
    <div class="col-sm-3">
        <div class="card text-dark">
            <img src="../images/feedback.png?v=<?= $version ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h3 class="card-title">Your Valuable Feedback</h3>
                <a href="feedback.php" style="margin-left:10px ;">Feedback <i class="fa fa-edit"></i></a>
               
        </div>
    </div>
</div>
</div>
<?php include('../includes/footer.php'); ?>  
</body>
</html>
