<?php
session_start();
include "../includes/connection.php";

    //get ads
    $sel_all_ads = "SELECT * FROM `ads` WHERE ad_category = 'electronics' AND ad_status = 'active' GROUP BY ad_id DESC limit 20";
    $run_sel_all_ads = mysqli_query($con, $sel_all_ads);
    $count_row = mysqli_num_rows($run_sel_all_ads);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="">
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
  
<!-- Main Stylesheet File -->
<link href="../css/style.css" rel="stylesheet">
    <title>Categories - Trade Am</title>
    <style>
      .section-title h3{
        width: 300px !important;
      }
    </style>
</head>
<body>
        <?php
        include "../includes/header.category.php"
        ?>        
        <div id="page-preloader">
		        <div class="theme-loader">Trade Am</div>
	      </div>
            <!--Latest ads-->
        <main>
    <section class="container latest-products">
        <div class="section-title">
          <h3>Items For Sale</h3>
        </div>
        <div id="additional-dash"></div>
			<div class="products-main">
				<div class="row" id="search-list">
                <?php
                if ($count_row < 1) {
                    echo "<center>
                    <h2 class = 'mt-5 empty-resu'>
                   No items in this category yet.
                    </h2>
                    </center>";
                }
                while ($row = mysqli_fetch_assoc($run_sel_all_ads)) {
                        $ad_id = $row['ad_id'];

                    $image = $row['ad_img'];
                    
                    $name = $row['ad_name'];
                    $description = $row['ad_description'];
                    $price = $row['ad_price'];   
                                                    
                ?>
                <div class="col-sm-6 col-md-3">
                <a href="../ad-details.php?id=<?php echo $ad_id;?>?name=<?php echo htmlspecialchars($name);?>">
                <div class="card">
                <img src="../images/post/<?php echo $image;?>" class="card-img-top">
                <div class="card-body">
                <div class="card-title product-name"><h3><?php echo htmlspecialchars($name);?></h3></div>
                <div class="card-subtitle product-description"><p><?php echo htmlspecialchars($description);?></p></div>
                <div class="product-price"><?php echo "&#8358;". htmlspecialchars($price);?></div>
                </div>
                </a>
                </div>                
                </div>
                <?php } ?>
					</div>
				</div><!--/products-main-->
    </section>
  </main>
        <!-- Footer Section Start -->
        <?php
        include "../includes/footer.category.php"
        ?>
        <!-- Footer Section End -->  

        
    <!-- JavaScript Libraries -->
<script src="../js/jquery-1.10.2.js"></script>
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