<?php
session_start();
include '../includes/connect.php';
$email =$_SESSION["email"];
$er=0;
$s1 = "SELECT * FROM tbl_student WHERE email = '$email'";
$status = mysqli_query($conn, $s1);
$row=mysqli_fetch_assoc($status);
$name = $row['stud_name'];
$birthdate = $row['birthdate'];
$age= $row['age'];
$admission_type=$row['admission_type'];

if(isset($_POST['update']))
{
    
    $stud_name=$_POST['stud_name'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $stud_type=$_POST['stud_type'];
    if($er==0)
    {
        if($admission_type!=$stud_type)
        {
            mysqli_query($conn,"DELETE FROM `tbl_primary WHERE email='$email'" ); 
            mysqli_query($conn,"DELETE FROM `tbl_family` WHERE email='$email'" );
            mysqli_query($conn,"DELETE FROM `tbl_guardian` WHERE email='$email'" ); 
            mysqli_query($conn,"DELETE FROM `tbl_sibling` WHERE email='$email'" );  
            mysqli_query($conn,"DELETE FROM `tbl_complaint` WHERE email='$email'" ); 
            mysqli_query($conn,"DELETE FROM `tbl_feedback` WHERE email='$email'" );  
        }
        $query = mysqli_query($conn,"UPDATE `tbl_student` SET `stud_name`='$stud_name',`birthdate`='$dob',`age`='$age',`admission_type`='$stud_type',`stud_cstatus`= 0,`upload_cstatus`= 0,`payment_status`= 0 ,`admission_status`= 0 WHERE email='$email'" );

        if ($query) {

            $_SESSION['message'] = "Profile Updated Successfully!";
            $_SESSION['status'] = "success";
            if($admission_type!=$stud_type)
            {
            $_SESSION['location'] = "../includes/logout.php";
            }
        }
}
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
    height: 100%;
    width: 100%;
    background-size: cover;
    background-position: center;
}

.bg-img::after {
    position: absolute;
    content: '';
    top: 355px;
    height: 97%;
    width: 85%;
    background-color: rgba(0, 0, 0, 0.7);
}

.content {
    position: absolute;
    top: 811px;
    left: 55%;
    width: 1000px;
    transform: translate(-50%, -50%);
    z-index: 1;
    padding: 100px;
    background-color: rgba(255, 255, 255, 0.04);
    box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);

}
.content header {
    text-align: center;
    color: white;
    font-size: 33px;
    font-weight: 600;
    margin-bottom: 35px;
    font-family: 'Montserrat', sans-serif;

}
label{
    color:white;
    font-weight: 100;
    margin-top: 10px;
}
span.error{
    margin-left: 30px;
    font-size: 16px;
    color: #ff0400;
    background-color: rgba(244, 0, 0, 0.278);
}

input[type="submit"]{
    background-position: relative;
    border: none;
    color: #fff;
    padding: 10px 50px;
    outline: none;
    margin-left: 35%;
    margin-top: 5%;
}
    </style>
</head>
<body>
<?php include 'header.php' ?>
 <div class="bg-img">
      <div class="content">
      <header>Profile Edit</header>
<form action="" method='POST'>
    <label for="stud_name">NAME</label>
<input type="text" name='stud_name' class="form-control" value="<?php echo $name;?>">
<label for="dob">DATE OF BIRTH</label><span id=error class="error"></span>
   <input  name="dob"  type="date" class="form-control" id="DOB" required='true' value="<?php echo $birthdate;?>" onclick="ageCalculator();">
   <label for="age">AGE</label>
   <input type="text" class="form-control" name="age" id="age" value="<?php echo $age;?>" readonly>
   <label for="stud_type">ADMISSION TYPE</label>
<select name='stud_type' id="stud_type" class="form-control white_bg">
<option value="<?php echo $admission_type;?>"><?php echo $admission_type;?></option>
 <?php $query=mysqli_query($conn,"SELECT admission_type FROM tbl_option WHERE admission_type!='$admission_type'");
         while($row1=mysqli_fetch_array($query))
         {
         ?>    
         <option value="<?php echo $row1['admission_type'];?>"><?php echo $row1['admission_type'];?></option>
             <?php } ?>  
</select>
<input type="submit" class="btn btn-success" name="update" value="Update">
</form>
         </div>
         </div>
        <script src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
            function ageCalculator() {
                var userinput = document.getElementById("DOB").value;
                var dob = new Date(userinput);
                var month_diff = Date.now() - dob.getTime();
                var age_dt = new Date(month_diff);
                var year = age_dt.getUTCFullYear();
                var age = year - 1970;
                if(age<0){
                 document.getElementById("error").innerHTML = "Please Select a Valid Date";
                 document.getElementById("age").value = 0;
                 <?php $er++;?>
                }
                else
                {
                document.getElementById("age").value = age;
                }
            }
        </script>
<?php include '../includes/redirect.php';
 include '../includes/footer.php';?>
</body>
</html>
