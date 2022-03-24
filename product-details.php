<?php
session_start();
include "includes/connection.php";
    //get all ads
    $newCommentCount = $_POST['newCommentCount'];
    $sel_all_ads = "SELECT * FROM ads where ad_status ='active' ORDER BY ad_id DESC LIMIT $newCommentCount";
    $run_sel_all_ads = mysqli_query($con, $sel_all_ads);
    $count_row = mysqli_num_rows($run_sel_all_ads);

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