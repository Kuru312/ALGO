<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav>
    <ul class="sidebar">
      <li onclick=hideSidebar()><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960"
            width="26">
            <path 
              d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
            </svg></a></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="buypage1.php">Buy Now</a></li>
      <li><a href="signup2.php">Sign up</a></li>
    </ul>
    <ul>
      <li><a href="index.php">
          <h2>Archibot</h2>
        </a></li>
      <li class="hideOnMobile nav-menu"><a href="index.php">Home</a></li>
      <li class="hideOnMobile nav-menu"><a href="#">Services</a></li>
      <li class="hideOnMobile nav-menu"><a href="buypage1.php">Buy Now</a></li>
      <li class="hideOnMobile nav-menu"><a href="signup.php">Sign up</a></li>
      <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26"
            viewBox="0 96 960 960" width="26">
            <path class="menucolor" d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" /></svg></a></li>

    </ul>
  </nav>

  <div class="main-container">
    <div class="right-side">
      <p class="archibot">ARCHIBOT</p>
      <p style="font-size: 22px;">Precision Measuring, Every Step of the Way.</p>
      <br><br>
      <a href="signup.php">Log In</a>
    </div>
  </div>

  <div class="features">

    <center>
      <h1>Best Features</h1>
    </center>
    <div class="img-center">
      <img src="asset/Robit.png" class="robit" alt="">
    </div>

    <div class="feature-list">
      <div class="grid-container">
        <div class="grid-item grid1"><img src="asset/computer-white.png" alt=""> Ergonomic Friendly</div>
        <div class="grid-item grid2"><img src="asset/maximize-white.png" alt=""> 100 meters laser</div>
        <div class="grid-item grid3"><img src="asset/battery-white.png" alt=""> 5367 mAh battery capacity</div>
        <div class="grid-item grid4"><img src="asset/webcam-white.png" alt=""> 8mp 4k Ultra HD Camera</div>
      </div>
    </div>
  </div>






  <script>
    function showSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }

    function hideSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>
</body>

</html>