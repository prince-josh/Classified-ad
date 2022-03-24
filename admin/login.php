<?php
  include "../includes/connection.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo/LogoMakr-9b7mJ9.png" type="image/x-icon">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Libraries CSS Files -->
<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../lib/animate/animate.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
     <!--jquery-->
<script src="../js/jquery-3.4.1.js"></script>
<!-- Main Stylesheet File -->
<link rel="stylesheet" href="../css/register.css">
<link href="../css/style.css" rel="stylesheet">
    <title>Log In - Trade Am</title>
</head>
<body>
    <?php
    include "../includes/header.php";
    ?>
      <main>
          <!--banner-->
        <div class="register-banner" style="background-image: url('../images/bg/banner.png');">
            <div class="register-content">
              <div class="h2">Log In</div>
            </div>
        </div>

     <!--sign in form-->
     <section class="register my-5">
         <form action="login.php" method="post">
             <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" name="email" id="email" required placeholder="enter email">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="password">Password:</label><br>
                            <input id= 'pass' type="password" name="password" id="password" required placeholder="enter password"> <span class="fa fa-eye eye" id="see"></span><span class="fa fa-eye-slash eye" id="blind"></span>
                        </div>
       
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="login" value="Submit" class="btn" id="submit">
                        </div>
                    </div>
                    <div class="mt-1 px-3">
                        <p>Don't have an account? <a href="register.php" style="color: black">Register Now</a> </p>
                    </div>
        </div>
        <?php
                        if (isset($_POST["login"])) {
                        $email = mysqli_real_escape_string($con, $_POST["email"]);
                        $password = mysqli_real_escape_string($con, $_POST["password"]);

                        $sel = "select * from admin where email = '$email'";
                        $run = mysqli_query($con, $sel);
                        $row = mysqli_fetch_assoc($run);
                        $get_pass = $row['password'];
                        //check if email exist
                        $email_exist = mysqli_num_rows($run);

                        if ($email_exist === 0 OR $password !== $get_pass) {
                            echo "<div class = 'alert alert-danger' role = 'alert'>
                            Invalid Email or Password
                            </div>";
                        }
                        if ($email_exist === 1 AND $password === $get_pass) {
                            $_SESSION['email'] = $email;
                            $_SESSION['loggin'] = 1;
                            echo "<script> window.open('index.php', '_self') </script>";
                        }
                        // if ($email_exist === 0 OR !password_verify($password, $get_pass)) {
                        //     echo "<div class = 'alert alert-danger' role = 'alert'>
                        //     Invalid Email or Password
                        //     </div>";
                        // }
                        // if ($email_exist === 1 AND password_verify($password, $get_pass)) {
                        //     $_SESSION['email'] = $email;
                        //     $_SESSION['loggin'] = 1;
                        //     echo "<script> window.open('user/index.php', '_self') </script>";
                        // }
                    }
                        ?>
      </form>
     </section>
  </main>
        <!-- Footer Section Start -->
        <?php
        include "../includes/footer.php"
        ?>
        <!-- Footer Section End -->  
    <!-- JavaScript Libraries -->
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery/jquery-migrate.min.js"></script>
<script src="../lib/popper/popper.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/counterup/jquery.waypoints.min.js"></script>
<script src="../lib/counterup/jquery.counterup.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/lightbox/js/lightbox.min.js"></script>
<script src="../lib/typed/typed.min.js"></script>
<!--custom Javascript-->
<script src="../js/script.js"></script>
</body>
</html>