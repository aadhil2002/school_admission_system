<html>
<head>
<title> Arafa School Admission System</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/Arafalogo.ico">
	<link rel="stylesheet" href="../css/home.css?v=<?= $version ?>">
</head>

<body>
	<?php include '../includes/header_home.php'; ?>
	<script>
		var i = 0; // Start Point
		var images = []; // Images Array
		var time = 3000; // Time Between Switch

		// Image List
		images[0] = '../images/banner1.jpg';
		images[1] = '../images/banner2.jpg';
		images[2] = '../images/banner3.jpg';
		images[3] = '../images/banner4.jpg';
		images[4] = '../images/banner5.jpg';

		// Change Image
		function changeImg() {
			document.slide.src = images[i];

			// Check If Index Is Under Max
			if (i < images.length - 1) {
				// Add 1 to Index
				i++;
			} else {
				// Reset Back To O
				i = 0;
			}

			// Run function every x seconds
			setTimeout("changeImg()", time);
		}

		// Run function when page loads
		window.onload = changeImg;
	</script>
	<img name="slide" width="100%" height="850px">
	<div class="video_player_cnt">
		<div class="video_player_inner_cnt">

			<div class="text-center">
				<a href="../videos/Arafa Public School, Pezhakkapikly.mp4"> <img class="image" src="../images/play button.png" width="100px" height="100px"></div></a>
			<h4 class="text-center">ARAFA PUBLIC SCHOOL</h4>
			<h5 class="text-center">TAKE A TOUR</h5>
		</div>
	</div>
	<div id="block">
		<h2>Our Infrastructure</h2>
		<img style="width:100%" src="../images/infrastructure.png" alt="infrastructure photo">
	</div>
	<script>
		const h1 = document.querySelector("#home");
		h1.style.backgroundColor = "#a6a8a6";
	</script>
<?php include '../includes/footer_home.php'; ?>
</body>

</html>