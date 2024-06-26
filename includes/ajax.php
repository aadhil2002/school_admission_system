<?php

include('connect.php');

$stateId = isset($_POST['stateId']) ? $_POST['stateId'] : 0;
$districtId = isset($_POST['districtId']) ? $_POST['districtId'] : 0;
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {
    case "state":
        $statement = "SELECT state_id,state_title FROM tbl_state";
        $dt = mysqli_query($conn, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            echo $result1 = "<option value=" . $result['state_id'] . ">" . $result['state_title'] . "</option>";
        }
        break;

    case "district":
        $result1 = "<option value=''>Select District</option>";
        $statement = "SELECT districtid,district_title FROM tbl_district WHERE state_id=" . $stateId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['districtid'] . ">" . $result['district_title'] . "</option>";
        }
        echo $result1;
        break;

    case "city":
        $result1 = "<option value=''>Select City</option>";
        $statement = "SELECT id, name FROM tbl_city WHERE districtid=" . $districtId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        echo $result1;
        break;
}

exit();
?>