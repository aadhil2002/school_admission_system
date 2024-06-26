<?php
session_start();
include '../includes/connect.php';
if (isset($_POST["btnsave"])) {
    $eid = $_POST["txtid"];
    $city = $_POST["txtcity"];
    if ($eid != "") {
        if (mysqli_query($conn, "UPDATE tbl_city SET name='" . $city . "'WHERE id='" . $eid . "'")) {
            $_SESSION['message'] = "City Was Updated Successfully!";
            $_SESSION['status'] = "success";
            $_SESSION['location'] = "city.php";
        } else {
            $_SESSION['message'] = "Failed!";
            $_SESSION['status'] = "error";
            $_SESSION['location'] = "city.php";
        }
    }
}
?>
<?php
if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $query = mysqli_query($conn, "DELETE FROM tbl_city WHERE id='" . $did . "'");
    if ($query) {
        $_SESSION['message'] = "City Was Deleted Successfully!";
        $_SESSION['status'] = "success";
        $_SESSION['location'] = "city.php";
    } else {
        $_SESSION['message'] = "Deletion Failed!";
        $_SESSION['status'] = "error";
        $_SESSION['location'] = "city.php";
    }
}
?>
<?php
$ename = "";
$cityid = "";
if (isset($_GET["eid"])) {
    $eid = $_GET["eid"];
    $row = mysqli_query($conn, "SELECT * FROM tbl_city where id='" . $eid . "'");
    if ($results = mysqli_fetch_assoc($row)) {
        $cityid = $results["id"];
        $ename = $results["name"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/config.php' ?>

    <link rel="stylesheet" href="css/bootstrap.min.css?v=<?= $version ?>">
    <style>
        input[type="submit"],
        input[type="reset"] {
            background-position: relative;
            border: none;
            color: #fff;
            padding: 10px 50px;
            outline: none;
        }

        #view {
            margin-left: 300px;
            margin-right: 20px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            cursor: hand;
        }

        .col-md-6 {
            margin-top: 3%;
            margin-left: 20%;
        }

        .col-md-12 {
            margin-top: 8%;
        }
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <form action="" method="POST">
        <div class="col-md-6">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>State</td>
                        <td><select type="text" class="form-control" name="state" id="state" required>
                                <option value="">Select State</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td><select type="text" class="form-control" id="district" name="district" required></select></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="btn btn-info" name="view" id="view" value="View" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

    <form id="form1" name="form1" method="POST" action="">
        <div class="col-md-6">
            <table class="table table-bordered table-striped">
                <tbody>

                    <tr>

                        <td>City</td>
                        <input type="hidden" name="txtid" value="<?php echo $cityid; ?>" />
                        <td>
                            <input type="text" class="form-control" name="txtcity" value="<?php echo $ename; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btnsave" class="btn btn-info" value="Save" />
                            <input type="submit" name="btncancel" class="btn btn-danger" value="Cancel" />
                        </td>
                    </tr>
                </tbody>
            </table>
    </form>
    <?php
    include '../includes/connect.php';
    $district = "";
    $state = "";
    if (isset($_POST['view'])) {
        $district = $_POST['district'];
        $state = $_POST['state'];
        $selQry = "SELECT `name`,`id` FROM `tbl_city` WHERE `districtid`='$district' AND `state_id`='$state'";
        $rows = $conn->query($selQry);
        if ($rows->num_rows > 0) {
            $i = 0;
    ?>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <center>SI NO</center>
                            </th>
                            <th>
                                <center>City</center>
                            </th>
                            <th colspan="2">
                                <center>Action</center>
                            </th>
                        </tr>
                        <?php
                        while ($result = $rows->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $i; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $result["name"]; ?></center>
                                </td>
                                <form action="" method="GET">
                                    <td><a href="city.php?eid=<?php echo $result["id"]; ?>" style="margin-right:50px;margin-left:30%">Edit </a><a href="city.php?did=<?php echo $result["id"]; ?>"> Delete</a></td>
                                </form>
                    <?php
                        }
                    }
                }
                    ?>
                    </tbody>
                </table>

            </div>
            <?php include 'includes/footer.php'; ?>
            <script src="../js/jquery-3.5.1.min.js"></script>
            <script type="text/javascript">
                <?php include '../includes/connect.php'; ?>
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

                loadState();
            </script>
            <?php include '../includes/redirect.php'; ?>
</body>

</html>