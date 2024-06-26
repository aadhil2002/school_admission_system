<?php
session_start();
$card_holder = "";
$card_number = "";
$exp_month = "";
$exp_year = "";
$cvv = "";

$ecard_holder = "";
$ecard_number = "";
$eexp_month = "";
$eexp_year = "";
$ecvv = "";
$stud_email=$_SESSION["email"];
$months = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

if (isset($_POST['submit'])) {
    $er = 0;
    $card_holder = $_POST['card_holder'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    if ($card_holder == "") {
        $er++;
        $ecard_holder = "*Required";
    } else {
        $card_holder = test_input($card_holder);
        if (!preg_match("/^[a-zA-Z ]*$/", $card_holder)) {
            $er++;
            $ecard_holder = "*Only letters and white space allowed";
        }
    }
    if ($card_number == "") {
        $er++;
        $ecard_number = "*Required";
    }else{
        $card_number = test_input($card_number);
        if (!preg_match("/^[+0-9]*$/", $card_number)) {
            $er++;
            $ecard_number = "*Only numbers are allowed";
        } else if (strlen($card_number) < 16) {
            $er++;
            $ecard_number = "*Card Number must contain 16 digits";
        } else {
            $ecard_number = "";
        }
    } 
    
    if ($exp_year == "") {
        $er++;
        $eexp_year = "*Required";
    } 
    else
    { 
        $exp_year = test_input($exp_year);
        $year = date("Y"); 
        if (!preg_match("/^[+0-9]*$/", $exp_year)) {
            $er++;
            $eexp_year = "*Only numbers are allowed";
        } else if (strlen($exp_year) < 4) {
            $er++;
            $eexp_year = "*Expiry Year must contain 4 digits";
        }
        else if ($year>$exp_year)
        {
            $eexp_year = "*Please enter a valid expiry year";
            $er++;
        } 
        else {
            $eexp_year = "";
        }
        
    }

    if ($exp_month == "") {
        $er++;
        $eexp_month = "*Required";
    }
    else
    {
        $exp_month = test_input($exp_month);
        $year = date("Y");
        $month = date("m");
        if (!preg_match("/^[+0-9]*$/", $exp_month)) {
            $er++;
            $eexp_month = "*Only numbers are allowed";
        } else if (strlen($exp_month) < 2) {
            $er++;
            $eexp_month = "*Expiry Month must contain 2 digits";
        }
        else if (in_array($exp_month, $months) === false)
        {
            $eexp_month ="*Please enter a valid expiry month";
            $er++;
        }
        else if ($year == $exp_year && $month >= $exp_month)
        {
            $eexp_month ="*Please enter a valid expiry month";
            $er++;
        } 
        else {
            $eexp_month = "";
        }
        
    } 
    
    
    if ($cvv == "") {
        $er++;
        $ecvv = "*Required";
    }
        else {
            $cvv = test_input($cvv);
        if (!preg_match("/^[+0-9]*$/", $cvv)) {
            $er++;
            $ecvv = "*Only numbers are allowed";
        } else if (strlen($cvv) < 3) {
            $er++;
            $ecvv = "*CVV must contain 3 digits";
        } else {
            $ecvv = "";
        }
    }
   
    if ($er > 0) {
    } else {
        include '../includes/connect.php';
        $query = mysqli_query($conn, "UPDATE `tbl_student` SET `payment_status`='1' WHERE `email`='$stud_email'");
        if ($query) {

            $_SESSION['message'] = "Payment Was Successfull!";
            $_SESSION['status'] = "success";
            $_SESSION['location'] = "dashboard.php";
            $card_holder = "";
            $card_number = "";
            $exp_month = "";
            $exp_year = "";
            $cvv = "";
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
?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>

    <?php include '../includes/config.php'; ?>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../css/payment.css?v=<?= $version ?>" type='text/css' />
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>


<body>
    <?php include 'header.php'; 
    ?>
    <div class="container1">

        <form method="POST" action="">

            <div class="row">



                <div class="col">

                    <center>
                        <h3 class="title">payment</h3>
                    </center>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="../images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span><span class="error" style="width: 50%;"><?php print $ecard_holder; ?></span>
                        <input type="text" name="card_holder">
                    </div>
                    <div class="inputBox">
                        <span>card number :</span></span><span class="error" style="width: 45%;" id="errorcard"><?php print $ecard_number; ?></span>
                        <input type="text" name="card_number" maxlength="16" id="cardNumber">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>exp month :</span><span class="error" id="errormonth" style="width: 75%;"><?php print $eexp_month; ?></span>
                            <input type="text" name="exp_month" maxlength="2" id="exMonth">
                        </div>


                        <div class="inputBox">
                            <span>exp year :</span><span class="error" id="erroryear" style="width: 75%;"><?php print $eexp_year; ?></span>
                            <input type="text" name="exp_year" maxlength="4" id="exYear">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span><span class="error"style="width: 75%;"><?php print $ecvv; ?></span>
                            <input type="text" name="cvv" maxlength="3">
                        </div>
                    </div>
                    <div class="inputBox">
                        <span>AMOUNT</span>
                        <?php
                        include '../includes/connect.php';
                        $result = mysqli_query($conn,"SELECT admission_fee FROM tbl_amount WHERE admission_type = 'Primary'");
                        $r = mysqli_fetch_assoc($result);
                        ?>
                        <input type="text" style="color:black;background-color:white" maxlength="3" value="<?php echo $r['admission_fee']; ?>" disabled>
                    </div>

                </div>

            </div>

            <input type="submit" value="proceed to pay" name="submit" class="submit-btn">

        </form>

    </div>
    </div>
    
    <?php include('../includes/footer.php'); ?>
    <?php include '../includes/redirect.php'; ?>


</body>

</html>