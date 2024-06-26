<?php
include '../includes/connect.php';
  if (isset($_POST['register'])) {
    $name = '';
    $email = '';
    $birthdate = '';
    $age = '';
    $admission_type = '';
    $password = '';
    $confirmpassword = '';
    $_SESSION['message'] = '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $admission_type = $_POST['admission_type'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $encpassword = md5($password);
    if ($password != $confirmpassword) {
      $_SESSION['message'] = "Passwords do not match!";
      $_SESSION['status'] = "warning";
    } else {
      $s = "SELECT * FROM tbl_student WHERE email = '$email'";
      $s1 = "SELECT * FROM tbl_admin WHERE admin_email = '$email'";
      $result = mysqli_query($conn, $s);
      $num = mysqli_num_rows($result);
      $result1 = mysqli_query($conn, $s1);
      $num1 = mysqli_num_rows($result1);
      session_start();
      if ($num == 1 || $num1 == 1) {
        $_SESSION['message'] = "Email Already Taken";
        $_SESSION['status'] = "error";
        $_SESSION['location'] = "login.php";
      } else {
        $reg = "INSERT INTO `tbl_student`(`email`,`stud_name`,`birthdate`,`age`,`admission_type`,`password`) VALUES('$email','$name','$birthdate','$age','$admission_type','$encpassword')";
        $result = mysqli_query($conn, $reg);
        $_SESSION['message'] = "Registration Successfull";
        $_SESSION['status'] = "success";
        $_SESSION['location'] = "login.php";
      }
    }
  }
?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="../css/register.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>" ?>
    <link rel="shortcut icon" type="image/x-icon" href="../images/Arafalogo.ico">
    <style>
      .bg-img::after {
        top: 352px;
      }
      .content {
        top: 800px;
      }
    </style>
  </head>

  <body>
    <?php include '../includes/header_home.php'; ?>
    <div class="bg-img">
      <div class="content">
        <header>Registration Form</header>
        <form action="" method="POST">
          <div class="field space">
            <i class="fa fa-user"></i>
            <input type="text" name="name" placeholder="Name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required>
          </div>
          <div class="field space">
            <i class="fa fa-envelope"></i>
            <input type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Valid Email Id" required>
          </div>
          <div class="field space">
            <i class="fa fa-calendar"></i>
            <input type="date" name="birthdate" id="DOB" maxlength="10" onkeyup="ageCalculator();" onblur="ageCalculator();">
          </div>

          <div class="field space">
            <i class="fa fa-birthday-cake"></i>
            <input type="text" name="age" id="age" placeholder="Age" readonly>
          </div>
          <div class="field space">
            <i class="fa fa-university"></i>
            <select name="admission_type" required>
              <option value="">Select Admission Type</option>
              <option value="KG">KG (LKG-UKG)</option>
              <option value="Primary">Primary (1-4)</option>
              <option value="Middle">Middle (5-8)</option>
              <option value="Secondary">Secondary (9-10)</option>
            </select>
          </div>
          <div class="field space">
            <i class="fa fa-lock"></i>
            <input type="password" class="password" placeholder="Password" id="psw" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least one number,one uppercase letter,one lowercase letter,one special character,and at least 8 or more characters" required>
          </div>
          <div class="field space">
            <i class="fa fa-eye"></i>
            <input type="password" class="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            <i class="confirmshow">SHOW</i>
          </div>
          <div class="field space">
            <input type="submit" name="register" value="REGISTER">
          </div>
          <div class="register">Have an account? <a href="login.php">Login Now</a></div>


        </form>
      </div>
    </div>
    <?php include '../includes/footer_log.php' ?>



    <script>
      const confirmpass_field = document.querySelector('.confirmpassword');
      const confirmshow_btn = document.querySelector('.confirmshow');
      confirmshow_btn.addEventListener('click', function() {
        if (confirmpass_field.type === "password") {
          confirmpass_field.type = "text";
          confirmshow_btn.style.color = "#3498db";
          confirmshow_btn.textContent = "HIDE";
        } else {
          confirmpass_field.type = "password";
          confirmshow_btn.style.color = "#222";
          confirmshow_btn.textContent = "SHOW";
        }
      });
    </script>
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
    <?php include '../includes/redirect.php'; ?>
  </body>

  </html>


    <script>
            const h1 = document.querySelector("#admission");
            h1.style.backgroundColor = "#a6a8a6";
        </script>