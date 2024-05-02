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
      <li><a href="buypage1">Buy Now</a></li>
      <li><a href="signup">Sign up</a></li>
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

    <div class="stores">
        <div class="purchase-choice">
            <a href="buypage1.php" class="os1">Online Stores</a>
            <a href="buypage2.php">Nearest Branch</a>
        </div>

        <table class="online-store-table">
            <tbody>
                <tr> <!-- Change links to our archibot store-->
                    </a><td><a href="https://shopee.ph/" target="_blank"><img  src="asset/shopee.png" alt=""></a></td>
                    <td><a href="https://lazada.ph/" target="_blank"><img href="" src="asset/lazada.png" alt=""></a></td>
                    <td><a href="https://www.amazon.com/" target="_blank"></a><img href="" src="asset/amazon.png" alt=""></td>
                </tr>
                <tr>
                    <td><a href="https://www.ebay.com/" target="_blank"><img src="asset/ebay.png" alt=""></a></td>
                    <td><a href="https://www.flipkart.com/" target="_blank"><img src="asset/flipkart.png" alt=""></a></td>
                    <td><a href="https://www.alibaba.com/" target="_blank"><img src="asset/alibaba.png" alt=""></a></td>
                </tr>
            </tbody>
        </table>
    </div>




</body>

</html>