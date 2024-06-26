
<?php
include '../includes/connect.php';
$state_id="";
$district_id="";
$city="";
if(isset($_POST['save']))
{
$state_id=$_POST['state'];
$district_id=$_POST['district'];
$city=$_POST['city'];
$sql="INSERT INTO `tbl_city`( `name`, `districtid`, `state_id`, `status`) VALUES ('$city','$district_id','$state_id','Active')";
$query = mysqli_query($conn, $sql);
if ($query) {
    session_start();
    $_SESSION['message'] = "New City Added Successfully!";
    $_SESSION['status'] = "success";
    $state_id="";
$district_id="";
$city="";
 
} else {
    print '<span class= "errorMessage">' . mysqli_error($conn) . '</span>';
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
    .col-md-6{
        margin-top: 20%;
        margin-left: 20%;
    }
    input[type="submit"],input[type="reset"] {
    background-position: relative;
    border: none;
    color: #fff;
    padding: 10px 50px;
    outline: none;
}
#save{
    margin-left: 300px;
    margin-right: 20px;
}
input[type="submit"]:hover,input[type="reset"]:hover{
    cursor: hand;
}

</style>
</head>
<body>
    <form action="" method="POST">
        <?php include 'includes/header.php'; ?>
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
                                <td>City</td>
                                <td><input type="text" class="form-control" name="city"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <input type="submit" class="btn btn-info" name="save" id="save" value="Save" />
                                <input type="submit" class="btn btn-info" name="cancel"  value="Cancel" /></td>
       
                                
                            </tr>

                            </tbody>
                            </table> 
            
                            </div>
                            
                            </form>
                            
                           
                            
                            <script src="js/jquery-3.5.1.min.js"></script>
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

        loadState();
    </script>
    <?php include '../includes/redirect.php'; ?>                      
</body>
</html>
                          