<?php include '../includes/config.php' ?>
</head>
<link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/studentcss.css?v=<?= $version ?>">
</head>
<?php include 'includes/header.php';
    ?>
        <div class="panel-body">
            <!--panel-body -->
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>

                                <td colspan="3">
                                    <h3>
                                        <center>FEE STRUCTURE</center>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td>ADMISSION TYPE</td>
                                <td>ADMISSION FEE</td>
                                <td>TUITION FEE</td>
                            </tr>
                            <?php
                  include '../includes/connect.php';
    $SELECTquery = mysqli_query($conn, "SELECT * FROM `tbl_amount`");
				if (mysqli_num_rows($SELECTquery) > 0) {
					while ($row = mysqli_fetch_assoc($SELECTquery)) {
                        $admission_type[]=$row['admission_type'];

				?>
						<tr>
						
							<td><?php echo $row['admission_type']; ?></td>
                            <td><input type="text"  class="form-control" name="admission_fee[]" value="<?php echo $row['admission_fee'];  ?>" ></td>
                            <td><input type="text"  class="form-control" name="tuition_fee[]" value="<?php echo $row['tuition_fee'];  ?>" ></td>

                    </tr>
                    <?php
                    }
                }
                ?>
               
                        </tbody>
                    </table>
                    <center><input type="submit" class="btn btn-info" name="update" value="UPDATE"></center>
                    </form>
                </div>
                </div>
                </div>
                <?php include '../includes/redirect.php'; ?>
                <?php 
          
    session_start();
if(isset($_POST['update']))
{
    $admission_fee=$_POST['admission_fee'];
    $tuition_fee=$_POST['tuition_fee'];
    $size=sizeof($admission_fee);
    $cnt=1;
    for($i = 0; $i<$size ; $i++)
    {
    $sql ="UPDATE `tbl_amount` SET `admission_fee`='$admission_fee[$i]',`tuition_fee`='$tuition_fee[$i]' WHERE admission_type='".$admission_type[$i]."'"; 
    $amount_query = mysqli_query($conn, $sql);
    echo "<meta http-equiv='refresh' content='0'>";
      if($amount_query)
      {

        $_SESSION['message'] = "Amount Updated Successfully!";
        $_SESSION['status'] = "success";
        $_SESSION['location']="amount.php";
      }
    }
 }
?>

