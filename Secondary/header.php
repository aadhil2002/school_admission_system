<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
        <meta charset="utf-8">
		<?php include '../includes/config.php' ?>
        <title> Arafa School Admission System</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/Arafalogo.ico">
        <link rel="stylesheet" href="../css/dashboard.css?v=<?= $version ?>">
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css?v=<?=$version?>">
        <script src="../js/jquery.js" charset="utf-8"></script>
		<link href="../css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />

        </script>
    </head>
    <body>
        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
            <div class=logo>
        <img src="../images/logo.png">
    </div>
                <div class="header-menu">
                    <div class="title">SECONDARY ADMISSION PORTAL</div>
                
                 
        <a href="../includes/logout.php" class="logout_btn">Logout</a>

                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="../images/User-icon.png" alt="">
                        <p><?php echo $_SESSION["name"]; ?></p>
                    </center>
                    <li class="item">
                        <a href="dashboard.php" class="menu-btn">
                            <i class="fa fa-desktop"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="profile.php" class="menu-btn">
                            <i class="fa fa-desktop"></i><span>Your Profile</span>
                        </a>
                    </li>
                    <li class="item" id="application">
                        <a href="#application" class="menu-btn">
                            <i class="fa fa-university"></i><span>Your Application<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="secondary_edit.php"><i class="fa fa-edit"></i><span>Edit</span></a>
                            <a href="rejectadmission.php"><i class="fa fa-eye"></i><span>Delete</span></a>
                        </div>
                    </li>
                    <li class="item" >
                        <a href="admission_status.php" class="menu-btn">
                            <i class="fa fa-graduation-cap"></i><span>Application Status</span>
                        </a>
                    </li>
                    <li class="item" id="complaint">
                        <a href="#complaint" class="menu-btn">
                            <i class="fa fa-comments-o"></i><span>Your Complaints<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="complaint.php"><i class="fa fa-edit"></i><span>New Complaint</span></a>
                            <a href="complaint_view.php"><i class="fa fa-eye"></i><span>View your Complaint</span></a>
                        </div>
                    </li>
                    <li class="item">
                        <a href="feedback.php" class="menu-btn">
                            <i class="fa fa-wrench"></i><span>Feedback</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">

     

  

    </body>
</html>
      





