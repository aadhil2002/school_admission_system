<?php
session_start();
$stud_email = $_SESSION["email"];
include '../includes/connect.php';
$s1 = "SELECT admission_status FROM tbl_student WHERE email = '$stud_email'";
$s = "SELECT payment_status FROM tbl_student WHERE email = '$stud_email'";
$status = mysqli_query($conn, $s);
$status1 = mysqli_query($conn, $s1);
$row = mysqli_fetch_assoc($status);
$row1 = mysqli_fetch_assoc($status1);
if (($row1['admission_status'] == 1) || ($row1['admission_status'] == 2) || ($row1['admission_status'] == 3) || ($row['payment_status'] == 0)) {
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
           <?php include('header.php'); ?>
        <div class="bg-img">
            <div class="content" style="background-color:rgba(255, 0, 0, 0.6);color:white;">
                <h1><?php echo "YOU CANNOT EDIT YOUR APPLICATION"; ?></h1>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </body>

    </html>
<?php
} else {

    $email = "";
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
    $prev_school_name = "";
    $prev_school_affliated = "";
    $fav_subject = "";
    $study_habits = "";
    $hobbies = "";
    $sport = "";
    $co_curricular = "";
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
    $wellness_certificate = "";
    $marksheet = "";
    $sport_certificate = "";
    $transfer_certificate = "";
    $aadhaar = "";



    include '../includes/connect.php';
    $query = mysqli_query($conn, "SELECT * FROM tbl_student A INNER JOIN tbl_secondary B ON A.email = B.email INNER JOIN tbl_family C ON A.email= C.email WHERE A.email='$stud_email'");

    $row2 = mysqli_fetch_assoc($query);

    $email = $row2['email'];
    $stud_name = $row2['stud_name'];
    $birthdate = $row2['birthdate'];
    $age = $row2['age'];


    $gender = $row2['gender'];
    $placeofbirth = $row2['place_of_birth'];
    $religion = $row2['religion'];
    $caste = $row2['caste'];
    $mother_tongue = $row2['mother_tongue'];
    $stud_living = $row2['stud_living'];
    $sibling = $row2['sibling'];
    $address = $row2['address'];
    $stateid = $row2['state'];
    $state_title = mysqli_query($conn, "SELECT `state_title` FROM `tbl_state` WHERE `state_id`=$stateid");
    $st = mysqli_fetch_assoc($state_title);
    $state = $st['state_title'];
    $districtid = $row2['district'];
    $district_title = mysqli_query($conn, "SELECT `district_title` FROM `tbl_district` WHERE `districtid`=$districtid");
    $di = mysqli_fetch_assoc($district_title);
    $district = $di['district_title'];
    $cityid = $row2['city'];
    $city_title = mysqli_query($conn, "SELECT `name` FROM `tbl_city` WHERE `id`=$cityid AND `districtid`=$districtid AND `state_id`=$stateid");
    $ci = mysqli_fetch_assoc($city_title);
    $city = $ci['name'];
    $pincode = $row2['pincode'];
    $contact = $row2['contact'];
    $class = $row2['class'];
    $passed_class = $row2['passed_class'];
    $second_language = $row2['second_language'];
    $prev_school_name = $row2['prev_school_name'];
    $prev_school_affliated = $row2['prev_school_affliated'];
    $fav_subject = $row2['fav_subject'];
    $study_habits = $row2['study_habits'];
    $hobbies = $row2['hobbies'];
    $sport = $row2['sport'];
    $co_curricular = $row2['co_curricular'];
    $other_interests = $row2['other_interests'];
    $transport_facility = $row2['transport_facility'];


    $father_name = $row2['father_name'];
    $father_qualification = $row2['father_qualification'];
    $father_profession = $row2['father_profession'];
    $father_phonenumber = $row2['father_phonenumber'];
    $father_email = $row2['father_email'];
    $father_annualincome = $row2['father_annualincome'];

    $mother_name = $row2['mother_name'];
    $mother_qualification = $row2['mother_qualification'];
    $mother_profession = $row2['mother_profession'];
    $mother_phonenumber = $row2['mother_phonenumber'];
    $mother_email = $row2['mother_email'];
    $mother_annualincome = $row2['mother_annualincome'];
    $role_of_parent = $row2['role_of_parent'];

    $stud_photo = $row2['student_photo'];
    $father_photo = $row2['father_photo'];
    $mother_photo = $row2['mother_photo'];
    $birth_certificate = $row2['birth_certificate'];
    $wellness_certificate = $row2['wellness_certificate'];
    $marksheet = $row2['marksheet'];
    $sport_certificate = $row2['sport_certificate'];
    $transfer_certificate = $row2['transfer_certificate'];
    $aadhaar = $row2['aadhaar'];

    if ($stud_living == "Guardian") {
        $query1  = mysqli_query($conn, "SELECT * FROM `tbl_guardian` WHERE email='$email' AND admission_type='Secondary'");
        $row3 = mysqli_fetch_assoc($query1);
        $guardian_name = $row3['guardian_name'];
        $guardian_address = $row3['guardian_address'];
        $guardian_email = $row3['guardian_email'];
        $guardian_contact = $row3['guardian_contact'];
    }

    if ($sibling == "Yes") {
        $size = 0;
        $query2  = mysqli_query($conn, "SELECT * FROM `tbl_sibling` WHERE email='$email' AND admission_type='Secondary'");
        while ($row4 = mysqli_fetch_array($query2)) {
            $sibling_name[] = $row4['sibling_name'];
            $sibling_age[] = $row4['sibling_age'];
            $sibling_class[] = $row4['sibling_class'];
            $siblingname[] = $row4['sibling_name'];
            $siblingage[] = $row4['sibling_age'];
            $siblingclass[] = $row4['sibling_class'];
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
    if (isset($_POST['ms_view'])) {
        header("content-type: application/pdf");
        readfile($marksheet);
    }
    if (isset($_POST['sport_view'])) {
        header("content-type: application/pdf");
        readfile($sport_certificate);
    }
    if (isset($_POST['tc_view'])) {
        header("content-type: application/pdf");
        readfile($transfer_certificate);
    }
    if (isset($_POST['aadhaar_view'])) {
        header("content-type: application/pdf");
        readfile($aadhaar);
    }


    if (isset($_POST['update'])) {
        if (isset($_POST['gender']))
            $gender = $_POST['gender'];
        $placeofbirth = $_POST['placeofbirth'];
        if (!empty($_POST['religion']))
            $religion = $_POST['religion'];
        $caste = $_POST['caste'];
        if (!empty($_POST['mother_tongue']))
            $mother_tongue = $_POST['mother_tongue'];
        if (isset($_POST['stud_living']))
            $stud_living = $_POST['stud_living'];
        if (isset($_POST['stud_living']))
            $sibling = $_POST['sibling'];
        $address = $_POST['address'];
        if (isset($_POST['state']))
            $stateid = $_POST['state'];
        if (!empty($_POST['district']))
            $districtid = $_POST['district'];
        if (!empty($_POST['city']))
            $cityid = $_POST['city'];
        $pincode = $_POST['pincode'];
        $contact = $_POST['contact'];
        $class = $_POST['class'];
        $passed_class = $_POST['passed_class'];
        if (isset($_POST['second_language']))
            $second_language = $_POST['second_language'];
        $prev_school_name = $_POST['prev_school_name'];
        $prev_school_affliated = $_POST['prev_school_affliated'];
        if (isset($_POST['fav_subject']))
            $fav_subject = $_POST['fav_subject'];
        if (isset($_POST['study_habits']))
            $study_habits = $_POST['study_habits'];
        if (isset($_POST['hobbies']))
            $hobbies = $_POST['hobbies'];
        $sport = $_POST['sport'];
        if (isset($_POST['co_curricular']))
            $co_curricular = $_POST['co_curricular'];
        $other_interests = $_POST['other_interests'];
        $transport = $_POST['transport_facility'];

        $$father_name = $_POST['father_name'];
        $father_qualification = $_POST['father_qualification'];
        $father_profession = $_POST['father_profession'];
        $father_phonenumber = $_POST['father_phonenumber'];
        $father_email = $_POST['father_email'];
        $father_annualincome = $_POST['father_annualincome'];


        $mother_name = $_POST['mother_name'];
        $mother_qualification = $_POST['mother_qualification'];
        $mother_profession = $_POST['mother_profession'];
        $mother_phonenumber = $_POST['mother_phonenumber'];
        $mother_email = $_POST['mother_email'];
        $mother_annualincome = $_POST['mother_annualincome'];
        $role_of_parent = $_POST['role_of_parent'];

        $er = 0;










        if ($placeofbirth == "") {
            $er++;
            $eplaceofbirth = "*Required";
        } else {
            $placeofbirth = test_input($placeofbirth);
            if (!preg_match("/^[a-zA-Z ]*$/", $placeofbirth)) {
                $er++;
                $eplaceofbirth = "*Only letters and white space allowed";
            }
        }



        if ($caste == "") {
            $er++;
            $ecaste = "*Required";
        } else {
            $caste = test_input($caste);
            if (!preg_match("/^[a-zA-Z]*$/", $caste)) {
                $er++;
                $ecaste = "*Only letters are allowed";
            }
        }




        if ($address == "") {
            $er++;
            $eaddress = "*Required";
        } else {
            $address = test_input($address);
        }


        if ($pincode == "") {
            $er++;
            $epincode = "*Required";
        } else {
            $pincode = test_input($pincode);
            if (!preg_match("/^[1-9][0-9]{5}$/", $pincode)) {
                $er++;
                $epincode = "*Pincode Format Invalid";
            }
        }


        if ($contact == "") {
            $er++;
            $econtact = "*Required";
        } else {
            $contact = test_input($contact);
            if (!preg_match("/^[+0-9]*$/", $contact)) {
                $er++;
                $econtact = "*Only numbers are allowed";
            } else if (strlen($contact) < 10 || strlen($contact) > 10) {
                $er++;
                $econtact = "*Contact must have only ten numbers";
            } else {
                $econtact = "";
            }
        }


        if ($prev_school_name == "") {
            $er++;
            $eprev_school_name = "*Required";
        } else {
            $prev_school_name = test_input($prev_school_name);
            if (!preg_match("/^[a-zA-Z ]*$/", $prev_school_name)) {
                $er++;
                $eprev_school_name = "*Only letters and white space allowed";
            }
        }



        if ($fav_subject == "") {
            $er++;
            $efav_subject = "*Required";
        } else {
            $fav_subject = test_input($fav_subject);
            if (!preg_match("/^[a-zA-Z ]*$/", $fav_subject)) {
                $er++;
                $efav_subject = "*Only letters, white space are allowed";
            }
        }


        if ($hobbies == "") {
            $er++;
            $ehobbies = "*Required";
        } else {
            $hobbies = test_input($hobbies);
            if (!preg_match("/^[a-zA-Z ]*$/", $hobbies)) {
                $er++;
                $ehobbies = "*Only letters, white space  are allowed";
            }
        }

        if ($sport != "") {
            $sport = test_input($sport);
            if (!preg_match("/^[a-zA-Z ]*$/", $sport)) {
                $er++;
                $esport_certificate = "*Only letters, white space  are allowed";
            }
        }

        if ($co_curricular == "") {
            $er++;
            $errco_curricular = "*Required";
        } else {
            $co_curricular = test_input($co_curricular);
            if (!preg_match("/^[a-zA-Z ]*$/", $co_curricular)) {
                $er++;
                $errco_curricular = "*Only letters, white space  are allowed";
            }
        }

        if ($other_interests != "") {
            $other_interests = test_input($other_interests);
            if (!preg_match("/^[a-zA-Z ]*$/", $other_interests)) {
                $er++;
                $eother_interests = "*Only letters, white space  are allowed";
            }
        }




        if ($father_name == "") {
            $er++;
            $efather_name =  "*Required";
        } else {
            $father_name = test_input($father_name);
            if (!preg_match("/^[a-zA-Z ]*$/", $father_name)) {
                $er++;
                $efather_name = "*Only letters and white space allowed";
            }
        }
        if ($father_qualification == "") {
            $er++;
            $efather_qualification = "*Required";
        } else {
            $father_qualification = test_input($father_qualification);
            if (!preg_match("/^[a-zA-Z ]*$/", $father_qualification)) {
                $er++;
                $efather_qualification = "*Only letters and white space allowed";
            }
        }
        if ($father_profession == "") {
            $er++;
            $efather_profession = "*Required";
        } else {
            $father_profession = test_input($father_profession);
            if (!preg_match("/^[a-zA-Z ]*$/", $father_profession)) {
                $er++;
                $efather_profession = "*Only letters and white space allowed";
            }
        }


        if ($father_phonenumber == "") {
            $er++;
            $efather_phonenumber = "*Required";
        } else {
            $father_phonenumber = test_input($father_phonenumber);
            if (!preg_match("/^[+0-9]*$/", $father_phonenumber)) {
                $er++;
                $efather_phonenumber = "*Only numbers are allowed";
            } else if (strlen($father_phonenumber) < 10 || strlen($father_phonenumber) > 10) {
                $er++;
                $efather_phonenumber = "*Contact must have only ten numbers";
            } else {
                $efather_phonenumber = "";
            }
        }

        if ($father_email == "") {
            $er++;
            $efather_email = "*Required";
        } else {
            $father_email = test_input($father_email);
            if (!filter_var($father_email, FILTER_VALIDATE_EMAIL)) {
                $er++;
                $efather_email = "*Email format is invalid";
            }
        }

        if ($father_annualincome == "") {
            $er++;
            $efather_annualincome = "*Required";
        } else {
            $father_annualincome = test_input($father_annualincome);
            if (!preg_match("/^[+0-9]*$/", $father_annualincome)) {
                $er++;
                $efather_annualincome = "*Only numbers are allowed";
            }
        }

        if ($mother_name == "") {
            $er++;
            $emother_name = "*Required";
        } else {
            $mother_name = test_input($mother_name);
            if (!preg_match("/^[a-zA-Z ]*$/", $mother_name)) {
                $er++;
                $emother_name = "*Only letters and white space allowed";
            }
        }
        if ($mother_qualification == "") {
            $er++;
            $emother_qualification = "*Required";
        } else {
            $mother_qualification = test_input($mother_qualification);
            if (!preg_match("/^[a-zA-Z ]*$/", $mother_qualification)) {
                $er++;
                $emother_qualification = "*Only letters and white space allowed";
            }
        }
        if ($mother_profession == "") {
            $er++;
            $emother_profession = "*Required";
        } else {
            $mother_profession = test_input($mother_profession);
            if (!preg_match("/^[a-zA-Z ]*$/", $mother_profession)) {
                $er++;
                $emother_profession = "*Only letters and white space allowed";
            }
        }

        if ($mother_phonenumber == "") {
            $er++;
            $emother_phonenumber = "*Required";
        } else {
            $mother_phonenumber = test_input($mother_phonenumber);
            if (!preg_match("/^[+0-9]*$/", $mother_phonenumber)) {
                $er++;
                $emother_phonenumber = "*Only numbers are allowed";
            } else if (strlen($mother_phonenumber) < 10 || strlen($mother_phonenumber) > 10) {
                $er++;
                $emother_phonenumber = "*Contact must have only ten numbers";
            } else {
                $emother_phonenumber = "";
            }
        }

        if ($mother_email == "") {
            $er++;
            $emother_email = "*Required";
        } else {
            $mother_email = test_input($mother_email);
            if (!filter_var($mother_email, FILTER_VALIDATE_EMAIL)) {
                $er++;
                $emother_email = "*Email format is invalid";
            }
        }

        if ($mother_annualincome == "") {
            $er++;
            $emother_annualincome = "*Required";
        } else {
            $mother_annualincome = test_input($mother_annualincome);
            if (!preg_match("/^[+0-9]*$/", $mother_annualincome)) {
                $er++;
                $emother_annualincome = "*Only numbers are allowed";
            }
        }

        if ($role_of_parent == "") {
            $er++;
            $erole_of_parent = "*Required";
        } else {
            $role_of_parent = test_input($role_of_parent);
            if (!preg_match("/^[a-zA-Z ]*$/", $role_of_parent)) {
                $er++;
                $erole_of_parent = "*Only letters and white space allowed";
            }
        }
        if ($stud_living == "Guardian") {
            $guardian_name = $_POST['guardian_name'];
            $guardian_address = $_POST['guardian_address'];
            $guardian_email = $_POST['guardian_email'];
            $guardian_phonenumber = $_POST['guardian_phonenumber'];

            if ($guardian_name == "") {
                $er++;
                $eguardian_name =  "*Required";
            } else {
                $guardian_name = test_input($guardian_name);
                if (!preg_match("/^[a-zA-Z ]*$/", $guardian_name)) {
                    $er++;
                    $eguardian_name = "*Only letters and white space allowed";
                }
            }

            if ($guardian_address == "") {
                $er++;
                $eguardian_address = "*Required";
            } else {
                $guardian_address = test_input($guardian_address);
            }

            if ($guardian_email == "") {
                $er++;
                $eguardian_email = "*Required";
            } else {
                $guardian_email = test_input($guardian_email);
                if (!filter_var($guardian_email, FILTER_VALIDATE_EMAIL)) {
                    $er++;
                    $eguardian_email = "*Email format is invalid";
                }
            }
            if ($guardian_phonenumber == "") {
                $er++;
                $eguardian_phonenumber = "*Required";
            } else {
                $guardian_phonenumber = test_input($guardian_phonenumber);
                if (!preg_match("/^[+0-9]*$/", $guardian_phonenumber)) {
                    $er++;
                    $eguardian_phonenumber = "*Only numbers are allowed";
                } else if (strlen($guardian_phonenumber) < 10 || strlen($guardian_phonenumber) > 10) {
                    $er++;
                    $eguardian_phonenumber = "*Contact must have only ten numbers";
                } else {
                    $eguardian_phonenumber = "";
                }
            }
        }
        if ($sibling == "Yes") {
            $sibling_name = $_POST['sibling_name'];
            $sibling_age = $_POST['sibling_age'];
            $sibling_class = $_POST['sibling_class'];
            if ($sibling_name) {
                $size = sizeof($sibling_name);
            } else {
                $size = 1;
                $flag_s = 1;
            }

            for ($i = 0; $i < $size; $i++) {
                if ($sibling_name[$i] == "") {
                    $er++;
                    $esibling_name[$i] =  "*Required";
                } else {
                    $sibling_name[$i] = test_input($sibling_name[$i]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $sibling_name[$i])) {
                        $er++;
                        $esibling_name[$i] = "*Only letters and white space allowed";
                    }
                }

                if ($sibling_age[$i] == "") {
                    $er++;
                    $esibling_age[$i] = "*Required";
                } else {
                    $sibling_age[$i] = test_input($sibling_age[$i]);
                    if (!preg_match("/^[+0-9]*$/", $sibling_age[$i])) {
                        $er++;
                        $esibling_age[$i] = "*Only numbers are allowed";
                    } else if (strlen($sibling_age[$i]) > 2) {
                        $er++;
                        $esibling_age[$i] = "*Age must have only atmost 2 digits";
                    } else if ($sibling_age[$i] > 20) {
                        $er++;
                        $esibling_age[$i] = "*Age must be less than 20";
                    } else {
                        $esibling_age[$i] = "";
                    }
                }

                if ($sibling_class[$i] == "") {
                    $er++;
                    $esibling_class[$i] =  "*Required";
                } else {
                    $sibling_class[$i] = test_input($sibling_class[$i]);
                    if (!preg_match("/^[a-zA-Z+0-9]*$/", $sibling_class[$i])) {
                        $er++;
                        $esibling_class[$i] = "*Only letters and numbers allowed";
                    }
                }
            }
        }

        $stud_img_name = $_FILES['stud_photo']['name'];
        $stud_img_loc = $_FILES['stud_photo']['tmp_name'];
        $stud_img_ext = pathinfo($stud_img_name, PATHINFO_EXTENSION);
        $stud_img_size = $_FILES['stud_photo']['size'] / (1024 * 1024);
        if (is_uploaded_file($stud_img_loc) == 1) {
            if (in_array($stud_img_ext, $extensions) === false) {
                $er++;
                $estudent_photo = "*Extension is not valid";
            } else if (($stud_img_size > 2)) {
                $er++;
                $estudent_photo = "*Size is Greater than 2MB";
            } else {
                $stud_img_path = "Uploaded Images\Student Photo/" . $stud_img_name;
            }
        }


        $father_img_name = $_FILES['father_photo']['name'];
        $father_img_loc = $_FILES['father_photo']['tmp_name'];
        $father_img_ext = pathinfo($father_img_name, PATHINFO_EXTENSION);
        $father_img_size = $_FILES['father_photo']['size'] / (1024 * 1024);
        if (is_uploaded_file($father_img_loc) == 1) {
            if (in_array($father_img_ext, $extensions) === false) {
                $er++;
                $efather_photo = "*Extension is not valid";
            } else if (($father_img_size > 2)) {
                $er++;
                $efather_photo = "*Size is Greater than 2MB";
            } else {
                $father_img_path = "Uploaded Images\Father Photo/" . $father_img_name;
            }
        }

        $mother_img_name = $_FILES['mother_photo']['name'];
        $mother_img_loc = $_FILES['mother_photo']['tmp_name'];
        $mother_img_ext = pathinfo($mother_img_name, PATHINFO_EXTENSION);
        $mother_img_size = $_FILES['mother_photo']['size'] / (1024 * 1024);
        if (is_uploaded_file($mother_img_loc) == 1) {
            if (in_array($mother_img_ext, $extensions) === false) {
                $er++;
                $emother_photo = "*Extension is not valid";
            } else if (($mother_img_size > 2)) {
                $er++;
                $emother_photo = "*Size is Greater than 2MB";
            } else {
                $mother_img_path = "Uploaded Images\Mother Photo/" . $mother_img_name;
            }
        }

        $birth_img_name = $_FILES['birth_certificate']['name'];
        $birth_img_loc = $_FILES['birth_certificate']['tmp_name'];
        $birth_img_ext = pathinfo($birth_img_name, PATHINFO_EXTENSION);
        $birth_img_size = $_FILES['birth_certificate']['size'] / (1024 * 1024);
        if (is_uploaded_file($birth_img_loc) == 1) {
            if (in_array($birth_img_ext, $extensions_pdf) === false) {
                $er++;
                $ebirth_certificate = "*Extension is not valid";
            } else if (($birth_img_size > 2)) {
                $er++;
                $ebirth_certificate = "*Size is Greater than 2MB";
            } else {
                $birth_img_path = "Uploaded Images\Birth Certificate/" . $birth_img_name;
            }
        }

        $wellness_img_name = $_FILES['wellness_certificate']['name'];
        $wellness_img_loc = $_FILES['wellness_certificate']['tmp_name'];
        $wellness_img_ext = pathinfo($wellness_img_name, PATHINFO_EXTENSION);
        $wellness_img_size = $_FILES['wellness_certificate']['size'] / (1024 * 1024);
        if (is_uploaded_file($wellness_img_loc) == 1) {
            if (in_array($wellness_img_ext, $extensions_pdf) === false) {
                $er++;
                $ewellness_certificate = "*Extension is not valid";
            } else if (($wellness_img_size > 2)) {
                $er++;
                $ewellness_certificate = "*Size is Greater than 2MB";
            } else {
                $wellness_img_path = "Uploaded Images\Wellness Certificate/" . $wellness_img_name;
            }
        }

        $mark_img_name = $_FILES['marksheet']['name'];
        $mark_img_loc = $_FILES['marksheet']['tmp_name'];
        $mark_img_ext = pathinfo($mark_img_name, PATHINFO_EXTENSION);
        $mark_img_size = $_FILES['marksheet']['size'] / (1024 * 1024);
        if (is_uploaded_file($mark_img_loc) == 1) {
            if (in_array($mark_img_ext, $extensions_pdf) === false) {
                $er++;
                $emarksheet = "*Extension is not valid";
            } else if (($mark_img_size > 2)) {
                $er++;
                $emarksheet = "*Size is Greater than 2MB";
            } else {
                $mark_img_path = "Uploaded Images\Marksheet/" . $mark_img_name;
            }
        }

        $sport_img_name = $_FILES['sport_certificate']['name'];
        $sport_img_loc = $_FILES['sport_certificate']['tmp_name'];
        $sport_img_ext = pathinfo($sport_img_name, PATHINFO_EXTENSION);
        $sport_img_size = $_FILES['sport_certificate']['size'] / (1024 * 1024);
        if (is_uploaded_file($sport_img_loc) == 1) {
            if (in_array($sport_img_ext, $extensions_pdf) === false) {
                $er++;
                $esport_certificate_certificate = "*Extension is not valid";
            } else if (($sport_img_size > 2)) {
                $er++;
                $esport_certificate_certificate = "*Size is Greater than 2MB";
            } else {
                $sport_img_path = "Uploaded Images\Sport Certificate/" . $sport_img_name;
            }
        }


        $transfer_img_name = $_FILES['transfer_certificate']['name'];
        $transfer_img_loc = $_FILES['transfer_certificate']['tmp_name'];
        $transfer_img_ext = pathinfo($transfer_img_name, PATHINFO_EXTENSION);
        $transfer_img_size = $_FILES['transfer_certificate']['size'] / (1024 * 1024);
        if (is_uploaded_file($transfer_img_loc) == 1) {
            if (in_array($transfer_img_ext, $extensions_pdf) === false) {
                $er++;
                $etransfer_certificate = "*Extension is not valid";
            } else if (($transfer_img_size > 2)) {
                $er++;
                $etransfer_certificate = "*Size is Greater than 2MB";
            } else {
                $transfer_img_path = "Uploaded Images\Transfer Certificate/" . $transfer_img_name;
            }
        }

        $aadhaar_img_name = $_FILES['aadhaar']['name'];
        $aadhaar_img_loc = $_FILES['aadhaar']['tmp_name'];
        $aadhaar_img_ext = pathinfo($aadhaar_img_name, PATHINFO_EXTENSION);
        $aadhaar_img_size = $_FILES['aadhaar']['size'] / (1024 * 1024);
        if (is_uploaded_file($aadhaar_img_loc) == 1) {
            if (in_array($aadhaar_img_ext, $extensions_pdf) === false) {
                $er++;
                $eaadhaar = "*Extension is not valid";
            } else if (($aadhaar_img_size > 2)) {
                $er++;
                $eaadhaar = "*Size is Greater than 2MB";
            } else {
                $aadhaar_img_path = "Uploaded Images\Aadhaar/" . $aadhaar_img_name;
            }
        }


        if ($er == 0) {
            include '../includes/connect.php';
            $Updatequery = mysqli_query($conn, "UPDATE `tbl_student` SET `gender`='$gender',`place_of_birth`='$placeofbirth',`religion`='$religion',`caste`='$caste',`mother_tongue`='$mother_tongue',`stud_living`='$stud_living',`sibling`='$sibling',`address`='$address',`state`='$stateid',`district`='$districtid',`city`='$cityid',`pincode`='$pincode',`contact`='$contact',`class`='$class',`hobbies`='$hobbies',`other_interests`='$other_interests',`transport_facility`='$transport' WHERE email='$email'");
            $Updatequery1 =mysqli_query($conn,"UPDATE `tbl_secondary` SET `passed_class`='$passed_class',`second_language`='$second_language',`prev_school_name`='$prev_school_name',`prev_school_affliated`='$prev_school_affliated',`fav_subject`='$fav_subject',`study_habits`='$study_habits',`sport`='$sport',`co_curricular`='$co_curricular' WHERE email='$email'");
            $Updatequery2 = mysqli_query($conn, "UPDATE `tbl_family` SET `father_name`='$father_name',`father_qualification`='$father_qualification',`father_profession`='$father_profession',`father_phonenumber`='$father_phonenumber',`father_email`='$father_email',`father_annualincome`='$father_annualincome',`mother_name`='$mother_name',`mother_qualification`='$mother_qualification',`mother_profession`='$mother_profession',`mother_phonenumber`='$mother_phonenumber',`mother_email`='$mother_email',`mother_annualincome`='$mother_annualincome',`role_of_parent`='$role_of_parent' WHERE email='$email' AND admission_type='Secondary'");
            if (is_uploaded_file($stud_img_loc) == 1) {
                unlink($stud_photo);
                $s = mysqli_query($conn, "UPDATE `tbl_student` SET `student_photo`='" . mysqli_real_escape_string($conn, $stud_img_path) . "' WHERE email='$email'");
                if ($s) {
                    move_uploaded_file($stud_img_loc, $stud_img_path);
                }
            }
            if (is_uploaded_file($father_img_loc) == 1) {
                unlink($father_photo);
                $f = mysqli_query($conn, "UPDATE `tbl_student` SET `father_photo`='" . mysqli_real_escape_string($conn, $father_img_path) . "' WHERE email='$email'");
                if ($f) {
                    move_uploaded_file($father_img_loc, $father_img_path);
                }
            }
            if (is_uploaded_file($mother_img_loc) == 1) {
                unlink($mother_photo);
                $m = mysqli_query($conn, "UPDATE `tbl_student` SET `mother_photo`='" . mysqli_real_escape_string($conn, $mother_img_path) . "' WHERE email='$email'");
                if ($m) {
                    move_uploaded_file($mother_img_loc, $mother_img_path);
                }
            }
            if (is_uploaded_file($birth_img_loc) == 1) {
                unlink($birth_certificate);
                $b = mysqli_query($conn, "UPDATE `tbl_student` SET `birth_certificate`='" . mysqli_real_escape_string($conn, $birth_img_path) . "' WHERE email='$email'");
                if ($b) {
                    move_uploaded_file($birth_img_loc, $birth_img_path);
                }
            }
            if (is_uploaded_file($wellness_img_loc) == 1) {
                unlink($wellness_certificate);
                $w = mysqli_query($conn, "UPDATE `tbl_student` SET `wellness_certificate`='" . mysqli_real_escape_string($conn, $wellness_img_path) . "' WHERE email='$email'");
                if ($w) {
                    move_uploaded_file($wellness_img_loc, $wellness_img_path);
                }
            }
            if (is_uploaded_file($mark_img_loc) == 1) {
                unlink($marksheet);
                $ms = mysqli_query($conn, "UPDATE `tbl_secondary` SET `marksheet`='" . mysqli_real_escape_string($conn, $mark_img_path) . "' WHERE email='$email'");
                if ($ms) {
                    move_uploaded_file($mark_img_loc, $mark_img_path);
                }
            }
            if (is_uploaded_file($sport_img_loc) == 1) {
                unlink($sport_certificate);
                $sc = mysqli_query($conn, "UPDATE `tbl_secondary` SET `sport_certificate`='" . mysqli_real_escape_string($conn, $sport_img_path) . "' WHERE email='$email'");
                if ($sc) {
                    move_uploaded_file($sport_img_loc, $sport_img_path);
                }
            }
            if (is_uploaded_file($transfer_img_loc) == 1) {
                unlink($transfer_certificate);
                $tc = mysqli_query($conn, "UPDATE `tbl_secondary` SET `transfer_certificate`='" . mysqli_real_escape_string($conn, $transfer_img_path) . "' WHERE email='$email'");
                if ($tc) {
                    move_uploaded_file($transfer_img_loc, $transfer_img_path);
                }
            }
            if (is_uploaded_file($aadhaar_img_loc) == 1) {
                unlink($aadhaar);
                $a = mysqli_query($conn, "UPDATE `tbl_secondary` SET `aadhaar`='" . mysqli_real_escape_string($conn, $aadhaar_img_path) . "' WHERE email='$email'");
                if ($a) {
                    move_uploaded_file($aadhaar_img_loc, $aadhaar_img_path);
                }
            }
            if ($Updatequery && $Updatequery1 && $Updatequery2) {
                if ($sibling == "No") {
                    $Deletequery = mysqli_query($conn, "DELETE FROM `tbl_sibling` WHERE email='$email'");
                } else {
                    if ($size != 0) {
                        for ($i = 0; $i < $size; $i++) {
                            $Updatequery3 = mysqli_query($conn, "UPDATE `tbl_sibling` SET `sibling_name`='$sibling_name[$i]',`sibling_age`='$sibling_age[$i]',`sibling_class`='$sibling_class[$i]' WHERE email='$email' AND admission_type='Secondary' AND `sibling_name`= '$siblingname[$i]' ");
                        }
                    }
                }


                if ($stud_living == "Guardian") {
                    $Updatequery4 = mysqli_query($conn, "UPDATE `tbl_guardian` SET `guardian_name`='$guardian_name',`guardian_address`='$guardian_address',`guardian_email`='$guardian_email',`guardian_contact`='$guardian_phonenumber' WHERE email='$email' AND admission_type='Secondary' ");
                } else {
                    $Deletequery1 = mysqli_query($conn, "DELETE FROM `tbl_guardian` WHERE email='$email'");
                }
                $_SESSION['message'] = "Details Updated Successfully!";
                $_SESSION['status'] = "success";
                $_SESSION['location'] = "dashboard.php";
            } else {
                print '<span class= "errorMessage">"' . mysqli_error($conn) . '"</span>';
            }
        }
    }



?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script src="../js/jquery-3.1.1.min.js?v=<?= $version ?>"></script>
        <script src="../js/bootstrap.min.js?v=<?= $version ?>"></script>

        <script src="../js/jquery-3.5.1.min.js?v=<?= $version ?>"></script>
        <script>
            function getpassedclass() {
                var Class = document.getElementById("class").value;
                 if (Class == "9") {
                    document.getElementById("passedclass").value = "8";
                } else if (Class == "10") {
                    document.getElementById("passedclass").value = "9";
                } else {
                    document.getElementById("passedclass").value = "";
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#state').change(function() {
                    loadDistrict($(this).find(':selected').val())
                })
                $('#district').change(function() {
                    loadCity($(this).find(':selected').val())
                })


            });

            function loadState() {
                $.ajax({
                    type: "POST",
                    url: "../includes/ajax.php",
                    data: "get=state"
                }).done(function(result) {

                    $("#state").append($(result));
                });
            }

            function loadDistrict(stateId) {
                $("#district").children().remove()
                $.ajax({
                    type: "POST",
                    url: "../includes/ajax.php",
                    data: "get=district&stateId=" + stateId
                }).done(function(result) {

                    $("#district").append($(result));

                });
            }

            function loadCity(districtId) {
                $("#city").children().remove()
                $.ajax({
                    type: "POST",
                    url: "../includes/ajax.php",
                    data: "get=city&districtId=" + districtId
                }).done(function(result) {

                    $("#city").append($(result));

                });
            }
            loadState();
        </script>
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
        <?php include '../includes/config.php' ?>


        <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
        <link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
    </head>

    <body>
    <?php include('header.php'); ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="panel-body">
                <!--panel-body -->
                <div class="row">
                    <div class="col-md-10">
                        <table class="table table-bordered table-striped" id="table_field">
                            <tbody>
                                <tr>
                                    <div class="section-title">
                                        UPDATE YOUR DETAILS
                                    </div>
                                </tr>
                                <td colspan="3">
                                    <h4>
                                        STUDENT'S DETAILS
                                    </h4>
                                </td>
                                <tr>
                                    <td>Student Name</td>
                                    <td colspan="2"><input type="text" name="stud_name" class="form-control" value="<?php print $stud_name; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Gender <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="gender" class="form-control">
                                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                                            <?php
                                            $SELECTquery = mysqli_query($conn, "SELECT `gender` FROM tbl_option WHERE `gender` != '$gender' AND gender IS NOT NULL");
                                            while ($rw = mysqli_fetch_array($SELECTquery)) { ?>
                                                <option value="<?php echo $rw['gender']; ?>"><?php echo $rw['gender']; ?></option>
                                            <?php }

                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td colspan="2"><input type="date" class="form-control" name="birthdate" maxlength="10" value="<?php echo $birthdate; ?>" readonly></td>
                                </tr>

                                <tr>
                                    <td>Age</td>
                                    <td colspan="2"><input type="text" class="form-control" name="age" value="<?php echo $age; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Place of Birth <span class="require">*</span><span class="error"><br>
                                            <?php print $eplaceofbirth; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="placeofbirth" value="<?php print $placeofbirth; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Religion <span class="require">*</span></td>
                                    <td colspan="2"><select name="religion" class="form-control">
                                            <option value="<?php echo $religion; ?>"><?php echo $religion; ?></option>
                                            <?php
                                            $SELECTquery1 = mysqli_query($conn, "SELECT religion FROM tbl_option WHERE religion!='$religion' AND religion IS NOT NULL");
                                            while ($rw1 = mysqli_fetch_array($SELECTquery1)) {
                                            ?>
                                                <option value="<?php echo $rw1['religion']; ?>"><?php echo $rw1['religion']; ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Caste <span class="require">*</span><span class="error"><br>
                                            <?php print $ecaste; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="caste" value="<?php print $caste; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Mother Tongue <span class="require">*</span></td>
                                    <td colspan="2"><select name="mother_tongue" class="form-control">
                                            <option value="<?php echo $mother_tongue; ?>"><?php echo $mother_tongue; ?></option>
                                            <?php
                                            $SELECTquery2 = mysqli_query($conn, "SELECT mother_tongue FROM tbl_option WHERE `mother_tongue` != '$mother_tongue' AND mother_tongue IS NOT NULL");
                                            while ($rw2 = mysqli_fetch_array($SELECTquery2)) {
                                            ?>
                                                <option value="<?php echo $rw2['mother_tongue']; ?>"><?php echo $rw2['mother_tongue']; ?></option>
                                            <?php }
                                            ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Student is living with <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="stud_living" class="form-control">
                                            <option value="<?php echo $stud_living; ?>"><?php echo $stud_living; ?></option>
                                            <?php $SELECTquery3 = mysqli_query($conn, "SELECT `stud_living` FROM tbl_option WHERE `stud_living` != '$stud_living' AND stud_living IS NOT NULL");
                                            while ($rw3 = mysqli_fetch_array($SELECTquery3)) {
                                            ?>
                                                <option value="<?php echo $rw3['stud_living']; ?>"><?php echo $rw3['stud_living']; ?></option>

                                            <?php  } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Do you have a sibling studying in this school? <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="sibling" class="form-control">
                                            <option value="<?php echo $sibling; ?>"><?php echo $sibling; ?></option>
                                            <?php
                                            $SELECTquery4 = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` != '$sibling' AND  `boolean` IS NOT NULL");
                                            while ($rw4 = mysqli_fetch_array($SELECTquery4)) {
                                            ?>
                                                <option value="<?php echo $rw4['boolean']; ?>"><?php echo $rw4['boolean']; ?></option>
                                            <?php }
                                            ?>
                                    </td>
                                </tr>
                                <td>Contact Address <span class="require">*</span><span class="error"><br>
                                        <?php print $eaddress; ?></span></td>
                                <td colspan="2"><input type="text" class="form-control" name="address" value="<?php echo $address; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Nationality</td>
                                    <td colspan="2"><input type="text" class="form-control" value="India" readonly></td>
                                </tr>
                                <tr>
                                    <td>State <span class="require">*</span></td>
                                    <td colspan="2"><select type="text" class="form-control" name="state" id="state">
                                            <option value="<?php echo $stateid; ?>"><?php echo $state; ?></option>
                                            <?php include '../includes/connect.php';
                                            $s = mysqli_query($conn, "SELECT `state_id`, `state_title` FROM `tbl_state` WHERE `state_id`!=$stateid");
                                            while ($s1 = mysqli_fetch_array($s)) {
                                            ?>
                                                <option value="<?php echo $s1['state_id']; ?>"><?php echo $s1['state_title']; ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>District <span class="require">*</span></td>
                                    <td colspan="2"><select type="text" class="form-control" id="district" name="district">
                                            <option value="<?php echo $districtid; ?>"><?php echo $district; ?></option>
                                            <?php include '../includes/connect.php';
                                            $d = mysqli_query($conn, "SELECT `districtid`,`district_title` FROM `tbl_district` WHERE `districtid`!=$districtid AND`state_id`=$stateid");
                                            while ($d1 = mysqli_fetch_array($d)) {
                                            ?>
                                                <option value="<?php echo $d1['districtid']; ?>"><?php echo $d1['district_title']; ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>City <span class="require">*</span></td>
                                    <td colspan="2"><select class="form-control" name="city" id="city">
                                            <option value="<?php echo $cityid; ?>"><?php echo $city; ?></option>
                                            <?php include '../includes/connect.php';
                                            $c = mysqli_query($conn, "SELECT `id`,`name` FROM `tbl_city` WHERE `id`!=$cityid AND `districtid`=$districtid AND`state_id`=$stateid");
                                            while ($c1 = mysqli_fetch_array($c)) {
                                            ?>
                                                <option value="<?php echo $c1['id']; ?>"><?php echo $c1['name']; ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Pincode <span class="require">*</span><span class="error"><br>
                                            <?php print $epincode; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="pincode" value="<?php print $pincode; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Contact <span class="require">*</span><span class="error"><br>
                                            <?php print $econtact; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="contact" value="<?php print $contact; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td colspan="2"><input type="text" class="form-control" value="<?php print $email; ?>" readonly> </td>
                                </tr>
                                <tr>
                                    <td>Admission for the grade <span class="require">*</span></td>
                                    <td colspan="2"><select name="class" class="form-control" id="class" onclick="getpassedclass();" value="<?php print $class; ?>">

                                            <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                            <?php
                                            $SELECTquery5 = mysqli_query($conn, "SELECT secondary_class FROM tbl_option WHERE secondary_class != '$class' AND  secondary_class IS NOT NULL");
                                            while ($rw5 = mysqli_fetch_array($SELECTquery5)) {
                                            ?>
                                                <option value="<?php echo $rw5['secondary_class']; ?>"><?php echo $rw5['secondary_class']; ?></option>
                                            <?php }
                                            ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Grade Completed <span class="require">*</span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="passed_class" id="passedclass" value="<?php echo $passed_class; ?>" readonly></td>
                                </tr>

                                <tr>
                                    <td>Second Language Prefered <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="second_language" class="form-control">
                                            <option value="<?php echo $second_language; ?>"><?php echo $second_language; ?></option>
                                            <?php $SELECTquery6 = mysqli_query($conn, "SELECT `language` FROM tbl_option WHERE `language` != '$second_language' AND `language` IS NOT NULL");
                                            while ($rw6 = mysqli_fetch_array($SELECTquery6)) {
                                            ?>
                                                <option value="<?php echo $rw6['language']; ?>"><?php echo $rw6['language']; ?></option>
                                            <?php }
                                            ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Previous School Name <span class="require">*</span><span class="error"><br>
                                            <?php print $eprev_school_name; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="prev_school_name" value="<?php print $prev_school_name; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Previous School Affliated To <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="prev_school_affliated" class="form-control">
                                            <option value="<?php echo $prev_school_affliated; ?>"><?php echo $prev_school_affliated; ?></option>
                                            <?php
                                            $SELECTquery7 = mysqli_query($conn, "SELECT `prev_school_affliated` FROM tbl_option WHERE `prev_school_affliated` != '$prev_school_affliated' AND `prev_school_affliated` IS NOT NULL");
                                            while ($rw7 = mysqli_fetch_array($SELECTquery7)) {
                                            ?>
                                                <option value="<?php echo $rw7['prev_school_affliated']; ?>"><?php echo $rw7['prev_school_affliated']; ?></option>
                                            <?php }
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Favorite Subjects <span class="require">*</span><span class="error"><br>
                                            <?php print $efav_subject; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="fav_subject" value="<?php print $fav_subject; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Student's Study Habits <span class="require">*</span></td>
                                    <td colspan="2">
                                        <select name="study_habits" class="form-control">
                                            <option value="<?php echo $study_habits; ?>"><?php echo $study_habits; ?></option>
                                            <?php
                                            $SELECTquery8 = mysqli_query($conn, "SELECT `study_habits` FROM tbl_option WHERE `study_habits` != '$study_habits' AND `study_habits` IS NOT NULL");
                                            while ($rw8 = mysqli_fetch_array($SELECTquery8)) {
                                            ?>
                                                <option value="<?php echo $rw8['study_habits']; ?>"><?php echo $rw8['study_habits']; ?></option>
                                            <?php }
                                            ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Hobbies <span class="require">*</span><span class="error"><br>
                                            <?php print $ehobbies; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="hobbies" value="<?php print $hobbies; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Active participation in the sport of<span class="error"><br>
                                            <?php print $esport_certificate; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="sport" value="<?php print $sport; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Achievements in co-curricular activities<span class="error"><br>
                                            <?php print $errco_curricular; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="co_curricular" value="<?php print $co_curricular; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Other Interests<span class="error"><br>
                                            <?php print $eother_interests; ?></span></td>
                                    <td colspan="2"><input type="text" class="form-control" name="other_interests" value="<?php print $other_interests; ?>"></td>
                                </tr>


                                <td>Would the student avail transport facility provided by the school <span class="require">*</span></td>
                                <td colspan="2">
                                    <select name="transport_facility" class="form-control">
                                        <option value="<?php echo $transport_facility; ?>"><?php echo $transport_facility; ?></option>
                                        <?php
                                        $SELECTquery9 = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` != '$transport_facility' AND `boolean` IS NOT NULL");
                                        while ($rw9 = mysqli_fetch_array($SELECTquery9)) {
                                        ?>
                                            <option value="<?php echo $rw9['boolean']; ?>"><?php echo $rw9['boolean']; ?></option>
                                        <?php }
                                        ?>
                                </td>
                                </tr>

                                <tr>

                                    <td colspan="3">
                                        <h4>FATHER'S DETAILS</h4>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Father's Name <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_name; ?></span></td>
                                    <td colspan="2"><input type="text" name="father_name" value="<?php print $father_name; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Qualification <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_qualification; ?></span></td>
                                    <td colspan="2">
                                        <input type="text" name="father_qualification" value="<?php print $father_qualification; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profession <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_profession; ?></span>
                                    </td>
                                    <td colspan="2"><input type="text" name="father_profession" value="<?php print $father_profession; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Phone Number <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_phonenumber; ?></span></td>
                                    <td colspan="2"><input type="text" name="father_phonenumber" value="<?php print $father_phonenumber; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_email; ?></span></td>
                                    <td colspan="2"><input type="text" name="father_email" value="<?php print $father_email; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Annual Income <span class="require">*</span><span class="error"><br>
                                            <?php print $efather_annualincome; ?></span></td>
                                    <td colspan="2"><input type="text" name="father_annualincome" value="<?php print $father_annualincome; ?>"></td>
                                </tr>
                                <tr>

                                    <td colspan="3">
                                        <h4>
                                            MOTHER'S DETAILS
                                        </h4>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Mother's Name <span class="require">*</span><span class="error"><br>
                                            <?php print $emother_name; ?></span></td>
                                    <td colspan="2"><input type="text" name="mother_name" value="<?php print $mother_name; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Qualification <span class="require">*</span><span class="error"><br>
                                            <?php print $emother_qualification; ?></span></td>
                                    <td colspan="2">
                                        <input type="text" name="mother_qualification" value="<?php print $mother_qualification; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profession <span class="require">*</span><span class=" error"><br>
                                            <?php print $emother_profession; ?></span>
                                    </td>
                                    <td colspan="2"><input type="text" name="mother_profession" value="<?php print $mother_profession; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Phone Number <span class="require">*</span><span class="error"><br>
                                            <?php print $emother_phonenumber; ?></span></td>
                                    <td colspan="2"><input type="text" name="mother_phonenumber" value="<?php print $mother_phonenumber; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email <span class="require">*</span><span class="error"><br>
                                            <?php print $emother_email; ?></span></td>
                                    <td colspan="2"><input type="text" name="mother_email" value="<?php print $mother_email; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Annual Income <span class="require">*</span><span class="error"><br>
                                            <?php print $emother_annualincome; ?></span></td>
                                    <td colspan="2"><input type="text" name="mother_annualincome" value="<?php print $mother_annualincome; ?>"></td>
                                </tr>
                                <tr>
                                    <td>What according to you should be the role of a parent in child's education? <span class="require">*</span><span class="error"><br>
                                            <?php print $erole_of_parent; ?></span></td>
                                    <td colspan="2"><input type="text" name="role_of_parent" value="<?php print $role_of_parent; ?>"></td>
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
                                        <td>Guardian's Name <span class="require">*</span><span class="error"><br>
                                                <?php print $eguardian_name; ?></span></td>
                                        <td colspan="2"><input type="text" name="guardian_name" value="<?php print $guardian_name; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Address <span class="require">*</span><span class=" error"><br>
                                                <?php print $eguardian_address; ?></span>
                                        </td>
                                        <td colspan="2"><input type="text" name="guardian_address" value="<?php print $guardian_address; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email <span class="require">*</span><span class="error"><br>
                                                <?php print $eguardian_email; ?></span></td>
                                        <td colspan="2"><input type="text" name="guardian_email" value="<?php print $guardian_email; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number <span class="require">*</span><span class="error"><br>
                                                <?php print $eguardian_phonenumber; ?></span></td>
                                        <td colspan="2"><input type="text" name="guardian_phonenumber" value="<?php print $guardian_contact; ?>"></td>
                                    </tr>
                                <?php
                                }
                                if ($sibling == "Yes") {

                                ?>

                                    <tr>


                                        <td colspan="3">
                                            <h4>
                                                SIBLING'S DETAILS
                                            </h4>
                                        </td>

                                    </tr>
                                    <tr>

                                        <th>
                                            <center>Name <span class="require">*</span></center>
                                        </th>
                                        <th>
                                            <center>Age <span class="require">*</span></center>
                                        </th>

                                        <th>
                                            <center>Grade/Class <span class="require">*</span></center>
                                        </th>

                                    </tr>
                                    <?php
                                    for ($i = 0; $i < $size; $i++) {
                                    ?>

                                        <tr>

                                            <td><input type="text" class="bottom-margin" name="sibling_name[]" value="<?php echo $sibling_name[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_name[$i]; ?></span></td>
                                            <td><input type="text" class="bottom-margin" name="sibling_age[]" value="<?php echo $sibling_age[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_age[$i]; ?></span></td>
                                            <td><input type="text" class="bottom-margin" name="sibling_class[]" value="<?php echo $sibling_class[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_class[$i]; ?></span></td>

                                        </tr>

                                <?php
                                    }
                                }
                                ?>


                                <tr>
                                    <th colspan="3">

                                        <h4>Document Details</h4>

                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>
                                            Document Name
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Old Document
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            New Document
                                        </center>
                                    </th>
                                </tr>
                                <tr>

                                    <td class="photo">
                                        <h6>Student's Photo <span class="require">*</span><span class="error"><br>
                                                <?php print $estudent_photo; ?></span></h6>
                                    </td>
                                    <td>
                                        <center>

                                            <img src="<?php echo $stud_photo ?>" width="400" height="400">

                                        </center>

                                    </td>
                                    <td>
                                        <center>

                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="stud_upload" class="img">
                                                <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                            </div>
                                            <input type="file" name="stud_photo" accept=".jpg, .jpeg" id="stud_photo">
                                            <script>
                                                $("#stud_upload").click(function() {
                                                    $("#stud_photo").click();
                                                });
                                            </script>

                                        </center>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="photo">
                                        <h6>Father's Photo <span class="require">*</span><span class="error"><br>
                                                <?php print $efather_photo; ?></span></h6>
                                    </td>
                                    <td>
                                        <center>

                                            <img src="<?php echo $father_photo ?>" width="400" height="400">

                                        </center>
                                    </td>
                                    <td>
                                        <center>

                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="father_upload" class="img">
                                                <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                            </div>
                                            <input type="file" name="father_photo" accept=".jpg, .jpeg" id="father_photo">

                                            <script>
                                                $("#father_upload").click(function() {
                                                    $("#father_photo").click();
                                                });
                                            </script>

                                        </center>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="photo">
                                        <h6>Mother's Photo <span class="require">*</span><span class="error"><br>
                                                <?php print $emother_photo; ?></span></h6>
                                    </td>
                                    <td>
                                        <center>
                                            <img src="<?php echo $mother_photo ?>" width="400" height="400">
                                        </center>
                                    </td>
                                    <td>
                                        <center>

                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="mother_upload" class="img">
                                                <span id="tooltipText">Allowed Extensions are JPG and JPEG</span>
                                            </div>
                                            <input type="file" name="mother_photo" accept=".jpg, .jpeg" id="mother_photo">
                                            <script>
                                                $("#mother_upload").click(function() {
                                                    $("#mother_photo").click();
                                                });
                                            </script>
                                        </center>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="photo">
                                        <h6>Birth Certificate <span class="require">*</span><span class="error"><br>
                                                <?php print $ebirth_certificate; ?></span></h6>
                                    </td>
                                    <?php
                                    $birth_ext = pathinfo($birth_certificate, PATHINFO_EXTENSION);
                                    if (in_array($birth_ext, $extensions_pdf) === true) {
                                    ?>
                                        <td>
                                            <center>
                                                <button name="bc_view">View File</button>
                                            </center>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <center>
                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="birth_upload" class="img">
                                                <span id="tooltipText">PDF Extension Only Allowed</span>
                                            </div>
                                            <input type="file" name="birth_certificate" accept=".jpg, .jpeg, .pdf" id="birth_certificate">
                                            <script>
                                                $("#birth_upload").click(function() {
                                                    $("#birth_certificate").click();
                                                });
                                            </script>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="photo">
                                        <h6>Wellness Certificate <span class="require">*</span><span class="error"><br>
                                                <?php print $ewellness_certificate; ?></span></h6>
                                    </td>
                                    <?php
                                    $wellness_ext = pathinfo($wellness_certificate, PATHINFO_EXTENSION);
                                    if (in_array($wellness_ext, $extensions_pdf) === true) {
                                    ?>
                                        <td>
                                            <center>
                                                <button name="wc_view">View File</button>
                                            </center>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <center>
                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="wellness_upload" class="img">
                                                <span id="tooltipText">PDF Extension Only Allowed</span>
                                            </div>
                                            <input type="file" name="wellness_certificate" accept=".jpg, .jpeg, .pdf" id="wellness_certificate">
                                            <script>
                                                $("#wellness_upload").click(function() {
                                                    $("#wellness_certificate").click();
                                                });
                                            </script>
                                        </center>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="photo">
                                        <h6>Marksheet <span class="require">*</span><span class="error"><br>
                                                <?php print $emarksheet; ?></span></h6>
                                    </td>
                                    <?php
                                    $mark_ext = pathinfo($marksheet, PATHINFO_EXTENSION);
                                    if (in_array($mark_ext, $extensions_pdf) === true) {
                                    ?>
                                        <td>
                                            <center>
                                                <button name="ms_view">View File</button>
                                            </center>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <center>
                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="mark_upload" class="img">
                                                <span id="tooltipText">PDF Extension Only Allowed</span>
                                            </div>
                                            <input type="file" name="marksheet" accept=".jpg, .jpeg, .pdf" id="marksheet">
                                            <script>
                                                $("#mark_upload").click(function() {
                                                    $("#marksheet").click();
                                                });
                                            </script>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                if ($sport_certificate == NULL) {
                                } else {
                                ?>
                                    <tr>

                                        <td class="photo">
                                            <h6>Sports Certificate<span class="error"><br>
                                                    <?php print $esport_certificate; ?></span></h6>
                                        </td>
                                        <?php
                                        $sport_ext = pathinfo($sport_certificate, PATHINFO_EXTENSION);
                                        if (in_array($sport_ext, $extensions_pdf) === true) {
                                        ?>
                                            <td>
                                                <center>
                                                    <button name="sport_view">View File</button>
                                                </center>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <td class="photo">
                                            <center>

                                                <div id="tooltip">
                                                    <img src="../images/upload-button.png" id="sport_upload" class="img">
                                                    <span id="tooltipText">PDF Extension Only Allowed</span>
                                                </div>
                                                <input type="file" name="sport_certificate" accept=".jpg, .jpeg, .pdf" id="sport_certificate">
                                                <script>
                                                    $("#sport_upload").click(function() {
                                                        $("#sport_certificate").click();
                                                    });
                                                </script>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td class="photo">
                                        <h6>Transfer Certificate <span class="require">*</span><span class="error"><br>
                                                <?php print $etransfer_certificate; ?></span></h6>
                                    </td>
                                    <?php
                                    $transfer_ext = pathinfo($transfer_certificate, PATHINFO_EXTENSION);
                                    if (in_array($transfer_ext, $extensions_pdf) === true) {
                                    ?>
                                        <td>
                                            <center>
                                                <button name="tc_view">View File</button>
                                            </center>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <center>
                                            <div id="tooltip">
                                                <img src="../images/upload-button.png" id="transfer_upload" class="img">
                                                <span id="tooltipText">PDF Extension Only Allowed</span>
                                            </div>
                                            <input type="file" name="transfer_certificate" accept=".jpg, .jpeg, .pdf" id="transfer_certificate">
                                        </center>
                                        <script>
                                            $("#transfer_upload").click(function() {
                                                $("#transfer_certificate").click();
                                            });
                                        </script>
                                    </td>
                                </tr>
                                <?php
                                if ($aadhaar == NULL) {
                                } else {
                                ?>
                                    <tr>

                                        <td class="photo">
                                            <h6>Aadhaar<span class="error"><br>
                                                    <?php print $eaadhaar; ?></span></h6>
                                        </td>
                                        <?php
                                        $aadhaar_ext = pathinfo($aadhaar, PATHINFO_EXTENSION);
                                        if (in_array($aadhaar_ext, $extensions_pdf) === true) {
                                        ?>
                                            <td>
                                                <center>
                                                    <button name="aadhaar_view">View File</button>
                                                </center>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <td class="photo">
                                            <center>

                                                <div id="tooltip">
                                                    <img src="../images/upload-button.png" id="aadhaar_upload" class="img">
                                                    <span id="tooltipText">PDF Extension Only Allowed</span>
                                                </div>
                                                <input type="file" name="aadhaar" accept=".jpg, .jpeg, .pdf" id="aadhaar">
                                                <script>
                                                    $("#aadhaar_upload").click(function() {
                                                        $("#aadhaar").click();
                                                    });
                                                </script>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="checkbox">
                <input type="checkbox" name="agree" required checked> I agree that the following information are true.
            </div>

            <input type="submit" class="btn btn-info" name="update" value="Update">



        </form>

        <?php
        include '../includes/redirect.php';
        ?>
        <?php include '../includes/footer.php'; ?>
    </body>

    </html>
<?php

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>