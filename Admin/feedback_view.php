<?php
session_start();
$i = 1;
include '../includes/connect.php';
$query = mysqli_query($conn, "SELECT *  FROM `tbl_feedback`");


?>
<!DOCTYPE HTML>
<html>

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include 'includes/config.php'; ?>
	<link href="css/bootstrap.min.css?v=<?= $version ?>" rel='stylesheet' type='text/css' />
	<link href="font-awesome/css/font-awesome.css?v=<?= $version ?>" rel="stylesheet">
	<link href="css/feedback.css?v=<?= $version ?>" rel="stylesheet" type="text/css" media="all" />
	<style>
		.footer {
			color: whitesmoke;
			position: fixed;
			bottom: 0;
			margin-left: 30%;
		}
		td{
			font-weight: 900;
		}
		th{
			font-weight: 900;
			color:aliceblue;
		}
	</style>
</head>


<body class="agileits_w3layouts">
	<?php include 'includes/header.php'; ?>
	<h1 class="agile_head text-center">Feedbacks</h1>
	<div class="w3layouts_main wrap">
		<table class="table table-bordered table-striped">
			<tbody>
				<tr>
					<th>SI.No</th>
					<th>Feedbacker Name</th>
					<th>Feedbacker Email</th>
					<th>Feedbacker Type</th>
					<th>Feedback</th>
					<th>Suggestions</th>
				</tr>
				<?php
				if (mysqli_num_rows($query) > 0) {
					while ($row = mysqli_fetch_assoc($query)) {

				?>
						<tr>
							<td><?php echo $i;
								$i++; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['stud_type']; ?></td>
							<td><?php echo $row['feedback']; ?></td>
							<td><?php echo $row['suggestions']; ?></td>


						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>



	</div>
	<div class="footer">
	<?php include 'includes/footer.php'; ?>
	</div>

</body>


</html>