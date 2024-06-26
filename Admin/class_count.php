
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
                <div class="col-md-4">
                    <form action="" method="POST">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>

                                <td colspan="2">
                                    <h3>
                                        <center>CLASS COUNT</center>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td><center>CLASS</center></td>
                                <td><center>AVAILABLE COUNT</center></td>
                            </tr>
                            <?php
                  include '../includes/connect.php';
    $SELECTquery = mysqli_query($conn, "SELECT * FROM `tbl_class_count`");
				if (mysqli_num_rows($SELECTquery) > 0) {
					while ($row = mysqli_fetch_assoc($SELECTquery)) {
                        $class[]=$row['class'];

				?>
						<tr>
						
							<td><center><?php echo $row['class']; ?></center></td>
                            <td><input type="text" style="margin-left:120px; width:75px" class="form-control" name="count[]" value="<?php echo $row['aval_count'];  ?>"></td>

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
    $count=$_POST['count'];
    $size=sizeof($count);
    $cnt=1;
    for($i = 0; $i<$size ; $i++)
    {
    $sql ="UPDATE `tbl_class_count` SET `aval_count`='$count[$i]' WHERE class='".$class[$i]."'"; 
    $class_query = mysqli_query($conn, $sql);
    echo "<meta http-equiv='refresh' content='0'>";
      if($class_query)
      {

        $_SESSION['message'] = "Class Count Updated Successfully!";
        $_SESSION['status'] = "success";
      }
    }
 }
?>

