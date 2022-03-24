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

    //get the ads
    if (isset($_GET['ad-id'])) {
        $ad_id = $_GET['ad-id'];
        $sel_ad = "select * from ads where ad_id = '$ad_id'";
        $run_sel_ad = mysqli_query($con, $sel_ad);
        $row = mysqli_fetch_assoc($run_sel_ad);
        $ad_name = $row['ad_name'];
        $ad_category = $row['ad_category'];
        $ad_condition = $row['ad_condition'];
        $price = $row['ad_price'];
        $description = $row['ad_description'];
        $img = $row['ad_img'];
        $date_posted=$row['date_posted'];

        //poster detail
        $poster_id = $row['poster_id'];
        $poster_name = $row['poster_name'];
        $poster_img = $row['poster_img'];
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
    <link rel="stylesheet" href="../user/css/myad.css">
    <title>Veiw Ads - TradeAm</title>
</head>
<body>
    <?php
    include "../includes/nav-bar.admin.php";
    ?>
        <div class="main-content">
            <!-- header -->
            <header>
                <h2>
                   Veiw Ads
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
                    <!--main body-->
                    <div class="row">
                    <div class="card col-12">
                            <div class="card-body">
                                <div id="table" style ="width:100%">
                                  <center><table class = "table table-responsive" border="1">
                                        <tr>
                                            <td>Ad ID</td>
                                            <td> <?php echo htmlspecialchars($ad_id); ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Ad Name</td>
                                            <td> <?php echo htmlspecialchars($ad_name); ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td> <?php echo htmlspecialchars($ad_category) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Condition</td>
                                            <td> <?php echo htmlspecialchars($ad_condition) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td> <?php echo htmlspecialchars($price) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td> <?php echo htmlspecialchars($description) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Ad Image</td>
                                            <td> <?php echo "<img src='../images/post/$img' height='200' width='200'>"?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Poster ID</td>
                                            <td> <?php echo htmlspecialchars($poster_id) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Poster</td>
                                            <td> <?php echo htmlspecialchars($poster_name) ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Passport:</td>
                                            <td> <?php echo "<img src='../images/users/$poster_img' alt = 'passport' height='50' width='50'>" ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Date Posted</td>
                                            <td> <?php echo htmlspecialchars($date_posted); ?></td>
                                            
                                        </tr>
                                    </table>
                                    </center>
                                </div>
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