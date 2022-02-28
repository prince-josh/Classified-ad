<?php
session_start();
include "includes/connection.php";
    //get all ads
    //get all ads
    $sel_all_ads = "SELECT * FROM ads ORDER BY ad_id DESC LIMIT 20";
    // $sel_all_ads = "SELECT * FROM `ads_images` AS img INNER JOIN `ads` AS p on img.ad_id = p.ad_id GROUP BY p.ad_id DESC";
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
    <link rel="shortcut icon" href="images/logo/LogoMakr-9b7mJ9.png" type="image/x-icon">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  
<!-- Main Stylesheet File -->
<link href="css/style.css" rel="stylesheet">
    <title>Home - Trade Am</title>
</head>
<body>
        <?php
        include "includes/header.php"
        ?>
      <main>
          <!--banner-->
          <div class="banner" style="background-image: url('images/bg/banner.jpg');">
            <div class="content">
              <div class="h2">Welcome to The Largest Campus Ads Website</div>
              <div class="lead">Buy and sell anything from used electronic devices to household items</div>
               <div class="mt-5 search">
               <form action="search.php" method="get">
                <div class="row">
                  <div class="col-8">
                    <div class="form-group">
                        <input type="text" require placeholder="Search for..." name="keyword">
                    </div>
                  </div>
                  
                  <div class="col-4">
                    <div class="form-group">
                        <button class="search_bt" name = "search"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div><!--/banner-->

          
        
            <!--Latest ads-->
    <section class="container latest-products">
        <div class="section-title">
          <h3>Latest Ads</h3>
        </div>
        <div id="additional-dash"></div>
			<div class="products-main">
				<div class="row" id="ad-list">
        <?php
        while ($row = mysqli_fetch_assoc($run_sel_all_ads)) {
        $ad_id = $row['ad_id'];

       $image = $row['ad_img'];
     
       $name = $row['ad_name'];
       $description = $row['ad_description'];
       $price = $row['ad_price'];   
                                    
?>
<div class="col-6 col-md-3">
<a href="ad-details.php?id=<?php echo $ad_id;?>?name=<?php echo htmlspecialchars($name);?>">
<div class="card">
<img src="images/post/<?php echo $image;?>" class="card-img-top">
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
        <center><button id="show" class = "mt-5">Show More</button></center>
    </section>

      <!--Basic Analysis-->
    <section class="basic-analysis" style="background-image: url('images/bg/about-banner.png');">
      <div class="container analysis-content">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="desc">
              <i class="fa fa-shopping-basket"></i>
              <h3 class="counter">12090</h3>
              <p>Ads Posted</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="desc">
              <i class="fa fa-map-marker"></i>
              <h3 class="counter">12090</h3>
              <p>Location</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="desc">
              <i class="fa fa-user-circle-o"></i>
              <h3 class="counter">12090</h3>
              <p>Users</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="desc">
              <i class="fa fa-shopping-cart"></i>
              <h3 class="counter">12090</h3>
              <p>Sales per day</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
        <!-- Footer Section Start -->
        <?php
        include "includes/footer.php"
        ?>
        <!-- Footer Section End -->  

        
    <!-- JavaScript Libraries -->
<script src="js/jquery-1.10.2.js"></script>
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