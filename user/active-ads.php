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

    //get all ads
    // $sel_all_ads = "SELECT * FROM `ads_images` AS img INNER JOIN `ads` AS p on img.ad_id = p.ad_id WHERE poster_id = '$id' AND ad_status = 'active' GROUP BY p.ad_id";
    $sel_all_ads = "SELECT * FROM  ads WHERE poster_id = '$id' AND ad_status = 'active'";
    $run_sel_all_ads = mysqli_query($con, $sel_all_ads);
    $count_rows = mysqli_num_rows($run_sel_all_ads);
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
    <title>Active Ads - TradeAm</title>
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
                   Active Ads
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
                    <?php
                if ($count_rows < 1) {
                    echo "<center>
                    <h2 class = 'mt-5'>
                    Your Have No Active Ad Yet!
                    </h2>
                    </center>";
             }
             else{
                 ?>
                <div class="row">
               
                   <table class="table table-striped table-responsive-md">
                       <thead>
                           <tr>
                               <th>Photos</th>
                               <th>Name</th>
                               <th>Category</th>
                               <th>Description</th>
                               <th>Price</th>
                               <th>Views</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>                           

                           <?php
                                while ($row = mysqli_fetch_assoc($run_sel_all_ads)) {
                                    $ad_id = $row['ad_id'];

                                        $image = $row['ad_img'];
                                      
                                        $name = $row['ad_name'];
                                        $cat = $row['ad_category'];
                                        $status = $row['ad_status'];
                                        $description = $row['ad_description'];
                                        $price = $row['ad_price'];
                                        $views = $row['ad_views'];     
                                                                     
                                ?>
                               <td> <img src="../images/post/<?php echo $image ;?>">  </td>
                               <td class='shorten'><?php echo htmlspecialchars($name);?></td>
                               <td><?php echo htmlspecialchars($cat);?></td>
                               <td class='shorten'><?php echo htmlspecialchars($description);?></td>
                               <td><?php echo "&#8358;".htmlspecialchars($price);?></td>
                               <td><?php echo htmlspecialchars($views);?></td>
                               <td>
                                   <a href="edit.php?id=<?php echo $ad_id;?>"><i class="fa fa-edit" title="edit"></i></a> &nbsp;
                                   <i class="fa fa-times" title="delete"></i> &nbsp;
                                </td>
                           </tr>
                           
                           <?php }?>
                       </tbody>
                   </table>
                   <?php }?>
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