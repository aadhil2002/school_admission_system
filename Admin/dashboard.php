<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="card text-dark">
                <img src="images/Price-Hero-Animation.gif" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Fee Amount</h3>
                    <a href="amount.php" style="margin-left:10px ;">Edit <i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-dark">
                <img src="images/class.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Class Count</h3>
                    <a href="class_count.php" style="margin-left:10px ;">Edit <i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card  text-dark">
                <img src="images/city.gif" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">City</h3>
                    <a href="addcity.php" style="margin-left:10px ;">Add City <i class="fa fa-plus"></i></a>
                    <a href="city.php" style="margin-left:10px ;">Edit/Delete <i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-dark">
                <img src="images/admission.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Admission</h3>
                    <a href="kg_admission.php" style="margin-left:10px ;">KG Admission <i class="fa fa-edit"></i></a>
                    <a href="primary_admission.php" style="margin-left:30px ;">Primary Admission <i class="fa fa-edit"></i></a>
                    <a href="middle_admission.php" style="margin-left:12px ;">Middle Admission <i class="fa fa-edit"></i></a>
                    <a href="secondary_admission.php" style="margin-left:30px ;">Secondary Admission <i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        

    </div>
    <div class="row">
    <div class="col-sm-3">
            <div class="card  text-dark">
                <img src="images/contact.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Guest Messages</h3>
                    <a href="contact_view.php" style="margin-left:10px ;">View <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card  text-dark">
                <img src="images/complaints.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Complaints</h3>
                    <a href="complaint_reply.php" style="margin-left:10px ;">View/Reply <i class="fa fa-reply"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-dark">
                <img src="images/feedback.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title">Feedbacks</h3>
                    <a href="feedback_view.php" style="margin-left:10px ;">View <i class="fa fa-eye"></i></a>

                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>