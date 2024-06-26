<?php
include '../includes/connect.php';
session_start();
$stud_email = $_SESSION["email"];
$g = mysqli_query($conn, "SELECT `stud_living` FROM `tbl_student` WHERE `email`='" . $stud_email . "'");
$gu = mysqli_fetch_assoc($g);
$guardian = $gu['stud_living'];
$s = mysqli_query($conn, "SELECT `sibling` FROM `tbl_student` WHERE `email`='" . $stud_email . "'");
$su = mysqli_fetch_assoc($s);
$sibling = $su['sibling'];
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

$guardian_name = "";
$guardian_address = "";
$guardian_email = "";
$guardian_phonenumber = "";

$sibling_name = "";
$sibling_age = "";
$sibling_institution = "";
$sibling_class = "";


$efather_name = "";
$efather_qualification = "";
$efather_profession = "";
$efather_phonenumber = "";
$efather_email = "";
$efather_annualincome = "";

$emother_name = "";
$emother_qualification = "";
$emother_profession = "";
$emother_phonenumber = "";
$emother_email = "";
$emother_annualincome = "";
$erole_of_parent = "";

$eguardian_name = "";
$eguardian_address = "";
$eguardian_email = "";
$eguardian_phonenumber = "";

$esibling_name = "";
$esibling_age = "";
$esibling_institution = "";
$esibling_class = "";




if (isset($_POST['submit'])) {
    $father_name = $_POST['father_name'];
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


    if ($guardian == "Guardian") {
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
        $size = sizeof($sibling_name);

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
                    $esibling_age[$i] = " ";
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




    if ($er == 0) {

        $cstatus = 1;
        $type = "Primary";
        $sql = 'INSERT INTO `tbl_family`(`email`, `admission_type`, `father_name`, `father_qualification`, `father_profession`, `father_phonenumber`, `father_email`, `father_annualincome`, `mother_name`, `mother_qualification`, `mother_profession`, `mother_phonenumber`, `mother_email`, `mother_annualincome`, `role_of_parent`, `cstatus`) VALUES (
            "' . mysqli_real_escape_string($conn, $stud_email) . '",
            "' . $type . '", 
            "' . mysqli_real_escape_string($conn, $father_name) . '", 
            "' . mysqli_real_escape_string($conn, $father_qualification) . '",
            "' . mysqli_real_escape_string($conn, $father_profession) . '", 
            "' . mysqli_real_escape_string($conn, $father_phonenumber) . '",
            "' . mysqli_real_escape_string($conn, $father_email) . '",
            "' . mysqli_real_escape_string($conn, $father_annualincome) . '",
            "' . mysqli_real_escape_string($conn, $mother_name) . '",
            "' . mysqli_real_escape_string($conn, $mother_qualification) . '",
            "' . mysqli_real_escape_string($conn, $mother_profession) . '",
            "' . mysqli_real_escape_string($conn, $mother_phonenumber) . '",
            "' . mysqli_real_escape_string($conn, $mother_email) . '",
            "' . mysqli_real_escape_string($conn, $mother_annualincome) . '",
            "' . mysqli_real_escape_string($conn, $role_of_parent) . '",
            "' . $cstatus . '"
            )';
        $query = mysqli_query($conn, $sql);
        if ($sibling == "Yes") {


            for ($i = 0; $i < $size; $i++) {
                $sql1 = 'INSERT INTO `tbl_sibling`(`email`,`admission_type`, `sibling_name`, `sibling_age`, `sibling_class`) VALUES (
                "' . mysqli_real_escape_string($conn, $stud_email) . '",
                "' . $type . '",
                "' . mysqli_real_escape_string($conn, $sibling_name[$i]) . '", 
                "' . mysqli_real_escape_string($conn, $sibling_age[$i]) . '",
                "' . mysqli_real_escape_string($conn, $sibling_class[$i]) . '"
                )';

                mysqli_query($conn, $sql1);
            }
        }
        if ($guardian == "Guardian") {


            $sql2 = 'INSERT INTO `tbl_guardian`(`email`,`admission_type`, `guardian_name`, `guardian_address`, `guardian_email`, `guardian_contact`) VALUES (
           "' . mysqli_real_escape_string($conn, $stud_email) . '",
           "' . $type . '",
           "' . mysqli_real_escape_string($conn,  $guardian_name) . '", 
           "' . mysqli_real_escape_string($conn,  $guardian_address) . '",
           "' . mysqli_real_escape_string($conn, $guardian_email) . '", 
           "' . mysqli_real_escape_string($conn,  $guardian_phonenumber) . '"
           )';

            mysqli_query($conn, $sql2);
        }
        if ($query) {

            $_SESSION['message'] = "Family Details Submitted Successfully!";
            $_SESSION['status'] = "success";
            $_SESSION['location'] = "primary_upload_details.php";

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

            $sibling_name = "";
            $sibling_age = "";
            $sibling_class = "";

            $guardian_name = "";
            $guardian_address = "";
            $guardian_email = "";
            $guardian_phonenumber = "";
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
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
    <script src="../js/jquery-3.1.1.min.js?v=<?= $version ?>"></script>
    <script src="../js/bootstrap.min.js?v=<?= $version ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var html = '<tr><td><input class="form-control" type="text" name="sibling_name[]"></td><td><input class="form-control" type="text" name="sibling_age[]"></td><td><input class="form-control" type="text" name="sibling_class[]"></td><td class="remove"><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"> </td></tr>';
            var max = 3;
            var x = 1;
            $("#add").click(function() {
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }

            });
            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                x--;
            });


        });
    </script>


</head>

<body>
    <?php include 'header.php'; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
            <!--panel-body -->
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered table-striped" id="table_field">
                        <tbody>
                            <tr>
                                <div class="section-title">
                                    FAMILY DETAILS
                                </div>
                            </tr>
                            <tr>

                                <td colspan="4">
                                    <h4>
                                        FATHER'S DETAILS
                                    </h4>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">Father's Name <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_name; ?></span></td>
                                <td colspan="2"><input type="text" name="father_name" value="<?php print $father_name; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Qualification <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_qualification; ?></span></td>
                                <td colspan="2">
                                    <input type="text" name="father_qualification" value="<?php print $father_qualification; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Profession <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_profession; ?></span>
                                </td>
                                <td colspan="2"> <input type="text" name="father_profession" value="<?php print $father_profession; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Phone Number <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_phonenumber; ?></span></td>
                                <td colspan="2"><input type="text" name="father_phonenumber" value="<?php print $father_phonenumber; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Email <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_email; ?></span></td>
                                <td colspan="2"><input type="text" name="father_email" value="<?php print $father_email; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Annual Income <span class="require">*</span><span class="error"><br>
                                        <?php print $efather_annualincome; ?></span></td>
                                <td colspan="2"><input type="text" name="father_annualincome" value="<?php print $father_annualincome; ?>"></td>
                            </tr>
                            <tr>

                                <td colspan="4">
                                    <h4>
                                        MOTHER'S DETAILS
                                    </h4>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">Mother's Name <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_name; ?></span></td>
                                <td colspan="2"><input type="text" name="mother_name" value="<?php print $mother_name; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Qualification <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_qualification; ?></span></td>
                                <td colspan="2">
                                    <input type="text" name="mother_qualification" value="<?php print $mother_qualification; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Profession <span class="require">*</span><span class=" error"><br>
                                        <?php print $emother_profession; ?></span>
                                </td>
                                <td colspan="2"> <input type="text" name="mother_profession" value="<?php print $mother_profession; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Phone Number <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_phonenumber; ?></span></td>
                                <td colspan="2"><input type="text" name="mother_phonenumber" value="<?php print $mother_phonenumber; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Email <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_email; ?></span></td>
                                <td colspan="2"><input type="text" name="mother_email" value="<?php print $mother_email; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Annual Income <span class="require">*</span><span class="error"><br>
                                        <?php print $emother_annualincome; ?></span></td>
                                <td colspan="2"><input type="text" name="mother_annualincome" value="<?php print $mother_annualincome; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">What according to you should be the role of a parent in child’s education? <span class="require">*</span><span class="error"><br>
                                        <?php print $erole_of_parent; ?></span></td>
                                <td colspan="2"><input type="text" name="role_of_parent" value="<?php print $role_of_parent; ?>"></td>
                            </tr>
                            <?php

                            if ($guardian == "Guardian") {

                            ?>
                                <tr>


                                    <td colspan="4">
                                        <h4>
                                            GUARDIAN'S DETAILS
                                        </h4>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2">Guardian's Name <span class="require">*</span><span class="error"><br>
                                            <?php print $eguardian_name; ?></span></td>
                                    <td colspan="2"><input type="text" name="guardian_name" value="<?php print $guardian_name; ?>"></td>
                                </tr>

                                <tr>
                                    <td colspan="2">Address <span class="require">*</span><span class=" error"><br>
                                            <?php print $eguardian_address; ?></span>
                                    </td>
                                    <td colspan="2"> <input type="text" name="guardian_address" value="<?php print $guardian_address; ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Email <span class="require">*</span><span class="error"><br>
                                            <?php print $eguardian_email; ?></span></td>
                                    <td colspan="2"><input type="text" name="guardian_email" value="<?php print $guardian_email; ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Phone Number <span class="require">*</span><span class="error"><br>
                                            <?php print $eguardian_phonenumber; ?></span></td>
                                    <td colspan="2"><input type="text" name="guardian_phonenumber" value="<?php print $guardian_phonenumber; ?>"></td>
                                </tr>
                            <?php
                            }
                            if ($sibling == "Yes") {
                            ?>

                                <tr>


                                    <td>
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
                                    <th>
                                        <center>Add or Remove</center>
                                    </th>
                                </tr>
                                <?php
                                if ($er == 0) {
                                ?>
                                    <tr>

                                        <td><input type="text" name="sibling_name[]"></td>
                                        <td><input type="text" name="sibling_age[]"></td>
                                        <td><input type="text" name="sibling_class[]"></td>
                                        <td><input class="btn btn-warning" type="button" id="add" value="Add"> </td>
                                    </tr>
                                    <?php
                                } else {
                                    for ($i = 0; $i < $size; $i++) {
                                    ?>
                                        <tr>
                                            <td><input type="text" class="bottom-margin" name="sibling_name[]" value="<?php echo $sibling_name[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_name[$i]; ?></span></td>
                                            <td><input type="text" class="bottom-margin" name="sibling_age[]" value="<?php echo $sibling_age[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_age[$i]; ?></span></td>
                                            <td><input type="text" class="bottom-margin" name="sibling_class[]" value="<?php echo $sibling_class[$i]; ?>"><span class="error"><br>
                                                    <?php print $esibling_class[$i]; ?></span></td>
                                            <?php if ($i == 0) { ?>
                                                <td><input class="btn btn-warning" type="button" id="add" value="Add"> </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><input class="btn btn-danger" type="button" id="remove" value="Remove"> </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="checkbox">
            <input type="checkbox" id="checkbox" name="agree" required> I agree that the following information are true.
        </div>

        <input type="reset" class="btn btn-warning" value="Reset">
        <input type="submit" class="btn btn-info" name="submit" value="Submit">

    </form>
    <?php include '../includes/redirect.php';
    include '../includes/footer.php'; ?>
</body>

</html>