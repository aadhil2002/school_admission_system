<?php
include '../includes/connect.php';
session_start();
$email = $_SESSION["email"];
$SELECTquery = mysqli_query($conn, "SELECT stud_name,birthdate, age FROM `tbl_student` WHERE email='$email'");
$nba = mysqli_fetch_assoc($SELECTquery);
$stud_name = $nba['stud_name'];
$birthdate = $nba['birthdate'];
$age = $nba['age'];
$gender = "";
$placeofbirth = "";
$religion = "";
$caste = "";
$stud_living = "";
$sibling = "";
$address = "";
$state = "";
$district = "";
$city = "";
$pincode = "";
$contact = "";
$class = "";
$passed_class = "";
$second_language = "";
$third_language ="";
$prev_school_name = "";
$prev_school_affliated = "";
$fav_subject = "";
$study_habits = "";
$hobbies = "";
$other_interests = "";
$transport = "";


//Error Variable
$egender = "";
$eplaceofbirth = "";
$ereligion = "";
$ecaste = "";
$estud_living = "";
$esibling = "";
$eaddress = "";
$estate = "";
$edistrict = "";
$ecity = "";
$epincode = "";
$econtact = "";
$eclass = "";
$esecond_language = "";
$eprev_school_name = "";
$eprev_school_affliated = "";
$efav_subject = "";
$estudy_habits = "";
$ehobbies = "";
$eother_interests = "";
$etransport = "";



$_SESSION['message'] = "";
$_SESSION['status'] = "";
$_SESSION['location'] = "";


if (isset($_POST['submit'])) {
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
        $state = $_POST['state'];
    if (!empty($_POST['district']))
        $district = $_POST['district'];
    if (!empty($_POST['city']))
        $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $contact = $_POST['contact'];
    $class = $_POST['class'];
    $passed_class = $_POST['passed_class'];
    if (isset($_POST['second_language']))
        $second_language = $_POST['second_language'];
        if (isset($_POST['third_language']))
        $third_language = $_POST['third_language'];
    $prev_school_name = $_POST['prev_school_name'];
    $prev_school_affliated = $_POST['prev_school_affliated'];
    if (isset($_POST['fav_subject']))
    $fav_subject = $_POST['fav_subject'];
    if (isset($_POST['study_habits']))
    $study_habits = $_POST['study_habits'];
    if (isset($_POST['hobbies']))
    $hobbies = $_POST['hobbies'];
    $other_interests = $_POST['other_interests'];
    $transport = $_POST['transport_facility'];
    $er = 0;


    if (empty($gender)) {
        $er++;
        $egender = "*Gender is required";
    } else {
        $gender = test_input($gender);
    }

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

    if (empty($religion)) {
        $er++;
        $ereligion = "*Religion is required";
    } else {
        $religion = test_input($religion);
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

    if (empty($mother_tongue)) {
        $er++;
        $emother_tongue = "*Mother Tongue is required";
    } else {
        $mother_tongue = test_input($mother_tongue);
    }

    if (empty($stud_living)) {
        $er++;
        $estud_living = "*Required";
    } else {
        $stud_living = test_input($stud_living);
    }

    if (empty($sibling)) {
        $er++;
        $esibling = "*Required";
    } else {
        $sibling = test_input($sibling);
    }

    if ($address == "") {
        $er++;
        $eaddress = "*Required";
    } else {
        $address = test_input($address);
    }

    if ($state == "") {
        $er++;
        $estate = "*Required";
    } else {
        $state = test_input($state);
    }

    if ($district == "") {
        $er++;
        $edistrict = "*Required";
    } else {
        $district = test_input($district);
    }

    if ($city == "") {
        $er++;
        $ecity = "*Required";
    } else {
        $city = test_input($city);
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

    if ($class == "") {
        $er++;
        $eclass = "*Required";
    }

    if (empty($second_language)) {
        $er++;
        $esecond_language = "*Second Language is required";
    } else {
        $second_language = test_input($second_language);
    }

    if (empty($third_language)) {
        $er++;
        $ethird_language = "*Third Language is required";
    } else {
        $third_language = test_input($third_language);
        if ($third_language == $second_language) {
            $er++;
            $ethird_language = "*Third Language must not match with Second Language";
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

    if ($prev_school_affliated == "") {
        $er++;
        $eprev_school_affliated = "*Required";
    } else {
        $prev_school_affliated = test_input($prev_school_affliated);
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

    if (empty($study_habits)) {
        $er++;
        $estudy_habits = "*Required";
    } else {
        $study_habits = test_input($study_habits);
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

   

  
    
    if ($other_interests != "") {
        $other_interests = test_input($other_interests);
        if (!preg_match("/^[a-zA-Z ]*$/", $other_interests)) {
            $er++;
            $eother_interests = "*Only letters, white space  are allowed";
        }
    }

    if (empty($transport)) {
        $er++;
        $etransport = "*Required";
    } else {
        $transport = test_input($transport);
    }




    if ($er == 0) {
        include '../includes/connect.php';
        $cstatus = 1;

        $sql = "UPDATE `tbl_student` SET `gender`='$gender',`place_of_birth`='$placeofbirth',`religion`='$religion',`caste`='$caste',`mother_tongue`='$mother_tongue',`stud_living`='$stud_living',`sibling`='$sibling',`address`='$address',`state`='$state',`district`='$district',`city`='$city',`pincode`='$pincode',`contact`='$contact',`class`='$class',`hobbies`='$hobbies',`other_interests`='$other_interests',`transport_facility`='$transport',`stud_cstatus`= '$cstatus' WHERE `email`='$email'";
        $sql1 = 'INSERT INTO `tbl_primary`(`email`, `passed_class`, `second_language`,`third_language`, `prev_school_name`, `prev_school_affliated`, `fav_subject`, `study_habits`) VALUES (
         "' . mysqli_real_escape_string($conn, $email) . '", 
        "' . mysqli_real_escape_string($conn, $passed_class) . '",
        "' . mysqli_real_escape_string($conn, $second_language) . '",
        "' . mysqli_real_escape_string($conn, $third_language) . '",
        "' . mysqli_real_escape_string($conn, $prev_school_name) . '",
        "' . mysqli_real_escape_string($conn, $prev_school_affliated) . '",
        "' . mysqli_real_escape_string($conn, $fav_subject) . '",
        "' . mysqli_real_escape_string($conn, $study_habits) . '"
        )';
        
        $query = mysqli_query($conn, $sql);
        $query1 = mysqli_query($conn, $sql1);
        if ($query && $query1) {

            $_SESSION['message'] = "Student Details Submitted Successfully!";
            $_SESSION['status'] = "success";
            $_SESSION['location'] = "primary_family_details.php";
            $email = "";
            $gender = "";
            $placeofbirth = "";
            $religion = "";
            $caste = "";
            $stud_living = "";
            $sibling = "";
            $address = "";
            $state = "";
            $district = "";
            $city = "";
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
            $other_interests = "";
            $transport = "";
            
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
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
            <!--panel-body -->
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <div class="section-title">
                                    STUDENT DETAILS
                                </div>
                            </tr>
                            <tr>
                                <td class="col-md-4">Student Name</td>
                                <td><input type="text" name="stud_name" class="form-control" value="<?php print $stud_name; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Gender <span class="require">*</span><span class="error"><br>
                                        <?php print $egender; ?></span></td>
                                <td>
                                    <?php if ($gender == "") {
                                        $query = mysqli_query($conn, "SELECT `gender` FROM tbl_option WHERE `gender` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['gender']; ?><input type="radio" class="cbox" name="gender" value="<?php echo $row1['gender']; ?>">
                                        <?php }
                                    } else {
                                        echo $gender; ?><input type="radio" class="cbox" name="gender" value="<?php echo $gender; ?>" checked><?php
                                                                                                                                                $query = mysqli_query($conn, "SELECT `gender` FROM tbl_option WHERE `gender` != '$gender'");
                                                                                                                                                while ($row1 = mysqli_fetch_array($query)) {
                                                                                                                                                ?>
                                            <?php echo $row1['gender']; ?><input type="radio" class="cbox" name="gender" value="<?php echo $row1['gender']; ?>">
                                    <?php }
                                                                                                                                            }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><input type="date" class="form-control" name="birthdate" maxlength="10" value="<?php echo $birthdate; ?>" readonly></td>
                            </tr>

                            <tr>
                                <td>Age</td>
                                <td><input type="text" class="form-control" name="age" value="<?php echo $age; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Place of Birth <span class="require">*</span><span class="error"><br>
                                        <?php print $eplaceofbirth; ?></span></td>
                                <td><input type="text" class="form-control" name="placeofbirth" value="<?php print $placeofbirth; ?>"></td>
                            </tr>
                            <tr>
                                <td>Religion <span class="require">*</span><span class="error"><br>
                                        <?php print $ereligion; ?></span></td>
                                <td><select name="religion" class="form-control">
                                        <?php
                                        if ($gender == "") {
                                        ?>
                                            <option value="">Select Religion</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT religion FROM tbl_option WHERE `religion` IS NOT NULL");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['religion']; ?>"><?php echo $row1['religion']; ?></option>
                                            <?php }
                                        } else {
                                            ?>
                                            <option value="<?php echo $religion; ?>"><?php echo $religion; ?></option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT religion FROM tbl_option WHERE `religion` != '$religion'");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['religion']; ?>"><?php echo $row1['religion']; ?></option>
                                        <?php }
                                        } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Caste <span class="require">*</span><span class="error"><br>
                                        <?php print $ecaste; ?></span></td>
                                <td><input type="text" class="form-control" name="caste" value="<?php print $caste; ?>"></td>
                            </tr>
                            <tr>
                                <td>Mother Tongue <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_tongue; ?></span></td>
                                <td><select name="mother_tongue" class="form-control">
                                        <?php
                                        if ($mother_tongue == "") { ?>
                                            <option value="">Select Your Mother Tongue</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT mother_tongue FROM tbl_option WHERE `mother_tongue` IS NOT NULL");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['mother_tongue']; ?>"><?php echo $row1['mother_tongue']; ?></option>
                                            <?php }
                                        } else {
                                            ?>
                                            <option value="<?php echo $mother_tongue; ?>"><?php echo $mother_tongue; ?></option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT mother_tongue FROM tbl_option WHERE `mother_tongue` != '$mother_tongue'");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['mother_tongue']; ?>"><?php echo $row1['mother_tongue']; ?></option>
                                        <?php }
                                        } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Student is living with <span class="require">*</span><span class="error"><br>
                                        <?php print $estud_living; ?></span></td>
                                <td>

                                    <?php if ($stud_living == "") {
                                        $query = mysqli_query($conn, "SELECT `stud_living` FROM tbl_option WHERE `stud_living` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['stud_living']; ?><input type="radio" class="cbox" name="stud_living" value="<?php echo $row1['stud_living']; ?>">
                                        <?php }
                                    } else {
                                        echo $stud_living; ?><input type="radio" class="cbox" name="stud_living" value="<?php echo $stud_living; ?>" checked><?php
                                                                                                                                                                $query = mysqli_query($conn, "SELECT `stud_living` FROM tbl_option WHERE `stud_living` != '$stud_living'");
                                                                                                                                                                while ($row1 = mysqli_fetch_array($query)) {
                                                                                                                                                                ?>
                                            <?php echo $row1['stud_living']; ?><input type="radio" class="cbox" name="stud_living" value="<?php echo $row1['stud_living']; ?>">
                                    <?php }
                                                                                                                                                            } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Do you have a sibling studying in this school? <span class="require">*</span><span class="error"><br>
                                        <?php print $esibling; ?></span></td>
                                <td>

                                    <?php if ($sibling == "") {
                                        $query = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['boolean']; ?><input type="radio" class="cbox" name="sibling" value="<?php echo $row1['boolean']; ?>">
                                        <?php }
                                    } else {
                                        echo $sibling; ?><input type="radio" class="cbox" name="sibling" value="<?php echo $sibling; ?>" checked>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` != '$sibling'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['boolean']; ?><input type="radio" class="cbox" name="sibling" value="<?php echo $row1['boolean']; ?>">
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                            <td>Contact Address <span class="require">*</span><span class="error"><br>
                                    <?php print $eaddress; ?></span></td>
                            <td><input type="text" class="form-control" name="address" value="<?php echo $address; ?>"></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td><input type="text" class="form-control" value="India" readonly></td>
                            </tr>
                            <tr>
                                <td>State <span class="require">*</span><span class="error"><br>
                                        <?php print $estate; ?></span></td>
                                </td>
                                <td><select type="text" class="form-control" name="state" id="state">
                                        <?php if ($state == "") {
                                        ?>

                                            <option value="">Select State</option>

                                        <?php } else {
                                            $st_title = mysqli_query($conn, "SELECT `state_title` FROM `tbl_state` WHERE `state_id`=$state");
                                            $st = mysqli_fetch_assoc($st_title);
                                            $state_title = $st['state_title'];
                                        ?>
                                            <option value="<?php echo $state; ?>"><?php echo $state_title; ?></option>
                                            <?php include '../includes/connect.php';
                                            $s = mysqli_query($conn, "SELECT `state_id`, `state_title` FROM `tbl_state` WHERE `state_id`!=$state");
                                            while ($rw1 = mysqli_fetch_array($s)) {
                                            ?>
                                                <option value="<?php echo $rw1['state_id']; ?>"><?php echo $rw1['state_title']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>District <span class="require">*</span><span class="error"><br>
                                        <?php print $edistrict; ?></span></td>
                                <td><select type="text" class="form-control" id="district" name="district"><?php
                                                                                                            if ($district == "") { ?>
                                        <?php } else {
                                                                                                                $di_title = mysqli_query($conn, "SELECT `district_title` FROM `tbl_district` WHERE `districtid`=$district");
                                                                                                                $di = mysqli_fetch_assoc($di_title);
                                                                                                                $district_title = $di['district_title']; ?>
                                            <option value="<?php echo $district; ?>"><?php echo $district_title; ?></option>
                                            <?php include '../includes/connect.php';
                                                                                                                $d = mysqli_query($conn, "SELECT `districtid`,`district_title` FROM `tbl_district` WHERE `districtid`!=$district AND`state_id`=$state");
                                                                                                                while ($rw2 = mysqli_fetch_array($d)) {
                                            ?>
                                                <option value="<?php echo $rw2['districtid']; ?>"><?php echo $rw2['district_title']; ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>City <span class="require">*</span><span class="error"><br>
                                        <?php print $ecity; ?></span></td>
                                <td><select class="form-control" name="city" id="city"><?php
                                                                                        if ($city == "") { ?>
                                        <?php } else {
                                                                                            $ci_title = mysqli_query($conn, "SELECT `name` FROM `tbl_city` WHERE `id`=$city AND `districtid`=$district AND `state_id`=$state");
                                                                                            $ci = mysqli_fetch_assoc($ci_title);
                                                                                            $city_title = $ci['name']; ?>
                                            <option value="<?php echo $city; ?>"><?php echo $city_title; ?></option>
                                            <?php include '../includes/connect.php';
                                                                                            $c = mysqli_query($conn, "SELECT `id`,`name` FROM `tbl_city` WHERE `id`!=$city AND `districtid`=$district AND`state_id`=$state");
                                                                                            while ($rw3 = mysqli_fetch_array($c)) {
                                            ?>
                                                <option value="<?php echo $rw3['id']; ?>"><?php echo $rw3['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Pincode <span class="require">*</span><span class="error"><br>
                                        <?php print $epincode; ?></span></td>
                                <td><input type="text" class="form-control" name="pincode" value="<?php print $pincode; ?>"></td>
                            </tr>
                            <tr>
                                <td>Contact <span class="require">*</span><span class="error"><br>
                                        <?php print $econtact; ?></span></td>
                                <td><input type="text" class="form-control" name="contact" value="<?php print $contact; ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" name="email" value="<?php print $email; ?>" readonly> </td>
                            </tr>
                            <tr>
                                <td>Admission for the grade <span class="require">*</span></td>
                                <td><select name="class" class="form-control" id="class" onclick="getpassedclass();" value="<?php print $class; ?>">
                                        <?php if ($class == "") { ?>
                                            <option value="">Select Class</option>
                                            <?php $query = mysqli_query($conn, "SELECT primary_class FROM tbl_option WHERE primary_class IS NOT NULL");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['primary_class']; ?>"><?php echo $row1['primary_class']; ?></option>
                                            <?php }
                                        } else {
                                            ?>
                                            <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT primary_class FROM tbl_option WHERE primary_class != '$class'");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row1['primary_class']; ?>"><?php echo $row1['primary_class']; ?></option>
                                        <?php }
                                        } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Grade Completed</td>
                                <td><input type="text" class="form-control" name="passed_class" id="passedclass" value="<?php echo $passed_class; ?>" readonly></td>
                            </tr>

                            <tr>
                                <td>Second Language Prefered <span class="require">*</span></td>
                                <td><?php if ($second_language == "") {
                                        $query = mysqli_query($conn, "SELECT `language` FROM tbl_option WHERE `language` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['language']; ?><input type="radio" class="cbox" name="second_language" value="<?php echo $row1['language']; ?>">
                                        <?php }
                                    } else {
                                        echo $second_language; ?><input type="radio" class="cbox" name="second_language" value="<?php echo $second_language; ?>" checked>
                                        <?php $query = mysqli_query($conn, "SELECT `language` FROM tbl_option WHERE `language` != '$second_language'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['language']; ?><input type="radio" class="cbox" name="second_language" value="<?php echo $row1['language']; ?>">
                                    <?php }
                                    }
                                    ?></td>
                            </tr>
                            
                            <tr>
                                <td>Third Language Prefered <span class="require">*</span><span class="error"><br>
                                        <?php print $ethird_language; ?></span></td>
                                <td><?php if ($third_language == "") {
                                        $query = mysqli_query($conn, "SELECT `language` FROM tbl_option WHERE `language` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['language']; ?><input type="radio" class="cbox" name="third_language" value="<?php echo $row1['language']; ?>">
                                        <?php }
                                    } else {
                                        echo $third_language; ?><input type="radio" class="cbox" name="third_language" value="<?php echo $third_language; ?>" checked>
                                        <?php $query = mysqli_query($conn, "SELECT `language` FROM tbl_option WHERE `language` != '$third_language'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['language']; ?><input type="radio" class="cbox" name="third_language" value="<?php echo $row1['language']; ?>">
                                    <?php }
                                    } ?></td>
                            </tr>

                            <tr>
                                <td>Previous School Name <span class="require">*</span><span class="error"><br>
                                        <?php print $eprev_school_name; ?></span></td>
                                <td><input type="text" class="form-control" name="prev_school_name" value="<?php print $prev_school_name; ?>"></td>
                            </tr>
                            <tr>
                                <td>Previous School Affliated To <span class="require">*</span><span class="error"><br>
                                        <?php print $eprev_school_affliated; ?></span></td>
                                <td><?php if ($prev_school_affliated == "") {
                                        $query = mysqli_query($conn, "SELECT prev_school_affliated FROM tbl_option WHERE prev_school_affliated IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['prev_school_affliated']; ?><input type="radio" class="cbox" name="prev_school_affliated" value="<?php echo $row1['prev_school_affliated']; ?>">
                                        <?php }
                                    } else {
                                        echo $prev_school_affliated; ?><input type="radio" class="cbox" name="prev_school_affliated" value="<?php echo $prev_school_affliated; ?>" checked>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT `prev_school_affliated` FROM tbl_option WHERE `prev_school_affliated` != '$prev_school_affliated'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['prev_school_affliated']; ?><input type="radio" class="cbox" name="prev_school_affliated" value="<?php echo $row1['prev_school_affliated']; ?>">
                                    <?php }
                                    } ?></td>
                            </tr>

                            <tr>
                                <td>Favorite Subjects <span class="require">*</span><span class="error"><br>
                                        <?php print $efav_subject; ?></span></td>
                                <td><input type="text" class="form-control" name="fav_subject" value="<?php print $fav_subject; ?>" ></td>
                            </tr>

                            <tr>
                                <td>Student's Study Habits <span class="require">*</span><span class="error"><br>
                                        <?php print $estudy_habits; ?></span></td>
                                <td><?php if ($study_habits == "") {
                                        $query = mysqli_query($conn, "SELECT `study_habits` FROM tbl_option WHERE `study_habits` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['study_habits']; ?><input type="radio" class="cbox" name="study_habits" value="<?php echo $row1['study_habits']; ?>">
                                        <?php }
                                    } else {
                                        echo $study_habits; ?><input type="radio" class="cbox" name="study_habits" value="<?php echo $study_habits; ?>" checked>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT `study_habits` FROM tbl_option WHERE `study_habits` != '$study_habits'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['study_habits']; ?><input type="radio" class="cbox" name="study_habits" value="<?php echo $row1['study_habits']; ?>">
                                    <?php }
                                    } ?></td>
                            </tr>

                            <tr>
                                <td>Hobbies <span class="require">*</span><span class="error"><br>
                                        <?php print $ehobbies; ?></span></td>
                                <td><input type="text" class="form-control" name="hobbies" value="<?php print $hobbies; ?>" ></td>
                            </tr>


                            <tr>
                                <td>Other Interests<span class="error"><br>
                                        <?php print $eother_interests; ?></span></td>
                                <td><input type="text" class="form-control" name="other_interests" value="<?php print $other_interests; ?>"></td>
                            </tr>

                            <tr>
                                <td>Would the student avail transport facility provided by the school <span class="require">*</span><span class="error"><br>
                                        <?php print $etransport; ?></span></td>
                                <td><?php if ($transport == "") {
                                        $query = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` IS NOT NULL");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                            <?php echo $row1['boolean']; ?><input type="radio" class="cbox" name="transport_facility" value="<?php echo $row1['boolean']; ?>">
                                        <?php }
                                    } else {
                                        echo $transport; ?><input type="radio" class="cbox" name="transport_facility" value="<?php echo $transport; ?>" checked>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT `boolean` FROM tbl_option WHERE `boolean` != '$transport'");
                                        while ($row1 = mysqli_fetch_array($query)) {
                                        ?>
                                            <?php echo $row1['boolean']; ?><input type="radio" class="cbox" name="transport_facility" value="<?php echo $row1['boolean']; ?>">
                                    <?php }
                                    } ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="checkbox">
            <input type="checkbox" name="agree" required> I agree that the following information are true.
        </div>

        <input type="reset" class="btn btn-warning" name="reset" value="Reset">
        <input type="submit" class="btn btn-info" name="submit" value="Submit">

    </form>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        function getpassedclass() {
            var Class = document.getElementById("class").value;
            
            if (Class == "1") {
                    document.getElementById("passedclass").value = "UKG";
                } else if (Class == "2") {
                    document.getElementById("passedclass").value = "1";    
                } 
                else if (Class == "3") {
                    document.getElementById("passedclass").value = "2";
                } else if (Class == "4") {
                    document.getElementById("passedclass").value = "3";
                    
                }else {
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
    <?php
    include '../includes/redirect.php';
    include '../includes/footer.php';
    ?>

</body>

</html>