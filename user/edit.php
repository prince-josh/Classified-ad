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

    //get the ads
    if (isset($_GET['id'])) {
        $ad_id = $_GET['id'];
        $sel_ad = "select * from ads where ad_id = '$ad_id'";
        $run_sel_ad = mysqli_query($con, $sel_ad);
        $row = mysqli_fetch_assoc($run_sel_ad);
        $ad_name = $row['ad_name'];
        $ad_category = $row['ad_category'];
        $ad_condition = $row['ad_condition'];
        $price = $row['ad_price'];
        $description = $row['ad_description'];
        $img = $row['ad_img'];

        //get ad details
        $sel_ad = "select * from ads where ad_id = '$ad_id'";
        $run_sel_ad = mysqli_query($con, $sel_ad);
        $row = mysqli_fetch_assoc($run_sel_ad);

        // //get ad images
        // $sel_ad_img = "select * from ads_images where ad_id = '$ad_id'";
        // $run_sel_ad_img = mysqli_query($con, $sel_ad_img);
        // $count_images = mysqli_num_rows($run_sel_ad_img);
        
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
    <link rel="stylesheet" href="css/upload.css">
    
    <title>Edit Ad - TradeAm</title>
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
                   Edit Ad
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
                <?php
                    if (isset($_POST['update'])) {
                        $ad_name = mysqli_real_escape_string($con, ucfirst($_POST['ad_name']));
                        $ad_category = mysqli_real_escape_string($con, $_POST['ad_category']);
                        $ad_price = mysqli_real_escape_string($con, $_POST['ad_price']);
                        $ad_condition = mysqli_real_escape_string($con, $_POST['ad_condition']);
                        $ad_description = mysqli_real_escape_string($con, ucfirst($_POST['ad_description']));

                            $update_user_table = "update ads set ad_name = '$ad_name', ad_category = '$ad_category', ad_price = '$ad_price', ad_description = '$ad_description', ad_status = 'pending', ad_condition = '$ad_condition' where  ad_id = '$ad_id'";
                            $run = mysqli_query($con, $update_user_table);
                            if ($run) {
                                echo "<div class = 'alert alert-success' role = 'alert'>
                                Update Successful
                                </div>";
                                // echo "<script> document.location.reload() </script>";
                                echo "<script> window.location = window.location.href + '&rnd=' + Math.random(); </script>";
                                // location("header: edit.php?id=$ad_id");
                            }
                    }
                ?>
                <?php
                    if (isset($_POST['update-img'])) {

                        $u_img = $_FILES['image']['name'].time();
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $extention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

                        if (!in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) ) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                                Your file is not an image
                            </div>";
                        }
                        if ($_FILES['image']['size'] > 5 * 1024 *1024) {
                            echo "<div class = 'alert alert-danger mt-3 ml-5' role = 'alert'>
                            Your file is more than 5MB
                            </div>";
                        }
                        if (in_array(strtolower($extention), ['png', 'jpeg', 'jpg', 'svg']) AND $_FILES['image']['size'] <= 5 * 1024 *1024) {
                            move_uploaded_file($tmp_name,"../images/post/$u_img");

                            $update_user_table = "update ads set ad_img = '$u_img' where  ad_id = '$ad_id'";
                            $run = mysqli_query($con, $update_user_table);
                            if ($run) {
                                echo "<div class = 'alert alert-success' role = 'alert'>
                                Update Successful
                                </div>";
                                // echo "<script> document.location.reload() </script>";
                                echo "<script> window.location = window.location.href + '&rnd=' + Math.random(); </script>";
                                // location("header: edit.php?id=$ad_id");
                            }
                        }
                    }
                ?>
                   <form action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="name">Name</label>
                           <input type="text" value="<?php echo htmlspecialchars($ad_name);?>" name="ad_name" id="ad-name" class="form-control" required>
                       </div>

                       <div class="form-group">
                        <label for="category">Category</label>
                        <select name="ad_category" id="ad-category" class="form-control">
                            <option value="<?php echo htmlspecialchars($ad_category);?>"><?php echo htmlspecialchars($ad_category);?></option>
                            <option value="Electronics">Electronics</option>
                            <option value="Bed & Beddings">Beds & Beddings</option>
                            <option value="Kitchen Utensils & Gadgets">Kitchen Utensils & Gadgets </option>
                            <option value="School Items">School Items</option>
                            <option value="Funitures">Funitures</option>
                            <option value="Automobiles">Automobiles</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price (Seperate with commas) Eg:10,000</label>
                        <input type="text" placeholder ='enter the price of the product in naira' value="<?php echo htmlspecialchars($price);?>" name="ad_price" id="ad-price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="candition">Condition</label>
                        <select name="ad_condition" required id="ad-condition" class="form-control">
                        <option value="<?php echo htmlspecialchars($ad_condition);?>"><?php echo htmlspecialchars($ad_condition);?></option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="ad_description" id="ad-description" class="form-control" placeholder = "Tell Us About the Product"><?php echo htmlspecialchars($description);?></textarea>
                    </div>
                    <div class="form-group">
                        <center>
                        <input type="submit" name="update" id="update" class="btn" value="Update">
                        </center>
                    </div>
                   </form>
                </div>

                <!-- <div class="row mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h4 class="text-center">images</h4> 
                        <div id="result"></div>
                        <div class="form-group">
                            <input type="file"name="images[]" class="form-control-file" multiple>
                        </div>
                        <?php
                        // if ($count_images == 1) {
                        //     $result = mysqli_fetch_assoc($run_sel_ad_img);
                        //     $image = $result['images'];
                        //     echo"<span class = 'del-btn pr-2'>
                        //     <img src='../images/post/$image' alt='' height='100px' width = '100px'>

                        //     </span>";
                        // }else{
                        // while($row = mysqli_fetch_assoc($run_sel_ad_img)){
                        //     $img_id = $row['image_id'];
                        //     $images = $row['images'];
                            
                        //         echo"<span class = 'del-btn pr-2'>
                        //     <img src='../images/post/$images' alt='' height='100px' width = '100px'>
                        //     <a href='delete.php?id=$img_id' class ='fa fa-times'></a>
                        //     </span>"; 
                        // }   
                        // }
                        ?>
                     <!-- <div class="form-group mt-5">
                     <a href='delete.php?id=$img_id' '></a>
                         <center>
                             <input type="submit" name="update_password" id="update" class="btn" value="Update">
                         </center>
                     </div>
                    </form>
                 </div> -->
                 <div class="change-img mt-5">
                        <div class="row">
                        <form action="" method="post" enctype="multipart/form-data">
                        <label for="ad-image" class="mt-t mb-3">Image - not more than 5 MB</label>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control">
                            <?php
                    echo"<span class = 'del-btn pr-2'>
                            <img src='../images/post/$img' alt='' height='100px' width = '100px' class ='mt-3'>
                            </span>";
                            ?>
                        </div>
                    
                    <div class="form-group">
                        <center>
                        <input type="submit" name="update-img" id="update" class="btn" value="Update">
                        </center>
                    </div>
                        </form>
                        </div>
                 </div>
            </section>        
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
<?php }?>