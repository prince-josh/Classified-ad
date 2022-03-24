<?php
  include "connection.php";
  $sel_messages = "select * from messages as m inner join users as u on receiver_id = user_id where viewed = 'no' and user_id ='$id'";
  $run_sel_message = mysqli_query($con, $sel_messages);
  $count_row = mysqli_num_rows($run_sel_message);
?>
<nav class="navbar navbar-b navbar-trans navbar-expand-md " id="mainNav">
        <div class="container">
          <!-- <a class="navbar-brand js-scroll" href="index.php" id="logo">
            <img src="../images/logo/LogoMakr-5BBeMZ.png" alt="logo" height="50px" width="150px">
          </a> -->
          <a class="navbar-brand js-scroll" href="../index.php" id="logo">
            <img src="" alt="logo" height="50px" width="150px">
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa fa-bars"></i></span>
          </button>
          <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link js-scroll active" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll active" href="index.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="my-ads.php">My Ads</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="active-ads.php">My Active Ads</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="pending-ads.php">My Pending Ad</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="messages.php?id=<?php echo $id;?>">Messages <sup><?php echo $count_row;?></sup></a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="upload.php">Upload Ad</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="settings.php">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="display-pic.php">Display Picture</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!--side-bar-->
<div class="sidebar" id="sidebar">
        <!-- <div class="logo">
            <img src="../images/logo/LogoMakr-5BBeMZ.png" alt="">
        </div> -->
        <div class="logo">
        <a class="navbar-brand js-scroll" href="../index.php" id="logo">
            <img src="" alt="logo" height="50px" width="150px">
          </a>
        </div>
        <div class="sidebar-brand">
            <img src="../images/users/<?php echo $dp?>" alt="">
            <div class="user-name"><?php echo htmlspecialchars($fn). " ".htmlspecialchars($ln); ?></div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <!-- <li>
                    <a href="../index.php" class="active"><span class="fa fa-home"></span>
                    <span>Home</span></a>
                </li> -->
                <li>
                    <a href="../index.php"><span class="fa fa-home"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="index.php"><span class="fa fa-dashboard"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="my-ads.php"><span class="fa fa-list"></span>
                    <span>My Ads</span></a>
                </li>
                <li>
                    <a href="active-ads.php"><span class="fa fa-list"></span>
                    <span>My Active Ads</span></a>
                </li>
                <li>
                    <a href="pending-ads.php"><span class="fa fa-list"></span>
                    <span>My Pending Ads</span></a>
                </li>
                <li>
                    <a href="messages.php?id=<?php echo $id;?>"><span class="fa fa-envelope"></span>
                    <span>Messages <sup><?php echo $count_row;?></sup></span></a>
                </li>
                <li>
                    <a href="upload.php"><span class="fa fa-upload"></span>
                    <span>Upload Ad</span></a>
                </li>
                <li>
                    <a href="settings.php"><span class="fa fa-cogs"></span>
                    <span>Settings</span></a>
                </li>
                <li>
                    <a href="display-pic.php"><span class="fa fa-image"></span>
                    <span>Display Picture</span></a>
                </li>
                <li>
                    <a href="logout.php"><span class="fa fa-sign-out"></span>
                    <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>