<?php
include '../includes/connect.php';
session_start();

$type=$_SESSION["admission_type"];
$complaint = "";

$_SESSION['message'] = "";
$_SESSION['status'] = "";
$_SESSION['location'] = "";

if (isset($_POST['submit'])) {

  $complainer_name = $_POST['name'];
  $complainer_email = $_POST['email'];

  $complaint = $_POST['complaint'];
  $er = 0;

  if ($complaint == "") {
    $er++;
    $_SESSION['message'] = "Please Enter Your Complaint";
    $_SESSION['status'] = "error";
  } else {
    $complaint = test_input($complaint);
  }
  if ($er == 0) {

    $sql = 'INSERT INTO `tbl_complaint`( `name`, `email`, `type`, `complaint`) VALUES (
    "' . mysqli_real_escape_string($conn, $complainer_name) . '", 
    "' . mysqli_real_escape_string($conn, $complainer_email) . '",
    "' . mysqli_real_escape_string($conn, $type) . '",
    "' . mysqli_real_escape_string($conn, $complaint) . '"
)';

    $query = mysqli_query($conn, $sql);

    if ($query) {

      $_SESSION['message'] = "Complaint Sent Successfully!";
      $_SESSION['status'] = "success";
      $_SESSION['location'] = "dashboard.php";
      $stud_name = "";
      $email = "";
      $birthdate = "";
      $age = "";
      $gender = "";
      $placeofbirth = "";
      $religion = "";
      $caste = "";
      $address = "";
      $nationality = "";
      $state = "";
      $district = "";
      $city = "";
      $pincode = "";
      $contact = "";
    } else {
      print '<span class= "errorMessage">' . mysqli_error($conn) . '</span>';
    }
  } else {

    $_SESSION['message'] = "Please fill all the required fields correctly.";
    $_SESSION['status'] = "error";
  }
}


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE HTML>
<html>

<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php include '../includes/config.php' ?>
  <link rel="stylesheet" href="../css/complaint.css?v=<?= $version ?>" type='text/css' />

</head>

<body>

  <?php include('header.php'); ?>




  <div class="bg-img">
    <div class="content">
      <h1 class="agile_head text-center">Complaint Form</h1>
      <form id="fs-frm" name="complaint-form" accept-charset="utf-8" action="" method="post">
        <fieldset id="fs-frm-inputs">
          <div class="field space">
            <input type="text" name="name" id="full-name" placeholder="Name" value="<?php echo $_SESSION["name"];  ?>"readonly>
          </div>
          <div class="field space">
            <input type="text" name="email" id="email-address" placeholder="Email" value="<?php echo $_SESSION["email"];  ?>"readonly>
</div>
          <div class="space">
            <textarea rows="6" name="complaint" id="complaint" placeholder="Complaint" required=""></textarea>
          </div>

        </fieldset>

        <input type="submit" name="submit" value="File Complaint">



      </form>
    </div>
   
  </div>
  <?php 
  include '../includes/redirect.php';
  include('../includes/footer.php'); ?>
  </div>
  </div>


</body>

</html>