<?php
session_start();
$i=1;
include '../includes/connect.php';
$stud_email = $_SESSION["email"];
$type = $_SESSION["admission_type"];
$query = mysqli_query($conn, "SELECT  `name`, `complaint`, `reply`, `complaint_status` FROM `tbl_complaint` WHERE  email='$stud_email' AND type='$type'");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="../css/complaint.css?v=<?= $version ?>" type='text/css' />
    <style>
           table{
            height:50px;
            width:520px;
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
        
		.footer-social-icons{
			margin-left: 20%;
		}
    </style>

</head>

<body>

<?php include 'header.php'; ?>
    <div class="bg-img">
        <div class="content">
            <h1 class="agile_head text-center">Complaint View</h1>
            <table  id="table_field">
                <tbody>
                    <tr>
                        <td>SI.No</td>
                        <td>Name</td>
                        <td>Complaint</td>
                        <td>Reply</td>
                    </tr>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            if ($row['complaint_status'] == 0) {
                                $message = "Your Complaint is under process";
                                $color = "blue";
                            } else {
                                $message = $row['reply'];
                                $color = "";
                            }
                    ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['complaint']; ?></td>
                                <td style="color:<?php echo $color; ?>"><?php echo $message; ?></td>


                            </tr>
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
</body>
<?php include('../includes/footer.php'); ?>

</html>