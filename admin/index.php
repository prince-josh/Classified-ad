<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['email'])) {
    header("location: login.php");
}else{
?>

<?php
    //get user info
    $s_email = $_SESSION['email'];
    $sel = "select * from admin where email = '$s_email'";
    $run_sel = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($run_sel);
    $id = $row['admin_id'];
    $fn = $row['Firstname'];
    $ln = $row['Lastname'];
    $email = $row['email'];
    // $phone_num = $row['phone_num'];
    // $dp = $row['picture'];

    //get total users
    $select_users = "select * from users";
    $run_select_users = mysqli_query($con, $select_users);
    $total_users = mysqli_num_rows($run_select_users);

    //get total ads
    $select_total = "select * from ads";
    $run_select_total = mysqli_query($con, $select_total);
    $total_ads = mysqli_num_rows($run_select_total);

    //get active ads
    $select_active = "select * from ads where ad_status = 'active'";
    $run_select_active = mysqli_query($con, $select_active);
    $active_ads = mysqli_num_rows($run_select_active);

    //get pending ads
    $select_pending = "select * from ads where ad_status = 'pending'";
    $run_select_pending = mysqli_query($con, $select_pending);
    $pending_ads = mysqli_num_rows($run_select_pending);

    //get total ads views
    $select_total_views = "select ad_views from ads";
    $run_select_total_views = mysqli_query($con, $select_total_views);
    $total_ads_views = 0;

    while ($num = mysqli_fetch_assoc($run_select_total_views)) {
            $total_ads_views += $num['ad_views'];
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
<script src="../user/js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../user/css/style.css">
    <link rel="stylesheet" href="../user/css/index.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
    include "../includes/nav-bar.admin.php";
    ?>

        <div class="main-content">
            <!-- header -->
            <header>
                <h2>
                    Dashboard
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
                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card">
                              <div class="card-body">
                                  <div class="number"><h3><?php echo $total_users ?></h3></div>
                                  <div class="card-description"><p>Total Users</p></div>
                              </div>
                              <div class="more-info"> <a href="users.php">More Info</a></div>
                          </div>     
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card">
                              <div class="card-body">
                                  <div class="number"><h3><?php echo $total_ads ?></h3></div>
                                  <div class="card-description"><p>Total Ads</p></div>
                              </div>
                              <div class="more-info"> <a href="ads.php">More Info</a></div>
                          </div>     
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card">
                              <div class="card-body">
                                  <div class="number"><h3><?php echo $active_ads ?></h3></div>
                                  <div class="card-description"><p>Active Ads</p></div>
                              </div>
                              <div class="more-info"> <a href="active.php">More Info</a></div>
                          </div>     
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card">
                              <div class="card-body">
                                  <div class="number"><h3><?php echo $pending_ads ?></h3></div>
                                  <div class="card-description"><p>Pending Ads</p></div>
                              </div>
                              <div class="more-info"> <a href="pending.php">More Info</a></div>
                          </div>     
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card">
                              <div class="card-body">
                                  <div class="number"><h3><?php echo $total_ads_views ?></h3></div>
                                  <div class="card-description"><p>Total Ads Views</p></div>
                              </div>
                              <div class="more-info"> <a href="ads.php">More Info</a></div>
                          </div>     
                    </div>
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
    <script src="../user/js/script.js"></script>
</body>
</html>
<?php } ?>