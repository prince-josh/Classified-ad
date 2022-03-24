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
    <style>
        img{
            border-radius: 100%;
            width:300px;
            height:300px;
        }
        @media only screen and (max-width: 768px) {
            img{
            width: 90%;
            }
        }
    </style>
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
                   <form action="" method="post" enctype="multipart/form-data">
                   <?php
                    if (isset($_POST['update'])) {

                        $u_img = time().$_FILES['display-pic']['name'];
                        $tmp_name = $_FILES['display-pic']['tmp_name'];
                        $extention = pathinfo($_FILES["display-pic"]["name"], PATHINFO_EXTENSION);

                        if (!in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) ) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                                Your file is not an image
                            </div>";
                        }
                        if ($_FILES['display-pic']['size'] > 5 * 1024 *1024) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                            Your file is more than 5MB
                            </div>";
                        }
                        if (in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) AND $_FILES['display-pic']['size'] <= 5 * 1024 *1024) {
                            move_uploaded_file($tmp_name,"../images/users/$u_img");

                            $update_user_table = "update users set picture = '$u_img' where  email = '$s_email'";
                            $run = mysqli_query($con, $update_user_table);
                            $update_ad_table = "update ads set poster_img = '$u_img' where poster_id = '$id'";
                            $run_update_ad_table = mysqli_query($con, $update_ad_table);
                            if ($run) {
                                echo "<div class = 'alert alert-success' role = 'alert'>
                                Update Successful
                                </div>";
                                echo "<script> window.open('display-pic.php','_self') </script>";
                            }
                        }
                    }
                ?>
                    <div class="form-group">
                        <label for="picture"> Display Picture</label><br>
                        <center>
                        <img src="../images/users/<?php echo $dp ?>" alt="" class = "my-1">
                        </center>
                        <input type="file" name="display-pic" id="ad-images" class="form-control-file text-center">
                    </div>

                    <div class="form-group">
                        <center>
                            <input type="submit" name="update" id="update" class="btn mt-4" value="Update">
                        </center>
                    </div>
                   </form>
                </div>
            </section>
            </main>
        </div> <!--main content end-->

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