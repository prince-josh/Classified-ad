<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['email'])) {
    header("location: ../login.php");
}else{
?>

<?php
    
    //get user info
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

    if (isset($_GET['id'])) {
        $update_veiw_settings = "update messages as m inner join users as u on receiver_id = user_id set viewed = 'yes' where receiver_id = '$id'";
        $run_update_veiw_settings = mysqli_query($con, $update_veiw_settings);
    }
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
    <link rel="stylesheet" href="css/myad.css">
    <title>My Messages</title>
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
                   Messages
                </h2>
                <div class="div"></div>
                <div class="user-wrapper">
                </div>
            </header>

            <main>
                <section class="container">
                <div class="greeting mb-2">
                    <span id="greeting"></span> | <?php echo htmlspecialchars($fn). " ".htmlspecialchars($ln); ?>
                    </div>
                    <div id="messages">
                    
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