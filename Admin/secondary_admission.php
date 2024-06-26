<?php
session_start();
include '../includes/connect.php';
if(isset($_GET["accept"]))
{
$class=$_GET["class"];
$email=$_GET["accept"];
$query=mysqli_query($conn,"SELECT `aval_count`FROM `tbl_class_count` WHERE class='".$class."'");
$count=mysqli_fetch_assoc($query);
$c=$count['aval_count'];
if($c>0)
{
$UpdateQry="UPDATE `tbl_student` SET `admission_status`='1' WHERE email='".$email."'";
mysqli_query($conn,$UpdateQry);
$c=$c-1;
mysqli_query($conn,"UPDATE `tbl_class_count` SET `aval_count`='".$c."' WHERE class='".$class."'");
}
else{
	$UpdateQry="UPDATE `tbl_student` SET `admission_status`='2' WHERE email='".$email."'";
	mysqli_query($conn,$UpdateQry);	
}
}
elseif(isset($_GET["reject"]))
{
	$email=$_GET["reject"];
	$UpdateQry="UPDATE `tbl_student` SET `admission_status`='2' WHERE email='".$email."'";
	mysqli_query($conn,$UpdateQry);
}
$i = 1;
$query = mysqli_query($conn,  "SELECT stud_name,birthdate,age,email,contact,class FROM tbl_student WHERE `payment_status`='1' AND `admission_type`='Secondary' ORDER BY  admission_status ASC");
?>
<!DOCTYPE HTML>
<html>

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include 'includes/config.php'; ?>
	<link href="css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />
	<link href="../css/studentcss.css?v=<?= $version ?>" rel="stylesheet" type="text/css" media="all" />
	<style>
		.footer {
			color: whitesmoke;
			position: fixed;
			bottom: 0;
			margin-left: 30%;
		}
		th{
			font-weight: 900;
			color:black;
		}
	</style>
</head>


	<?php include 'includes/header.php'; ?>
<table class="table table-bordered table-striped">
			<tbody>
				<tr>
<div class="section-title">
SECONDARY ADMISSION
</div>
                </tr>
				<tr>
					<th>SI.No</th>
					<th>Student's Name</th>
					<th>Student's Email</th>
					<th>Student's DOB</th>
					<th>Student's Age</th>
					<th>Student's Phone no:</th>
                    <th>Student's Class</th>
                    <th>Action</th>
					<th>View</th>
				</tr>
				<?php
				if (mysqli_num_rows($query) > 0) {
					while ($row = mysqli_fetch_array($query)) {

				?>
						<tr>
							<td><?php echo $i;
								$i++; ?></td>
							<td><?php echo $row['stud_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['birthdate']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php
							 $email=$row['email']; 
							 $Qry= mysqli_query($conn, "SELECT `admission_status` FROM `tbl_student` WHERE `email`='".$email."'");
							 $r=mysqli_fetch_assoc($Qry);
							 if($r['admission_status']==0)
							 {
								?>
							<a href="secondary_admission.php?accept=<?php echo $row["email"];?>&class=<?php echo $row['class']; ?>"> <button class="btn btn-success">ACCEPT</button> </a><a href="secondary_admission.php?reject=<?php echo $row["email"];?>"> <button class="btn btn-danger">REJECT </button></a></td>
                          <?php   
						}
						else if($r['admission_status']==1)
						{
						   ?>
					   <h5 class="approved">ADMISSION APPROVED</h5></td>
					 <?php   
				   }
				   else if($r['admission_status']==2)
						{
						   ?>
					   <h5 class="rejected">ADMISSION REJECTED</h5></td>
					 <?php   
				   }
				   else if($r['admission_status']==3)
				   {
					  ?>
				 <h5 class="rejected">ADMISSION REJECTED BY STUDENT</h5></td>
				<?php   
			  }
				   ?>
						<td><a href="secondary_view.php?email=<?php echo $row["email"];?>"><button class="btn btn-info">VIEW</button> </a></td>
						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>



	</div>
	<div class="footer">
	<?php include 'includes/footer.php'; ?>
	</div>

</body>


</html>