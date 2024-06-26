<?php
session_start();
 $view = "";
 $comments = "";
 $name = $_SESSION["name"];
 $email = $_SESSION["email"];
 $type=$_SESSION["admission_type"];

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
	$email = $_POST['email'];
	$view = $_POST['view'];
    $comments = $_POST['comments'];
   

    include '../includes/connect.php';
    $query = mysqli_query($conn, "INSERT INTO `tbl_feedback`( `name`, `email`, `stud_type`, `feedback`, `suggestions`) VALUES ('$name','$email','$type','$view','$comments')");
    if ($query) {

        $_SESSION['message'] = "Feedback Sent Successfully!";
    $_SESSION['status'] = "success";
    $_SESSION['location'] = "dashboard.php";
    $view = "";
    $name = "";
    $comments = "";
    $email = "";
       
    } else {
        print '<span class= "errorMessage">' . mysqli_error($conn) . '</span>';
    }
}
   

?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include '../includes/config.php'; ?>
    <link href="../css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />
    <link href="../css/font-awesome/css/font-awesome.css?v=<?= $version ?>" rel="stylesheet">
    <link href="../css/feedback.css?v=<?= $version ?>" rel="stylesheet" type="text/css" media="all" />
	<style>
		.footer-social-icons{
			color:whitesmoke;
			margin-left: 20%;
		}
	</style>
</head> 

   
<body class="agileits_w3layouts">
<?php include 'header.php'; ?>
    <h1 class="agile_head text-center">Feedback Form</h1>
    <div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="" method="post" class="agile_form">
		  <h2>How satisfied were you with our Service?</h2>
			 <ul class="agile_info_select">
				 <li><input type="radio" name="view" value="excellent" id="excellent" required> 
				 	  <label for="excellent">excellent</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="view" value="good" id="good"> 
					  <label for="good"> good</label>
				      <div class="check w3ls"></div>
				 </li>
				 <li><input type="radio" name="view" value="neutral" id="neutral">
					 <label for="neutral">neutral</label>
				     <div class="check wthree"></div>
				 </li>
				 <li><input type="radio" name="view" value="poor" id="poor"> 
					  <label for="poor">poor</label>
				      <div class="check w3_agileits"></div>
				 </li>
			 </ul>	  
			<h2>If you have specific feedback, please write to us...</h2>
			<textarea placeholder="Additional comments" class="w3l_summary" name="comments" required=""></textarea>
			<input type="text" placeholder="Your Name" name="name" value="<?php echo $name;?>" readonly/>
			<input type="email" placeholder="Your Email" name="email" value="<?php echo $email;?>" readonly/><br>
			<center><input type="submit" name="submit" value="submit Feedback" class="agileinfo" /></center>
	  </form>
	</div> 
</div>
</div>             
</body>
<?php 
include '../includes/redirect.php';
include '../includes/footer.php'; ?>	
</html>