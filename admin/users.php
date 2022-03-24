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

    $sel = "select * from users";
    $run_sel = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($run_sel);
    $count_rows = mysqli_num_rows($run_sel);
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
    <title>Users - TradeAm</title>
</head>
<body>
    <?php
    include "../includes/nav-bar.admin.php";
    ?>
        <div class="main-content">
            <!-- header -->
            <header>
                <h2>
                   Users
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
                    Your Have No Users Yet!
                    </h2>
                    </center>";
             }
             else{
                 ?>
                <div class="row">
               
                   <table class="table table-striped table-responsive-md">
                       <thead>
                           <tr>
                               <th>id</th>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>Email</th>
                               <th>Phone Number</th>
                               <th>University</th>
                               <th>Display Picture</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>                           

                           <?php
                                while ($row = mysqli_fetch_assoc($run_sel)) {
                                    

                                    $id = $row['user_id'];
                                    $fn = $row['first_name'];
                                    $ln = $row['last_name'];
                                    $email = $row['email'];
                                    $phone_num = $row['phone_num'];
                                    $dp = $row['picture'];
                                    $uni = $row['university'];
                                                                     
                                ?>
                               
                               <td><?php echo htmlspecialchars($id);?></td>
                               <td><?php echo htmlspecialchars($fn);?></td>
                               <td><?php echo htmlspecialchars($ln);?></td>
                               <td><?php echo htmlspecialchars($email);?></td>
                               <td><?php echo htmlspecialchars($phone_num);?></td>
                               <td><?php echo htmlspecialchars($uni);?></td>
                               <td> <img src="../images/users/<?php echo $dp ;?>">  </td>
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
    <script src="../user/js/script.js"></script>
</body>
</html>
<?php } ?>