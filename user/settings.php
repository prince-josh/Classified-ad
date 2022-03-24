<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['email'])) {
    header("location: register.php");
}else{
?>

<?php
    $s_email = $_SESSION['email'];
    $sel = "select * from users where email = '$s_email'";
    $run_sel = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($run_sel);
        $id = $row['user_id'];
        $fn = $row['first_name'];
        $ln = $row['last_name'];
        $email = $row['email'];
        $phone_num = $row['phone_num'];
        $uni = $row['university'];
        $dp = $row['picture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo/LogoMakr-9b7mJ9.png" type="image/x-icon">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Libraries CSS Files -->
<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../lib/animate/animate.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
     <!--jquery-->
<script src="js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/upload.css">
    <title>Settings - TradeAm</title>
</head>
<body>
<?php
    include "../includes/nav-bar.php";
    ?>
        <div id="page-preloader">
		    <div class="theme-loader">Trade Am</div>
	    </div>
        <div class="main-content">
            <!-- header -->
            <header>
                <h2>
                   Settings
                </h2>
                <div class="div"></div>
                <div class="user-wrapper"></div>
            </header>

            <main>
                <section class="container">
                <div class="greeting mb-2">
                    <span id="greeting"></span> | <?php echo htmlspecialchars($fn). " ".htmlspecialchars($ln); ?>
                    </div>
                    <!--main body-->
                <div class="row">
                   <form action="settings.php" method="post" enctype="multipart/form-data">
                   <?php
                    if (isset($_POST['update'])) {
                        $fname = mysqli_real_escape_string($con, ucfirst($_POST['fname']));
                        $lname = mysqli_real_escape_string($con, ucfirst($_POST['lname']));
                        $phone = mysqli_real_escape_string($con, $_POST['phone-num']);
                        $uni = mysqli_real_escape_string($con, $_POST['university']);
                        $full_name = $fname. " ". $lname;

                        // $pic = time()."_". $_FILES['profile_pic']['name'];
                        // $tmp_pic = $_FILES['profile_pic']['tmp_name'];
                        
                        // move_uploaded_file($tmp_pic, "images/users/$pic");
                
                            $update_user_table = "update users set first_name = '$fname', last_name = '$lname', phone_num = '$phone', university = '$uni' where email = '$s_email'";
                            $run = mysqli_query($con, $update_user_table);
                            $update_ad_table = "update ads set poster_name = '$full_name ', poster_phone = '$phone' where poster_id = '$id'";
                            $run_update_ad_table = mysqli_query($con, $update_ad_table);
                            if ($run) {
                                echo "<div class = 'alert alert-success' role = 'alert'>
                                Update Successful
                                </div>";
                                echo "<script> window.open('settings.php', '_self') </script>";
                            }
                    }
                ?>
                    <h4 class="text-center">Account Setting</h4>   
                    <div id="a-s-message"></div>
                    <div class="form-group">
                           <label for="fname"> First Name</label>
                           <input type="text" value="<?php echo htmlspecialchars($fn); ?>" name="fname" id="fname" class="form-control" required>
                       </div>

                       <div class="form-group">
                        <label for="lname"> Last Name</label>
                        <input type="text" value="<?php echo htmlspecialchars($ln); ?>" name="lname" id="lname" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone"> Phone number</label>
                        <input type="text" value="<?php echo htmlspecialchars($phone_num); ?>" name="phone-num" id="phone-num" class="form-control" required>
                    </div>

                        <div class="form-group">
                            <label for="phone">University</label><br>
                            <select name="university" id="" class="form-control" required>
                                <option value="<?php echo htmlspecialchars($uni)?>"><?php echo htmlspecialchars($uni)?></option>
                                <option value="University of Benin"> University of Benin</option>
                            </select>
                        </div>

                    <div class="form-group">
                        <center>
                            <input type="submit" name="update" id="update" class="btn" value="Update">
                        </center>
                    </div>
                   </form>
                </div>
                
                <div class="row mt-5">
                
                    <form action="settings.php" method="post">
                    <?php
                    if (isset($_POST['update_email'])) {
                        $n_email = mysqli_real_escape_string($con, $_POST['email']);
                        
                        $sel = "select email from users where email = '$n_email'";
                        $run_sel = mysqli_query($con, $sel);
                        $check_email = mysqli_num_rows($run_sel);

                        if ($check_email > 0) {
                            echo "<div class = 'alert alert-danger'>
                            Email already exist 
                            </div>";
                        }
                
                        if ($check_email == 0) {
                            $update_user_table = "update users set email = '$n_email' where user_id = '$id'";
                            $run = mysqli_query($con, $update_user_table);
                            $update_ad_table = "update ads set poster_email = '$n_email' where poster_id = '$id'";
                            $run_update_ad_table = mysqli_query($con, $update_ad_table);
                            if ($run) {
                                $_SESSION['email'] = $n_email;
                                echo "<div class = 'alert alert-success' role = 'alert'>
                                Update Successful
                                </div>";
                                echo "<script> window.open('settings.php', '_self') </script>";
                            }
                        }
                    }
                ?>
                        <h4 class="text-center">Change Email</h4> 
                        <div id="c-ps-message"></div>
                    <div class="form-group">
                        <label for="email"> Email:</label>
                        <input type="email" value="<?php echo htmlspecialchars($s_email); ?>" name="email" id="email" class="form-control" required>
                    </div>
 
                     <div class="form-group">
                         <center>
                             <input type="submit" name="update_email" id="update" class="btn" value="Update">
                         </center>
                     </div>
                    
                    </form>
                 </div>

                <div class="row mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h4 class="text-center">Change Password</h4> 
                        <div id="c-ps-message"></div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter Password" name="pass" id="pass" class="form-control">
                        </div>
 
                        <div class="form-group">
                         <input type="password" placeholder="Enter New Password" name="new-pass" id="new-pass" class="form-control">
                     </div>
 
                     <div class="form-group">
                         <input type="password" placeholder="Enter New Password" name="confirm-pass" id="confirm-pass" class="form-control">
                     </div>
 
                     <div class="form-group">
                         <center>
                             <input type="submit" name="update_password" id="update" class="btn" value="Update">
                         </center>
                     </div>
                    </form>
                 </div>
            </section>
            </main>
        </div> <!--main content end-->
    </main>

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
      <!-- CUSTOM SCRIPTS -->
    <script src="js/script.js"></script>
</body>
</html>
<?php } ?>