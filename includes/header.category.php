<?php
//  session_start();
 include "connection.php";
 if (!isset($_SESSION['email'])) {
   echo"
  <header id='page-top'>
  <nav class='navbar navbar-b navbar-trans navbar-expand-md ' id='mainNav'>
    <div class='container'>
      <!-- <a class='navbar-brand js-scroll' href='../index.php' id='logo'>
        <img src='images/logo/LogoMakr-5BBeMZ.png' alt='logo' height='50px' width='150px'>
      </a> -->
      <a class='navbar-brand js-scroll' href='../index.php' id='logo'>
        <img src='' alt='logo' height='50px' width='150px'>
      </a>
      <button class='navbar-toggler collapsed' type='button' data-toggle='collapse' data-target='#navbarDefault'
        aria-controls='navbarDefault' aria-expanded='false' aria-label='Toggle navigation'>
        <span><i class='fa fa-bars'></i></span>
      </button>
      <div class='navbar-collapse collapse justify-content-end' id='navbarDefault'>
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a class='nav-link js-scroll active' href='../index.php'>Home</a>
          </li>
          <li class='nav-item dropdown'>
          <a href='#' role='button' class='nav-link dropdown-toggle' id='navbarDarkDropdownMenuLink' data-toggle='dropdown' aria-expanded='false'>Categories</a>
           <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDarkDropdownMenuLink'>
           <li><a href='automobiles.php' class='dropdown-item'>Automobiles</a></li>
             <li><a href='bed-beddings.php' class='dropdown-item'>Bed &amp; Beddings</a></li>
             <li><a href='electronics.php'class='dropdown-item'>Electronics</a></li>
             <li><a href='funitures.php' class='dropdown-item'>Funitures</a></li>
             <li><a href='kitchen-utensils-and-gadgets.php' class='dropdown-item'>Kitchen Utensils &amp; Gadgets</a></li>
             <li><a href='school-items.php' class='dropdown-item'>School Items</a></li>
           </ul>
     </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll' href='../login.php'>Login</a>
          </li>
          <li class='nav-item'>
              <a class='nav-link js-scroll' href='../register.php'>Register</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll' href='../user/upload.php'>Post An Ad</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav End -->
</header>";
 }else{
 ?>
<header id="page-top">
        <nav class="navbar navbar-b navbar-trans navbar-expand-md " id="mainNav">
          <div class="container">
            <!-- <a class="navbar-brand js-scroll" href="index.php" id="logo">
              <img src="images/logo/LogoMakr-5BBeMZ.png" alt="logo" height="50px" width="150px">
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
                  <a class="nav-link js-scroll" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll active" href="../user/index.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                   <a href="#" role="button" class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" data-toggle="dropdown" aria-expanded="false">Categories</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a href="automobiles.php" class="dropdown-item">Automobiles</a></li>
                      <li><a href="bed-beddings.php" class="dropdown-item">Bed &amp; Beddings</a></li>
                      <li><a href="electronics.php"class="dropdown-item">Electronics</a></li>
                      <li><a href="funitures.php" class="dropdown-item">Funitures</a></li>
                      <li><a href="kitchen-utensils-and-gadgets.php" class="dropdown-item">Kitchen Utensils &amp; Gadgets</a></li>
                      <li><a href="school-items.php" class="dropdown-item">School Items</a></li>
                    </ul>
              </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll" href="../user/upload.php">Post An Ad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="../user/logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Nav End -->
      </header>
      <?php } ?>