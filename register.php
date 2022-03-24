<?php
  include "includes/connection.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo/LogoMakr-9b7mJ9.png" type="image/x-icon">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
     <!--jquery-->
<script src="js/jquery-3.4.1.js"></script>
<!-- Main Stylesheet File -->
<link rel="stylesheet" href="css/register.css">
<link href="css/style.css" rel="stylesheet">
    <title>Sign Up - Trade Am</title>
</head>
<body>
    <?php
    include "includes/header.php";
    ?>
    <div id="page-preloader">
		<div class="theme-loader">Trade Am</div>
	</div>
      <main>
          <!--banner-->
        <div class="register-banner" style="background-image: url('images/bg/banner.png');">
            <div class="register-content">
              <div class="h2">Sign Up</div>
            </div>
        </div>

     <!--sign in form-->
     <section class="register my-5">
         <form action="register.php" method="post" enctype ="multipart/form-data">
         <?php
         if (isset($_POST['submit'])) {
          $fname = mysqli_real_escape_string($con, ucfirst($_POST['firstname']));
          $lname = mysqli_real_escape_string($con, ucfirst($_POST['lastname']));
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $phone = mysqli_real_escape_string($con, $_POST['phone']);
          $uni = mysqli_real_escape_string($con, $_POST['university']);
          $pass =  mysqli_real_escape_string($con, $_POST['password']);
          $c_pass = mysqli_real_escape_string($con,  $_POST['c_password']);
          $pass_encode = password_hash($pass, PASSWORD_BCRYPT);
          
          $pic = time()."_". $_FILES['profile_pic']['name'];
          $tmp_pic = $_FILES['profile_pic']['tmp_name'];
          
          move_uploaded_file($tmp_pic, "images/users/$pic");
          $sel = "select email from users where email = '$email'";
          $run_sel = mysqli_query($con, $sel);
          $check_email = mysqli_num_rows($run_sel);
          if (strlen($pass) <= 8) {
            echo "<div class = 'alert alert-danger'>
                password must be 8 characters or more
            </div>";
          }
          if ($check_email > 0) {
            echo "<div class = 'alert alert-danger'>
                Email already exist 
            </div>";
          }
          if ($pass !== $c_pass) {
            echo "<div class = 'alert alert-danger'>
                Passwords don't match 
            </div>";
          }
          $extention = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);

            if (!in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) ) {
                echo "<div class = 'alert alert-danger'>
                    Profile picture must be an image
                </div>";
            }
          if ($check_email == 0 AND strlen($pass) >= 8 AND $pass === $c_pass AND in_array($extention, ['png', 'jpeg', 'jpg', 'svg']) ) {
              $insert = "insert into users(first_name, last_name, email, phone_num, university, password, picture, date_registered) values('$fname', '$lname', '$email', '$phone', '$uni', '$pass_encode', '$pic', NOW())";
              $run = mysqli_query($con, $insert);
              if ($run) {
                  $_SESSION['email'] = $email;
                  echo "<script> alert('Registration successful') </script>";
                  echo "<script> window.open('user/index.php', '_self') </script>";
              }else{
                  echo "<script> window.open('register.php', '_self') </script>";
              }
          }
        
      }
      ?>
             <div class="row">
             <div class="col-sm-12">
                 <div class="form-group">
                     <label for="firstname">First Name:</label><br>
                     <input type="text" name="firstname" id="firstname" required placeholder="enter your first name">
                 </div>
             </div>

             <div class="col-sm-12">
                <div class="form-group">
                    <label for="lastname">Last Name</label> <br>
                    <input type="text" name="lastname" id="lastname" required placeholder="enter your second name">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required placeholder="enter email">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="phone">Phone Number</label><br>
                    <input type="text" name="phone" id="phone" required placeholder="enter your phone number">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="phone">University</label><br>
                    <select name="university" id="" class="form-control" required>
                        <option value="">Select University</option>
                        <option value="University of Benin"> University of Benin</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required placeholder="enter password">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="confrim_password">Confirm Password</label><br>
                    <input type="password" name="c_password" id="C_password" required placeholder="confirm password">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Profile_pic">Profile Picture</label><br>
                    <input type="file" name="profile_pic" id="profile_pic" required>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn" id="submit">
                </div>
            </div>
            <div class="mt-1 px-3">
                    <p>Already have an account? <a href="login.php" style="color: black">Login</a> </p>
            </div>
             </div>
      </form>
     </section>
  </main>
        <!-- Footer Section Start -->
        <?php
        include "includes/footer.php"
        ?>
        <!-- Footer Section End -->  
    <!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/popper/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/counterup/jquery.waypoints.min.js"></script>
<script src="lib/counterup/jquery.counterup.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/typed/typed.min.js"></script>
<!--custom Javascript-->
<script src="js/script.js"></script>
</body>
</html>