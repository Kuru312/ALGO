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

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="login-content">
        <div class="content">
            <center>
                <h1 class="padding-bottom">Sign Up</h1>
            </center><br>
            <div class="forms">
                <div>
                    <h4>License Key</h4>
                    <input type="text" class="input" name="licenseInput">
                    <center><span id="license-key" style="color: red;"></span></center>
                    <div class="spacing"></div>
                    <input id="openModalButton" name="validateLicense" type="submit" value="Validate SIGNUP" onclick="return ValidateForm();" class="submit-btn">
                    <input id="openModalButton" name="validateLicenselogin" type="submit" value="Validate LOGIN" onclick="return ValidateForm();" class="submit-btn">
                    <br><br>
                    <center>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <?php
$licenseKeyError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validateLicense'])) {
    $licenseKey = trim($_POST['licenseInput']);

    if (empty($licenseKey)) {
        $licenseKeyError = 'Please enter a license key.';
    } else {
        $conn = mysqli_connect("localhost", "root", "", "loginotp");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $licenseKey = mysqli_real_escape_string($conn, $licenseKey);

        $checkLicenseQuery = "SELECT COUNT(*) as count FROM license_keys WHERE key_value = '$licenseKey'";
        $result = mysqli_query($conn, $checkLicenseQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count > 0) {
                mysqli_close($conn);
                header("Location: signup2.php?license_key=" . urlencode($licenseKey));
                exit(); 
            } else {
                $licenseKeyError = 'License key does not exist. Please enter a valid license key.';
            }
        } else {
            $licenseKeyError = 'Error checking license key: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>
<?php
$licenseKeyError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validateLicenselogin'])) {
    $licenseKey = trim($_POST['licenseInput']);

    if (empty($licenseKey)) {
        $licenseKeyError = 'Please enter a license key.';
    } else {
        $conn = mysqli_connect("localhost", "root", "", "loginotp");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $licenseKey = mysqli_real_escape_string($conn, $licenseKey);

        $checkLicenseQuery = "SELECT COUNT(*) as count FROM license_keys WHERE key_value = '$licenseKey'";
        $result = mysqli_query($conn, $checkLicenseQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count > 0) {
                mysqli_close($conn);
                header("Location: login.php?license_key=" . urlencode($licenseKey));
                exit(); 
            } else {
                $licenseKeyError = 'License key does not exist. Please enter a valid license key.';
            }
        } else {
            $licenseKeyError = 'Error checking license key: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
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