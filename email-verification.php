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

  <form method="POST">
    <div class="login-content">
        <div class="content">
            <center>
                <h1 class="padding-bottom1"></h1>
            </center><br>
            <div class="forms">
                <div>
                    <h4>Verify Email</h4>
                    <input type="hidden" name="email" value="<?php echo ($_GET['email'] ?? ''); ?>" required>
                    <input type="password" class="input" name="verification_code" placeholder="Enter verification code" required>
                    <center><span id="verification-code-error" style="color: red;"></span></center>
                    <div class="spacing1"></div>
                    <div class="spacing1"></div>
                    <input type="submit" value="Send Code" name="verify_email" onclick="return ValidateForm();" class="submit-btn">
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>


    <?php
 
 if (isset($_POST["verify_email"]))
 {
     $email = $_POST["email"];
     $verification_code = $_POST["verification_code"];

     // connect with database
     $conn = mysqli_connect("localhost", "root", "", "loginotp");

     // mark email as verified
     $sql = "UPDATE userss email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
     $result  = mysqli_query($conn, $sql);

     if (mysqli_affected_rows($conn) == 0)
     {
         die("Verification code failed.");
     }

     header("Location: Archidashboard.php");
     exit();
 }

?>

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