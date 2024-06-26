<?php
session_start();
$stud_email = $_SESSION["email"];
$estudent_photo = "";
$efather_photo = "";
$emother_photo = "";
$ebirth_certificate = "";
$ewellness_certificate="";
$etransfer_certificate="";
$eaadhaar = "";

$stud_img_name = "";
$father_img_name = "";
$mother_img_name = "";
$birth_img_name = "";
$wellness_img_name="";
$transfer_img_name = "";
$aadhaar_img_name = "";
$er = 0;
$extensions = array("jpeg", "jpg", "JPEG", "JPG");
$extensions_pdf = array("pdf","PDF");
if (isset($_POST['submit'])) {
    $stud_img_name = $_FILES['stud_photo']['name'];
    $stud_img_loc = $_FILES['stud_photo']['tmp_name'];
    $stud_img_ext = pathinfo($stud_img_name, PATHINFO_EXTENSION);
    $stud_img_size = $_FILES['stud_photo']['size'] / (1024 * 1024);
    if (is_uploaded_file($stud_img_loc) == 0) {
        $er++;
        $estudent_photo = "*Please upload an image";
    } else if (in_array($stud_img_ext, $extensions) === false) {
        $er++;
        $estudent_photo = "*Extension is not valid";
    } else if (($stud_img_size > 2)) {
        $er++;
        $estudent_photo = "*Size is Greater than 2MB";
    } else {
        $stud_img_path = "Uploaded Images\Student Photo/" . $stud_img_name;
    }


    $father_img_name = $_FILES['father_photo']['name'];
    $father_img_loc = $_FILES['father_photo']['tmp_name'];
    $father_img_ext = pathinfo($father_img_name, PATHINFO_EXTENSION);
    $father_img_size = $_FILES['father_photo']['size'] / (1024 * 1024);
    if (is_uploaded_file($father_img_loc) == 0) {
        $er++;
        $efather_photo = "*Please upload an image";
    } else if (in_array($father_img_ext, $extensions) === false) {
        $er++;
        $efather_photo = "*Extension is not valid";
    } else if (($father_img_size > 2)) {
        $er++;
        $efather_photo = "*Size is Greater than 2MB";
    } else {
        $father_img_path = "Uploaded Images\Father Photo/" . $father_img_name;
    }

    $mother_img_name = $_FILES['mother_photo']['name'];
    $mother_img_loc = $_FILES['mother_photo']['tmp_name'];
    $mother_img_ext = pathinfo($mother_img_name, PATHINFO_EXTENSION);
    $mother_img_size = $_FILES['mother_photo']['size'] / (1024 * 1024);
    if (is_uploaded_file($mother_img_loc) == 0) {
        $er++;
        $emother_photo = "*Please upload an image";
    } else if (in_array($mother_img_ext, $extensions) === false) {
        $er++;
        $emother_photo = "*Extension is not valid";
    } else if (($mother_img_size > 2)) {
        $er++;
        $emother_photo = "*Size is Greater than 2MB";
    } else {
        $mother_img_path = "Uploaded Images\Mother Photo/" . $mother_img_name;
    }

    $birth_img_name = $_FILES['birth_certificate']['name'];
    $birth_img_loc = $_FILES['birth_certificate']['tmp_name'];
    $birth_img_ext = pathinfo($birth_img_name, PATHINFO_EXTENSION);
    $birth_img_size = $_FILES['birth_certificate']['size'] / (1024 * 1024);
    if (is_uploaded_file($birth_img_loc) == 0) {
        $er++;
        $ebirth_certificate = "*Please upload the file";
    } else if (in_array($birth_img_ext, $extensions_pdf) === false) {
        $er++;
        $ebirth_certificate = "*Extension is not valid";
    } else if (($birth_img_size > 2)) {
        $er++;
        $ebirth_certificate = "*Size is Greater than 2MB";
    } else {
        $birth_img_path = "Uploaded Images\Birth Certificate/" . $birth_img_name;
    }

    $wellness_img_name = $_FILES['wellness_certificate']['name'];
    $wellness_img_loc = $_FILES['wellness_certificate']['tmp_name'];
    $wellness_img_ext = pathinfo($wellness_img_name, PATHINFO_EXTENSION);
    $wellness_img_size = $_FILES['wellness_certificate']['size'] / (1024 * 1024);
    if (is_uploaded_file($wellness_img_loc) == 0) {
        $er++;
        $ewellness_certificate = "*Please upload the file";
    } else if (in_array($wellness_img_ext, $extensions_pdf) === false) {
        $er++;
        $ewellness_certificate = "*Extension is not valid";
    } else if (($wellness_img_size > 2)) {
        $er++;
        $ewellness_certificate = "*Size is Greater than 2MB";
    } else {
        $wellness_img_path = "Uploaded Images\Wellness Certificate/" . $wellness_img_name;
    }


   

    if ($er == 0) {
        include '../includes/connect.php';
        $cstatus = 1;
        $sql ="UPDATE `tbl_student` SET `student_photo`='" . mysqli_real_escape_string($conn, $stud_img_path) . "',`father_photo`= '" . mysqli_real_escape_string($conn, $father_img_path) . "',`mother_photo`='" . mysqli_real_escape_string($conn, $mother_img_path) . "',`birth_certificate`= '" . mysqli_real_escape_string($conn, $birth_img_path) . "',`wellness_certificate`='" . mysqli_real_escape_string($conn, $wellness_img_path) . "',`upload_cstatus`='$cstatus' WHERE `email`='$stud_email'";
        
  
        $query = mysqli_query($conn, $sql);

        if ($query) {
            move_uploaded_file($stud_img_loc, $stud_img_path);
            move_uploaded_file($father_img_loc, $father_img_path);
            move_uploaded_file($mother_img_loc, $mother_img_path);
            move_uploaded_file($birth_img_loc, $birth_img_path);
            move_uploaded_file($wellness_img_loc, $wellness_img_path); 

            $_SESSION['message'] = "Photo Details Submitted Successfully!";
            $_SESSION['status'] = "success";
            $_SESSION['location'] = "payment.php";
        } else {
            print '<span class= "errorMessage">' . mysqli_error($conn) . '</span>';
        }
    } 
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//================================ PHP End =============================	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/config.php'; ?>

    <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
    <style>
        
        input[type="reset"],input[type="submit"]{
            margin-bottom: 170px;
        }

        input[type="file"] {
            display: none;
        }

        
        .img {
            
            height: 40px;
            width: 150px;
            cursor: pointer;
        }

#tooltip{
position: relative;
}
#tooltipText{
position: absolute; 
left: 50%;
top: 0;
transform: translateX(-50%); 
background-color: #eed202; 
color: black;
white-space: nowrap;
padding: 5px 8px;
border-radius: 7px;
visibility: hidden; 
opacity: 0; 
transition: opacity 0.5s ease;
}
#tooltipText::before{
content: "";
position: absolute;
left: 50%;
top: 100%;
transform: translateX(-50%); 
border: 10px solid;
border-color: #eed202 #0000 #0000 #0000;
}
    #tooltip:hover #tooltipText{ 
        top: -95%;
        visibility: visible; 
        opacity: 1;
    }
    </style>
<script src="../js/jquery1.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
            <!--panel-body -->
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <div class="section-title">
                                    DOCUMENTS NEEDED
                                </div>
                            </tr>
                            <tr>

                                <td class="col-md-4">
                                    <h6>Student's Photo <span class="require">*</span><span class="error"><br>
                                        <?php print $estudent_photo; ?></span></h6>
                                </td>
                                <td class="col-md-4">
                                    <center>
                                        <div id="tooltip">
                                        <img src="../images/upload-button.png" id="stud_upload" class="img">
                                        <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                        </div>
                                        <input type="file" name="stud_photo" accept=".jpg, .jpeg" id="stud_photo">

                                    </center>
                                    <script>
                                        $("#stud_upload").click(function() {
                                            $("#stud_photo").click();
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <h6>Father's Photo <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_photo; ?></span></h6>
                                </td>
                                <td>
                                    <center>
                                        <div id="tooltip">
                                        <img src="../images/upload-button.png" id="father_upload" class="img">
                                        <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                        </div>
                                        <input type="file" name="father_photo" accept=".jpg, .jpeg" id="father_photo">
                                        
                                    </center>
                                    <script>
                                        $("#father_upload").click(function() {
                                            $("#father_photo").click();
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <h6>Mother's Photo <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_photo; ?></span></h6>
                                </td>
                                <td>
                                    <center>
                                    <div id="tooltip">
                                        <img src="../images/upload-button.png" id="mother_upload" class="img">
                                        <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                        </div>
                                        <input type="file" name="mother_photo" accept=".jpg, .jpeg" id="mother_photo">
                                    </center>
                                    <script>
                                        $("#mother_upload").click(function() {
                                            $("#mother_photo").click();
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                <h6>Birth Certificate <span class="require">*</span><span class="error"><br>
                                        <?php print $ebirth_certificate; ?></span></h6>
                                </td>
                                <td>
                                    <center>
                                    <div id="tooltip">
                                        <img src="../images/upload-button.png" id="birth_upload" class="img">
                                        <span id="tooltipText">PDF Extension Only Allowed</span>
                                        </div>
                                        <input type="file" name="birth_certificate" accept=".pdf" id="birth_certificate">
                                    </center>
                                    <script>
                                        $("#birth_upload").click(function() {
                                            $("#birth_certificate").click();
                                        });
                                    </script>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                <h6>Wellness Certificate <span class="require">*</span><span class="error"><br>
                                        <?php print $ewellness_certificate; ?></span></h6>
                                </td>
                                <td>
                                    <center>
                                    <div id="tooltip">
                                        <img src="../images/upload-button.png" id="wellness_upload" class="img">
                                        <span id="tooltipText">PDF Extension Only Allowed</span>
                                        </div>
                                        <input type="file" name="wellness_certificate" accept=".pdf" id="wellness_certificate">
                                    </center>
                                    <script>
                                        $("#wellness_upload").click(function() {
                                            $("#wellness_certificate").click();
                                        });
                                    </script>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="agree" required> I agree that the following information are true.
        </div>

        <input type="reset" class="btn btn-warning" value="Reset">
        <input type="submit" class="btn btn-info" name="submit" value="Submit">

    </form>
    <?php include '../includes/redirect.php'; 
     include '../includes/footer.php';?>
</body>

</html>