<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['email'])) {
    header("location: https://localhost/tradeam/login.php");
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

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $fn." ". $ln;
        $_SESSION['phone'] = $phone_num;
        $_SESSION['email'] = $email;
        $_SESSION['dp'] = $dp;
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
    <title>Upload Ad - TradeAm</title>
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
                   Upload Ad
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
                   <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="name">Name</label>
                           <input type="text" required placeholder="Enter the name of the Product" name="ad-name" id="ad-name" class="form-control">
                       </div>

                       <div class="form-group">
                        <label for="category">Category</label>
                        <select name="ad-category" required id="ad-category" class="form-control">
                            <option value="">Select Category</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Bed & Beddings">Beds & Beddings</option>
                            <option value="Kitchen Utensils & Gadgets">Kitchen Utensils & Gadgets </option>
                            <option value="School Items">School Items</option>
                            <option value="Funitures">Funitures</option>
                            <option value="Automobiles">Automobiles</option>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price"> Price (Seperate with commas) Eg:10,000</label>
                        <input type="text" required placeholder="enter the price of the product in naira" name="ad-price" id="ad-price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="candition">Condition</label>
                        <select name="ad-condition" required id="ad-condition" class="form-control">
                            <option value="">Select Condition</option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="ad-description" required id="ad-description" class="form-control" placeholder="Tell us about the Product"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="images">Image - not more than 5 MB</label>
                        <input type="file" require name="ad-image" multiple id="ad-images" class="form-control">
                    </div>

                    <div class="form-group">
                        <center>
                        <input type="submit" name="upload_ad" id="upload" class="btn" value="Upload">
                        </center>
                    </div>
                   </form>
                   <?php

                    if (isset($_POST['upload_ad'])) {
                        $ad_name = mysqli_real_escape_string($con, ucfirst($_POST['ad-name']));
                        $ad_category = mysqli_real_escape_string($con, ucfirst($_POST['ad-category']));
                        $ad_price = mysqli_real_escape_string($con, $_POST['ad-price']);
                        $ad_condition = mysqli_real_escape_string($con, ucfirst($_POST['ad-condition']));
                        $ad_description = mysqli_real_escape_string($con, $_POST['ad-description']);
                        
                        // $pics = array_filter($_FILES['ad-images']['name']);
                        // // // $tmp_pics = $_FILES['ad-images']['tmp_name'];
                        // $extention = pathinfo($pics, PATHINFO_EXTENSION);
                        $pic =$_FILES['ad-image']['name'];
                        $tmp_name = $_FILES['ad-image']['tmp_name'];

                        $extention = pathinfo($_FILES["ad-image"]["name"], PATHINFO_EXTENSION);

                        if (!in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) ) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                                Please Upload an image
                            </div>";
                        }
                        if ($_FILES['ad-image']['size'] > 5 * 1024 *1024) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                            Your Image is more than 5MB
                            </div>";
                        }
                        if (in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) AND $_FILES['ad-image']['size'] <= 5 * 1024 *1024) {
                            move_uploaded_file($tmp_name,"../images/post/$pic");
                            $insert = "insert into ads(ad_name, ad_img, ad_category, ad_price, ad_description, ad_views, ad_status, ad_condition, poster_id, poster_name, poster_phone, poster_email, poster_img, date_posted) values('$ad_name', '$pic','$ad_category', '$ad_price', '$ad_description', '0', 'pending','$ad_condition', '".$_SESSION['id']."', '".$_SESSION['name']."' , '".$_SESSION['phone']."', '".$_SESSION['email']."', '".$_SESSION['dp']."', NOW())";
                            $run = mysqli_query($con, $insert);

                            if ($run) {
                                echo "<div class = 'alert alert-success mt-3 ml-5' role = 'alert'>
                                Upload Successful
                                </div>";
                                // echo "<script> document.location.reload() </script>";
                                // echo "<script> window.location = window.location.href + '&rnd=' + Math.random(); </script>";
                            }
                        }
                        
                        // $select = "select * from ads order by ad_id desc";
                        // $run_select = mysqli_query($con, $select);
                        // $result = mysqli_fetch_assoc($run_select);
                        // $ad_id = $result['ad_id'];

                        // // foreach($pics as $key=>$val){
                        // //     $pic = basename($_FILES['ad-images']['name'][$key]);
                        // //     // if (!in_array($extention, ['png', 'jpeg', 'jpg', 'svg']) ) {
                        // //     //     echo "your file is not an image";
                        // //     // }
                        // //     if ($_FILES['ad-name']['size'][$key] > 5 * 1024 *1024) {
                        // //         echo "your file is more than 5MB";
                        // //     }
                        // //     if ($_FILES['ad-name']['size'][$key] < 5 * 1024 *1024 ) {
                        // //         move_uploaded_file($_FILES['ad-images']['tmp_name'][$key], "../images/post/".$val);
                                
                        // //         $insert_img = "insert into ads_images(ad_id, images, date_posted) values('$ad_id', '$pic', NOW())";
                        // //         $run_img = mysqli_query($con, $insert_img);
                        // //     }
                            
                        // // }

                       
                    }
                    ?>
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