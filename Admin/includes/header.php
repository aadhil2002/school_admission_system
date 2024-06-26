<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<title></title>
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

	
	
</head>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
		<?php include 'includes/config.php' ?>
        <link rel="stylesheet" href="css/dashboard.css?v=<?= $version ?>">
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css?v=<?=$version?>">
        <script src="js/jquery.js" charset="utf-8"></script>
		<link href="css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />

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
                    <div class="title">ADMIN PORTAL</div>
                
                 
        <a href="includes/logout.php" class="logout_btn">Logout</a>

                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="images/User-icon.png" alt="">
                        <p><?php echo $_SESSION["name"]; ?></p>
                    </center>
                    <li class="item">
                        <a href="dashboard.php" class="menu-btn">
                            <i class="fa fa-desktop"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item" id="admission">
                        <a href="#admission" class="menu-btn">
                            <i class="fa fa-comments-o"></i><span>Admission<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="class_count.php"><i class="fa fa-edit"></i><span>Class Count</span></a>
                            <a href="kg_admission.php"><i class="fa fa-edit"></i><span>KG</span></a>
                            <a href="primary_admission.php"><i class="fa fa-edit"></i><span>Primary</span></a>
                            <a href="middle_admission.php"><i class="fa fa-edit"></i><span>Middle</span></a>
                            <a href="secondary_admission.php"><i class="fa fa-edit"></i><span>Secondary</span></a>
                        </div>
                    </li>
                    <li class="item" id="city">
                        <a href="#city" class="menu-btn">
                            <i class="fa fa-university"></i><span>City<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addcity.php"><i class="fa fa-edit"></i><span>Add</span></a>
                            <a href="city.php"><i class="fa fa-eye"></i><span>Edit / Delete</span></a>
                        </div>
                    </li>
                    <li class="item" id="complaint">
                        <a href="#complaint" class="menu-btn">
                            <i class="fa fa-graduation-cap"></i><span>Complaint</span>
    </a>
                            <div class="sub-menu">
                            <a href="complaint_reply.php"><i class="fa fa-edit"></i><span>View</span></a>
    </div>
                    </li>
                    <li class="item" id="feedback">
                        <a href="#feedback" class="menu-btn">
                            <i class="fa fa-comments-o"></i><span>Feeback<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="feedback_view.php"><i class="fa fa-edit"></i><span>View</span></a>
                        </div>
                    </li>
                  

                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">

     

  

    </body>
</html>
      





