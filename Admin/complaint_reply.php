<?php
session_start();
include '../includes/connect.php';
if(isset($_POST['send']))
{
    $id=$_POST['cid'];
    $reply=$_POST['reply'];
    $status="1";
    $sql ="UPDATE `tbl_complaint` SET `reply`='".$reply."',`complaint_status`='$status' WHERE id='$id'"; 
    $reply_query = mysqli_query($conn, $sql);
      if($reply_query)
      {
        $_SESSION['message'] = "Reply Sent Successfully!";
        $_SESSION['status'] = "success";
        $_SESSION['location'] = "complaint_reply.php";
      }
      else{
        $_SESSION['message'] = "Please Enter Your Reply!";
        $_SESSION['status'] = "error";
        $_SESSION['location'] = "complaint_reply.php";
    }
    }
 
$i=1;

$query = mysqli_query($conn, "SELECT *  FROM `tbl_complaint`");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="css/complaint.css?v=<?= $version ?>" type='text/css' />
    <style>
        table{
        margin-left: 90px;
        }
        table,th,td{
        border: 2px solid black;
        border-collapse: collapse;

        }
        td{
            padding: 10px;
            color:black;
            font-weight:600;
        }
    </style>

</head>

<body>

    <?php include 'includes/header.php'; ?>
    <div class="bg-img">
        <div class="content">
            <h1 class="agile_head text-center">Complaints</h1>
            <table  id="table_field">
                <tbody>
                    <tr>
                        <td>SI.No</td>
                        <td>Complainer Name</td>
                        <td>Complainer Type</td>
                        <td>Complaint</td>
                        <td>Reply</td>
                        <td>Action</td>
                    </tr>
                    
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {

                    ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['complaint']; ?></td>
                                
                                <td>
                                    <?php 
                                 
                                if($row['complaint_status']==1)
                                {
                                    echo $row['reply'];
                                    ?> 
                                    </td>
                                    <td>Reply Sented</td>
                                    </tr>
                                    <?php
                           
                                }
                                else
                                {
                                    ?>
                                    <form action="" method="POST">
                                    <input type="hidden" name="cid" value="<?php echo $row["id"];?>">
                                    <input type="text" id="reply" name="reply">
                                </td>
                                    <td>
                                    <input type="submit" name="send" value="SEND">
                                    </td>
                                </form>
                                </tr>
                                    <?php
                                }
                                ?>
                                
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

    </div>
    </div>
    <?php include('../includes/redirect.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>
