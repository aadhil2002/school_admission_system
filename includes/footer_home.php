<?php
            include '../includes/connect.php';
            
            if (isset($_POST['register'])) 
            {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phno = $_POST['phno'];
                $message = $_POST['message'];
                
                        $reg = "INSERT INTO `tbl_contact`(`fullname`,`email`,`phoneno`,`message`) VALUES('$fullname','$email','$phno','$message')";
                        $result = mysqli_query($conn, $reg);
                        if($result)
                        {
                            $_SESSION['message'] = "Message send successfully";
                            $_SESSION['status'] = "success";
                        }
            
            }
            ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="../css/footer.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css?v=<?= $version ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>About us</h2>
                <div class="content">
                    <p>The long felt need of the people in and around Pezhakkappilly for a public school affiliated to CBSE with English as the medium of instruction has been accomplished with the establishment of Arafa Public School by a team of selfless people under Arafa Charitable Trust, Pezhakkappilly
                        The school was founded in June,1999 and is located in the heart of Pezhakkappilly at Jabal Arafa. The tranquilty relies in the lap of lush green environment gives the students and teachers s scerene ambiance to learn ,grasp and explore themselves.The school emphasises on imparting a skill based education integrated with values .It aims at creating a better young generation, by uplifting the economically and socially backward communities of the area. We strive to develop an enriched learning community that promotes academic achievements ,leadership and Islamic values.</p>
                    <div class="social">
                        <a href="https://www.facebook.com/profile.php?id=100010242425518"><span class="fa fa-facebook-f"></span></a>
                        <a href="https://www.youtube.com/channel/UC4dNw0-0s_pshLvLxH4eODA"><span class="fa fa-youtube"></span></a>
                    </div>
                </div>
            </div>

            <div class="center box">
                <h2>Address</h2>
                <div class="content">
                    <div class="place">
                        <span class="fa fa-map-marker"></span>
                        <span class="text">Pezhakkappilly, Muvattupuzha, Ernakulam, Kochi, Kerala<div class="space">686673</div></span>
                    </div>
                    <div class="phone">
                        <span class="fa fa-phone"></span>
                        <span class="text">0485-2813705<div class="space">9497793666</div></span>
                    </div>
                    <div class="email">
                        <span class="fa fa-envelope"></span>
                        <span class="text">arafaschool.info@gmail.com</span>
                    </div>
                    <div class="timings">
                        <span class="fa fa-clock-o"></span>
                        <span class="text">Mon - Fri 9:30-15:00
                            <div class="space">Saturday 10:00-12:00</div>
                            <div class="space">Sunday - Closed</div></span>
                    </div>
                </div>
            </div>
            <div class="right box">
                <h2>Contact us</h2>
                <div class="content">
                <form action="" method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="fullname" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="phno" required="required">
                        <span>Phone Number</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" required="required"></textarea>
                        <span>Type your Message....</span>
                    </div>
                    <div class="btn">
                        <button type="submit" name="register">Send</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="bottom">
            <center>
                <span class="credit">Created By Aadhil, Abhijith & Hashim | </span>
                <span class="fa fa-copyright"></span><span> 2022 All rights reserved.</span>
            </center>
        </div>
    </footer>
    <?php include '../includes/redirect.php'; ?>
</body>

</html>