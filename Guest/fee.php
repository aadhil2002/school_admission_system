
<!DOCTYPE html>
<html>

<head>
    <title>FEE STRUCTURE</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/Arafalogo.ico">
    <style>
     table,th,td{
        border:1px solid grey;
        border-collapse:collapse;
    }
    table{
        margin:auto;
        margin-top:60px;
        height: 250px;
        width: 1350px;
    }
th,td{
    padding: 10px;
}
td{
    text-align: center;
}
h1{
    text-align: center;
    margin-top:100px;
}
footer{
    margin-top: 150px;
}
</style>
</head>

<body>
<?php include '../includes/header_home.php';?>
   <h1>FEE STRUCTURE</h1>
    <table>
        <tr>
            <th>CLASS</th>
            <th>ADMISSION FEE<br>(in Rupees)</th>
            <th>TUITION FEE<br>(in Rupees)</th>
            <th>YEARLY DEVELOPMENT CHARGES<br>(in Rupees)</th>
            <th>ANNUAL/MONTHLY OTHER CHARGES FOR OTHER FACILITIES<br>(in Rupees)</th>
        </tr>
        <?php
        include '../includes/connect.php';
$fee = mysqli_query($conn, "SELECT * FROM `tbl_amount` ORDER BY `tuition_fee`");
while($f = mysqli_fetch_assoc($fee)) {
?>
        <tr>
            <th><?php echo $f['stud_type']; ?></th>
            <td><?php echo $f['admission_fee']; ?></td>
            <td><?php echo $f['tuition_fee']; ?></td>
            <td>1200</td>
            <td>0</td>
        </tr>
        <?php
}
?>
    </table>
    <script>
    const h1 = document.querySelector("#fee");
    h1.style.backgroundColor = "#a6a8a6";
</script> 
<?php include '../includes/footer_home.php';?>
</body>

</html>