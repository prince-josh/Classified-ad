<?php
session_start();
include "includes/connection.php";

if (!isset($_GET["id"])) {
  header("location: index.php");
}else{

  $product_id = $_GET['id'];
  //get product details
  $sel = "select * from ads where ad_id = '$product_id'";
  $run_sel  = mysqli_query($con, $sel);
  $row = mysqli_fetch_assoc($run_sel);
  $name = $row['ad_name'];
  $img = $row['ad_img'];
  $description = $row['ad_description'];
  $price = $row['ad_price'];
  $veiws = $row['ad_views'];
  $category = $row['ad_category'];
  $condition = $row['ad_condition'];
  $date_posted = $row['date_posted'];

  $poster_id = $row['poster_id'];
  $poster_name = $row['poster_name'];
  $poster_phone = $row['poster_phone'];
  $poster_email = $row['poster_email'];
  $poster_img = $row['poster_img'];

  //update view
  $update_view = "update ads set ad_views = ad_views+1 where ad_id = '$product_id'";
  $run_update_views = mysqli_query($con, $update_view);
  //get images
//   function make_query($con)
// {
//   $product_id = $_GET['id'];
//  $query = "select * from ads_images where ad_id = '$product_id'";
//  $result = mysqli_query($con, $query);
//  return $result;
// }

// function make_slide_indicators($con)
// {
//  $output = ''; 
//  $count = 0;
//  $result = make_query($con);
//  while($row = mysqli_fetch_array($result))
//  {
//   if($count == 0)
//   {
//    $output .= '
//    <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
//    ';
//   }
//   else
//   {
//    $output .= '
//    <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
//    ';
//   }
//   $count = $count + 1;
//  }
//  return $output;
// }

// function make_slides($con)
// {
//  $output = '';
//  $count = 0;
//  $result = make_query($con);
//  while($row = mysqli_fetch_array($result))
//  {
//   if($count == 0)
//   {
//    $output .= '<div class="item active">';
//   }
//   else
//   {
//    $output .= '<div class="item">';
//   }
//   $output .= '
//    <img src="images/post/'.$row["images"].'" />
//   </div>
//   ';
//   $count = $count + 1;
//  }
//  return $output;
// }
  //get similar ads
  // $sel_similar_ads = "SELECT * FROM `ads_images` AS img INNER JOIN `ads` AS p on img.ad_id = p.ad_id where ad_category = '$category' AND p.ad_id != '$product_id' GROUP BY p.ad_id DESC limit 10";
  $sel_similar_ads = "SELECT * FROM `ads` where ad_category = '$category' AND ad_id != '$product_id' GROUP BY ad_id DESC limit 10";
  $run_sel_similar_ads = mysqli_query($con, $sel_similar_ads);
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
<link rel="stylesheet" href="css/ad-details.css">
<link href="css/style.css" rel="stylesheet">
    <title>Ad Details- Trade Am</title>
</head>
<body>
<?php
        include "includes/header.php"
        ?>
      <main>

         
     <!--ad details-->
     <section class="ad-details my-5 container">
       <div class="row">
         <div class="col-sm-12 col-md-8">
           <div class="name-price-grid">
           <span class="ad-name"><?php echo htmlspecialchars($name);?></span>
            <span class="ad-price">&#8358;<?php echo htmlspecialchars($price);?></span>
            </div>
           <div class="main-ad-img mb-3">
             <img src="images/post/<?php echo htmlspecialchars($img) ?>" alt="">
           <!-- <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">-->
    <?php //echo make_slide_indicators($con); ?>
    </ol>

    <!-- <div class="carousel-inner"> -->
     <?php //echo make_slides($con); ?>
    <!-- </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div> -->
           </div>
        
         
         <!--ad details-->
         <div class="ad-description mt-5">
           <div class="description my-3">
             <span class="views fa fa-eye"> <?php echo htmlspecialchars($veiws)?> Veiw(s)</span>
             <h6>Description</h6>
             <div class="description-details">
               <?php echo htmlspecialchars($description);?>
             </div>
             <div class="posted-on mt-5">Posted On: <?php echo htmlspecialchars($date_posted);?></div>
             <div class="product-category">Category: <?php echo htmlspecialchars($category);?></div>
             <div class="product-condition">Condition: <?php echo htmlspecialchars($condition);?></div>
           </div>
         </div>

        </div>
         <!--seller details-->
         <div class="col-sm-12 col-md-4">
          <h4 class="posted-by">Ad Posted By</h4>
           <div class="seller-section">
          <div class="seller-details">
            <img src="images/users/<?php echo htmlspecialchars($poster_img);?>">
              <div class="seller-info">
                  <div class="card-title seller-name"><?php echo htmlspecialchars($poster_name);?></div>
                  <div class="card-subtitle seller-phone"><?php echo htmlspecialchars($poster_phone);?></div>
                  <div class="seller-email"><?php echo htmlspecialchars($poster_email);?></div>
              </div>
          </div> <!--seller-detail end-->

          <div class="message-seller">
            <button class="form-toggler btn mb-2">Message Seller</button>
            <div class="form">
                <form action="" method="post">
                  <input type="text" name="name" id="name" placeholder="enter your name*" required><br>
                  <input type="number" name="phone" id="phone" placeholder="enter phone number*" required><br>
                  <input type="email" name="email" id="email" placeholder="enter email">
                  <textarea name="message" id="message">Hi am interested in buying the <?php echo htmlspecialchars($name);?>
                  </textarea>
                  <button type="submit" id="send" name="send" class="btn"> Send</button>
                </form>
                <?php
         if (isset($_POST['send'])) {

          $name = mysqli_real_escape_string($con, ucfirst($_POST['name']));
          $phone = mysqli_real_escape_string($con, ucfirst($_POST['phone']));
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $message = mysqli_real_escape_string($con, ucfirst($_POST['message']));
  
              $insert = "insert into messages(sender_name, sender_phone, sender_email, message, receiver_id, viewed, date_sent) values('$name', '$phone', '$email', '$message', (SELECT poster_id from ads where poster_id = $poster_id LIMIT 1),'no', now())";
              $run = mysqli_query($con, $insert);
              if ($run) {
                  echo "<script> alert('Message Sent') </script>";
                  header("location: ad-details.php?id=$ad_id?name=$name");
              }
          }
      ?>
            </div>
          </div>
           </div> <!-- /seller-section -->
          <!--safty tips-->
          <div class="card mt-3" id="safty-tips">
              <div class="card-body">
                  <div class="card-title st-heading"> <h3>Safty Tips</h3> </div>
                  <div class="card-subtitle st-info">
                    <ol>
                      <li>Never meet any seller in a secluded area</li>
                      <li> lorem</li>
                      <li>lorem</li>
                    </ol>
                  </div>
              </div>
          </div> <!--card end-->

          <!--similar ads-->
          <div class="similar-ads mt-3">
            <h3>Similar Ads</h3>
              <?php
              while ($result = mysqli_fetch_assoc($run_sel_similar_ads)) {
                $ad_id = $result['ad_id'];

                $image = $result['ad_img'];
              
                $name = $result['ad_name'];
                $price = $result['ad_price'];
              ?>
              <a href="ad-details.php?id=<?php echo $ad_id;?>?name=<?php echo htmlspecialchars($name);?>">
              <div class="similar-ad">
              <img src="images/post/<?php echo $image;?>" alt="">
              <div class="similar-ad-details">
                <div class="ad-name"><?php echo htmlspecialchars($name);?></div>
                <div class="ad-price"><?php echo "&#8358;". htmlspecialchars($price);?></div>
            </div>
          </div>
              </a>
          <hr>
          <?php } ?>
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
<?php }?>