<?php
include '../includes/connect.php';
session_start();
$msg = "";
if (isset($_POST["login"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    $encpassword = md5($password);

    $sel = "select * from tbl_admin where admin_email='" . $username . "'and password='" . $password . "'";

    $sel1 = "select * from tbl_student where email='" . $username . "'and password='" . $encpassword . "' and admission_type='KG'";

    $sel2 = "select * from tbl_student where email='" . $username . "'and password='" . $encpassword . "' and admission_type='Primary'";

    $sel3 = "select * from tbl_student where email='" . $username . "'and password='" . $encpassword . "' and admission_type='Middle'";

    $sel4 = "select * from tbl_student where email='" . $username . "'and password='" . $encpassword . "' and admission_type='Secondary'";

    $row = $conn->query($sel);

    $row1 = $conn->query($sel1);

    $row2 = $conn->query($sel2);

    $row3 = $conn->query($sel3);

    $row4 = $conn->query($sel4);

    $num = mysqli_num_rows($row);
    $num1 = mysqli_num_rows($row1);
    $num2 = mysqli_num_rows($row2);
    $num3 = mysqli_num_rows($row3);
    $num4 = mysqli_num_rows($row4);

    if ($num == 1) {
        while($results=$row->fetch_assoc())
        {
        $_SESSION["name"] = $results["admin_name"];
        }
        header("Location:../Admin/dashboard.php");
    } else if ($num1 == 1) {
        while($results=$row1->fetch_assoc())
        {
            $_SESSION["name"] = $results["stud_name"];
            $_SESSION["email"] = $results["email"];
            $_SESSION["birthdate"] = $results["birthdate"];
            $_SESSION["age"] = $results["age"];
            $_SESSION["admission_type"] = $results["admission_type"];
        }
        header("Location:../KG/dashboard.php");
    }else if ($num2 == 1) {
        while($results=$row2->fetch_assoc())
        {
            $_SESSION["name"] = $results["stud_name"];
            $_SESSION["email"] = $results["email"];
            $_SESSION["birthdate"] = $results["birthdate"];
            $_SESSION["age"] = $results["age"];
            $_SESSION["admission_type"] = $results["admission_type"];
        }
        header("Location:../Primary/dashboard.php");
    } else if ($num3 == 1) {
        while($results=$row3->fetch_assoc())
        {
            $_SESSION["name"] = $results["stud_name"];
            $_SESSION["email"] = $results["email"];
            $_SESSION["birthdate"] = $results["birthdate"];
            $_SESSION["age"] = $results["age"];
            $_SESSION["admission_type"] = $results["admission_type"];
        }
        header("Location:../Middle/dashboard.php");
    } else if ($num4 == 1) {
        while($results=$row4->fetch_assoc())
        {
            $_SESSION["name"] = $results["stud_name"];
            $_SESSION["email"] = $results["email"];
            $_SESSION["birthdate"] = $results["birthdate"];
            $_SESSION["age"] = $results["age"];
            $_SESSION["admission_type"] = $results["admission_type"];
        }
        header("Location:../Secondary/dashboard.php");
    } else {
        $_SESSION['message'] = "Invalid Login!";
        $_SESSION['status'] = "error";
        $_SESSION['location']="login.php";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Arafalogo.ico">
    <?php include '../includes/config.php' ?>
    <link rel="stylesheet" href="../css/register.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/bootstrap.min.css?v=<?= $version ?>" ?>
    <style>
      .bg-img::after {
        top: 352px;
      }
      .content {
        top: 800px;
      }
    </style>
  </head>

<body>
    <?php include '../includes/header_home.php'; ?>
    <div class="bg-img">
        <div class="content">
            <header>Login Form</header>
            <form action="" method="POST">
                <div class="field">
                    <i class="fa fa-user"></i>
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="field space">
                    <i class="fa fa-lock"></i>
                    <input type="password"  name="password" class="password" placeholder="Password" required>
                    <i class="show">SHOW</i>
                </div>
                <div class="field" style="margin-top: 30px;">
                    <input type="submit" name="login" value="LOGIN">
                </div>
                <div class="register" style="margin-top:36px">Don't have an account? <a href="register.php">Register Now</a></div>
            </form>
        </div>
    </div>
    <script>
            const h1 = document.querySelector("#login");
            h1.style.backgroundColor = "#a6a8a6";
        </script>
    <script>
        const pass_field = document.querySelector('.password');
        const show_btn = document.querySelector('.show');
        show_btn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                show_btn.style.color = "#3498db"
                show_btn.textContent = "HIDE";
            } else {
                pass_field.type = "password";
                show_btn.style.color = "#222";
                show_btn.textContent = "SHOW";
            }
        });
    </script>
    <?php include '../includes/redirect.php';?>
    <?php include '../includes/footer_log.php'; ?>
</body>

</html>