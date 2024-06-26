<?php
$stud_email = $_GET['email'];
    $stud_name = "";
    $birthdate = "";
    $age = "";
    $gender = "";
    $placeofbirth = "";
    $religion = "";
    $caste = "";
    $mother_tongue = "";
    $stud_living = "";
    $sibling = "";
    $address = "";
    $stateid = "";
    $districtid = "";
    $cityid = "";
    $pincode = "";
    $contact = "";
    $class = "";
    $passed_class = "";
    $second_language = "";
    $third_language="";
    $prev_school_name = "";
    $prev_school_affliated = "";
    $fav_subject = "";
    $study_habits = "";
    $hobbies = "";
    $other_interests = "";
    $transport_facility = "";


    $father_name = "";
    $father_qualification = "";
    $father_profession = "";
    $father_phonenumber = "";
    $father_email = "";
    $father_annualincome = "";

    $mother_name = "";
    $mother_qualification = "";
    $mother_profession = "";
    $mother_phonenumber = "";
    $mother_email = "";
    $mother_annualincome = "";
    $role_of_parent = "";

    $stud_photo = "";
    $father_photo = "";
    $mother_photo = "";
    $birth_certificate = "";
    $wellness_certificate="";
    $transfer_certificate = "";
    $aadhaar = "";


include '../includes/connect.php';

$query = mysqli_query($conn, "SELECT * FROM tbl_student A INNER JOIN tbl_primary B ON A.email = B.email INNER JOIN tbl_family C ON A.email= C.email WHERE A.email='$stud_email'");
        
    $row1 = mysqli_fetch_assoc($query);
   
    $email = $row1['email'];
    $stud_name = $row1['stud_name'];
    $birthdate = $row1['birthdate'];
    $age = $row1['age'];


    $gender = $row1['gender'];
    $placeofbirth = $row1['place_of_birth'];
    $religion = $row1['religion'];
    $caste = $row1['caste'];
    $mother_tongue = $row1['mother_tongue'];
    $stud_living = $row1['stud_living'];
    $sibling = $row1['sibling'];
    $address = $row1['address'];
    $stateid = $row1['state'];
    $state_title = mysqli_query($conn, "SELECT `state_title` FROM `tbl_state` WHERE `state_id`=$stateid");
    $st = mysqli_fetch_assoc($state_title);
    $state = $st['state_title'];
    $districtid = $row1['district'];
    $district_title = mysqli_query($conn, "SELECT `district_title` FROM `tbl_district` WHERE `districtid`=$districtid");
    $di = mysqli_fetch_assoc($district_title);
    $district = $di['district_title'];
    $cityid = $row1['city'];
    $city_title = mysqli_query($conn, "SELECT `name` FROM `tbl_city` WHERE `id`=$cityid AND `districtid`=$districtid AND `state_id`=$stateid");
    $ci = mysqli_fetch_assoc($city_title);
    $city = $ci['name'];
    $pincode = $row1['pincode'];
    $contact = $row1['contact'];
    $class = $row1['class'];
    $passed_class = $row1['passed_class'];
    $second_language = $row1['second_language'];
    $third_language = $row1['third_language'];
    $prev_school_name = $row1['prev_school_name'];
    $prev_school_affliated = $row1['prev_school_affliated'];
    $fav_subject = $row1['fav_subject'];
    $study_habits = $row1['study_habits'];
    $hobbies = $row1['hobbies'];
    $other_interests = $row1['other_interests'];
    $transport_facility = $row1['transport_facility'];


    $father_name = $row1['father_name'];
    $father_qualification = $row1['father_qualification'];
    $father_profession = $row1['father_profession'];
    $father_phonenumber = $row1['father_phonenumber'];
    $father_email = $row1['father_email'];
    $father_annualincome = $row1['father_annualincome'];

    $mother_name = $row1['mother_name'];
    $mother_qualification = $row1['mother_qualification'];
    $mother_profession = $row1['mother_profession'];
    $mother_phonenumber = $row1['mother_phonenumber'];
    $mother_email = $row1['mother_email'];
    $mother_annualincome = $row1['mother_annualincome'];
    $role_of_parent = $row1['role_of_parent'];

    $stud_photo = "../Primary/".$row1['student_photo'];
$father_photo = "../Primary/".$row1['father_photo'];
$mother_photo = "../Primary/".$row1['mother_photo'];
$birth_certificate = "../Primary/".$row1['birth_certificate'];
$wellness_certificate="../Primary/".$row1['wellness_certificate'];
$transfer_certificate= "../Primary/".$row1['transfer_certificate'];
$aadhaar = "../Primary/".$row1['aadhaar'];

        if ($stud_living == "Guardian") {
            $query1  = mysqli_query($conn, "SELECT * FROM `tbl_guardian` WHERE email='$email' AND admission_type='Primary'");
            $row2 = mysqli_fetch_assoc($query1);
            $guardian_name = $row2['guardian_name'];
            $guardian_address = $row2['guardian_address'];
            $guardian_email = $row2['guardian_email'];
            $guardian_contact = $row2['guardian_contact'];
        }

        if ($sibling == "Yes") {
            $size=0;
            $query2  = mysqli_query($conn, "SELECT * FROM `tbl_sibling` WHERE email='$email' AND admission_type='Primary'");
            while ($row3 = mysqli_fetch_array($query2)) {
                $sibling_name[] = $row3['sibling_name'];
                $sibling_age[] = $row3['sibling_age'];
                $sibling_class[] = $row3['sibling_class'];
                $siblingname[] = $row3['sibling_name'];
                $siblingage[] = $row3['sibling_age'];
                $siblingclass[] = $row3['sibling_class'];
                $size++;
            }
        }
        $extensions = array("jpeg", "jpg", "JPEG", "JPG");
        $extensions_pdf = array("pdf", "PDF");
        if (isset($_POST['bc_view'])) {
            header("content-type: application/pdf");
            readfile($birth_certificate);
        }
        if (isset($_POST['wc_view'])) {
            header("content-type: application/pdf");
            readfile($wellness_certificate);
        }

        if (isset($_POST['tc_view'])) {
            header("content-type: application/pdf");
            readfile($transfer_certificate);
        }
        if (isset($_POST['aadhaar_view'])) {
            header("content-type: application/pdf");
            readfile($aadhaar);
        }






?>

<!DOCTYPE HTML>
<html>

<head>
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
    <style>
        .photo {
            width: 500px;
        }

        .footer-social-icons {
            margin-left: 10%
        }

        #button {
            background-position: relative;
            border: none;
            color: #fff;
            padding: 10px 50px;
            outline: none;
        }

        input[type="submit"] {
            margin-left: 220px;
            margin-right: 20px;

        }

        input[type="reset"],
        input[type="submit"] {
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

        #tooltip {
            position: relative;
        }

        #tooltipText {
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

        #tooltipText::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            border: 10px solid;
            border-color: #eed202 #0000 #0000 #0000;
        }

        #tooltip:hover #tooltipText {
            top: -95%;
            visibility: visible;
            opacity: 1;
        }
    </style>
    <?php include 'includes/config.php' ?>


    <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
</head>

<body>
    <?php include 'includes/header.php';
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
            <!--panel-body -->
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <div class="section-title">
                                    PRIMARY ADMISSION
                                </div>
                            </tr>
                            <td colspan="3">
                                        <h4>
                                            STUDENT'S DETAILS
                                        </h4>
                                    </td>
                                    <tr>
                                        <td>Student Name</td>
                                        <td colspan="2"><?php print $stud_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td colspan="2">
                                            <?php echo $gender; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td colspan="2"><?php echo $birthdate; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Age</td>
                                        <td colspan="2"><?php echo $age; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Place of Birth</td>
                                        <td colspan="2"><?php print $placeofbirth; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td colspan="2"><?php echo $religion; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Caste</td>
                                        <td colspan="2"><?php print $caste; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mother Tongue</td>
                                        <td colspan="2"><?php echo $mother_tongue; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Student is living with</td>
                                        <td colspan="2">
                                        <?php echo $stud_living; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Do you have a sibling studying in this school?</td>
                                        <td colspan="2">
                                        <?php echo $sibling; ?>
                                        </td>
                                    </tr>
                                    <td>Contact Address</td>
                                    <td colspan="2"><?php echo $address; ?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td colspan="2"><?php echo $state; ?></td>
                                    </tr>
                                    <tr>
                                        <td>District</td>
                                        <td colspan="2"><?php echo $district; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td colspan="2"><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pincode</td>
                                        <td colspan="2"><?php print $pincode; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td colspan="2"><?php print $contact; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td colspan="2"><?php print $email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admission for the grade</td>
                                        <td colspan="2"><?php echo $class; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Grade Completed</td>
                                        <td colspan="2"><?php echo $passed_class; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Second Language Prefered</td>
                                        <td colspan="2"><?php echo $second_language; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Third Language Prefered</td>
                                        <td colspan="2"><?php echo $third_language; ?></td>
                                    </tr>

                                
                                    <tr>
                                        <td>Previous School Name</td>
                                        <td colspan="2"><?php print $prev_school_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Previous School Affliated To</td>
                                        <td colspan="2">
                                       <?php  echo $prev_school_affliated; ?></td>
                                    </tr>
                                    <tr>
                                <td>Favorite Subjects</td>
                                <td><?php print $fav_subject; ?></td>
                            </tr>

                            <tr>
                                <td>Student's Study Habits</td>
                                <td>
                                <?php echo $study_habits; ?></td>
                            </tr>

                            <tr>
                                <td>Hobbies</td>
                                <td><?php print $hobbies; ?></td>
                            </tr>


                            <tr>
                                <td>Other Interests</td>
                                <td><?php print $other_interests; ?></td>
                            </tr>

<tr>
                                    <td>Would the student avail transport facility provided by the school</td>
                                    <td colspan="2"><?php echo $transport_facility; ?></td>
                                    </tr>

                                    <tr>

                                        <td colspan="3">
                                            <h4>FATHER'S DETAILS</h4>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td colspan="2"> <?php print $father_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Qualification</td>
                                        <td colspan="2">
                                           <?php print $father_qualification; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Profession</td>
                                        <td colspan="2"><?php print $father_profession; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td colspan="2"><?php print $father_phonenumber; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td colspan="2"><?php print $father_email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Annual Income</td>
                                        <td colspan="2"><?php print $father_annualincome; ?></td>
                                    </tr>
                                    <tr>

                                        <td colspan="3">
                                            <h4>
                                                MOTHER'S DETAILS
                                            </h4>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Mother's Name</td>
                                        <td colspan="2"><?php print $mother_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Qualification</td>
                                        <td colspan="2">
                                           <?php print $mother_qualification; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Profession</span>
                                        </td>
                                        <td colspan="2"><?php print $mother_profession; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td colspan="2"><?php print $mother_phonenumber; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td colspan="2"><?php print $mother_email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Annual Income</td>
                                        <td colspan="2"><?php print $mother_annualincome; ?></td>
                                    </tr>
                                    <tr>
                                <td colspan>What according to you should be the role of a parent in child's education?</td>
                                <td colspan="2"><?php print $role_of_parent; ?></td>
                            </tr>
                            <?php
                            if ($stud_living == "Guardian") {

                            ?>
                                <tr>


                                    <td colspan="3">
                                        <h4>
                                            GUARDIAN'S DETAILS
                                        </h4>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Guardian's Name</td>
                                    <td colspan="2"><?php print $guardian_name; ?></td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td colspan="2"><?php print $guardian_address; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td colspan="2"><?php print $guardian_email; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td colspan="2"><?php print $guardian_contact; ?></td>
                                </tr>
                            <?php
                            }
                            if ($sibling == "Yes") {

                            ?>

                                <tr>


                                    <td colspan="3">
                                        <h4>
                                            sibling'S DETAILS
                                        </h4>
                                    </td>

                                </tr>
                                <tr>

                                    <th>
                                        <center>Name</center>
                                    </th>
                                    <th>
                                        <center>Age</center>
                                    </th>

                                    <th>
                                        <center>Grade/Class</center>
                                    </th>

                                </tr>
                                <?php
                                for ($i = 0; $i < $size; $i++) {
                                ?>

                                    <tr>

                                        <td><?php echo $sibling_name[$i]; ?></td>
                                        <td><?php echo $sibling_age[$i]; ?></td>
                                        <td><?php echo $sibling_class[$i]; ?></td>

                                    </tr>

                            <?php
                                }
                            }
                            ?>


                            <tr>
                                <th colspan="3">

                                    <h4>DOCUMENT DETAILS</h4>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <center>
                                        Name
                                    </center>
                                </th>
                                <th colspan="2">
                                    <center>
                                        Document
                                    </center>
                                </th>
                            </tr>
                            <tr>

                                <td class="photo">
                                    <h6>Student's Photo</h6>
                                </td>
                                <td colspan="2">
                                    <center>

                                        <img src="<?php echo $stud_photo ?>" width="400" height="400">

                                    </center>

                                </td>

                            </tr>
                            <tr>

                                <td class="photo">
                                    <h6>Father's Photo</h6>
                                </td>
                                <td colspan="2">
                                    <center>

                                        <img src="<?php echo $father_photo ?>" width="400" height="400">

                                    </center>
                                </td>

                            </tr>
                            <tr>

                                <td class="photo">
                                    <h6>Mother's Photo</h6>
                                </td>
                                <td colspan="2">
                                    <center>
                                        <img src="<?php echo $mother_photo ?>" width="400" height="400">
                                    </center>
                                </td>

                            </tr>
                            <tr>

                                <td class="photo">
                                    <h6>Birth Certificate</h6>
                                </td>
                                <?php
                                $birth_ext = pathinfo($birth_certificate, PATHINFO_EXTENSION);
                                if (in_array($birth_ext, $extensions_pdf) === true) {
                                ?>
                                    <td colspan="2">
                                        <center>
                                            <button name="bc_view">View File</button>
                                        </center>
                                    </td>
                                <?php
                                } 
                                ?>
                            </tr>

                            <tr>
                                <td class="photo">
                                    <h6>Wellness Certificate</h6>
                                </td>
                                <?php
                                $wellness_ext = pathinfo($wellness_certificate, PATHINFO_EXTENSION);
                                if (in_array($wellness_ext, $extensions_pdf) === true) {
                                ?>
                                    <td colspan="2">
                                        <center>
                                            <button name="wc_view">View File</button>
                                        </center>
                                    </td>
                                <?php
                                } 
                                ?>
                            </tr>

                            <tr>
                                <td class="photo">
                                    <h6>Transfer Certificate</h6>
                                </td>
                                <?php
                                $transfer_ext = pathinfo($transfer_certificate, PATHINFO_EXTENSION);
                                if (in_array($transfer_ext, $extensions_pdf) === true) {
                                ?>
                                    <td colspan="2">
                                        <center>
                                            <button name="tc_view">View File</button>
                                        </center>
                                    </td>
                                <?php
                                } 
                                ?>
                            </tr>
                            <?php
                            if ($aadhaar == NULL) {
                            } else {
                            ?>
                                <tr>

                                    <td class="photo">
                                        <h6>Aadhaar</h6>
                                    </td>
                                    <?php
                                    $aadhaar_ext = pathinfo($aadhaar, PATHINFO_EXTENSION);
                                    if (in_array($aadhaar_ext, $extensions_pdf) === true) {
                                    ?>
                                        <td colspan="2">
                                            <center>
                                                <button name="aadhaar_view">View File</button>
                                            </center>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <?php include 'includes/footer.php'; ?>
    </form>
</body>

</html>
<?php

?>