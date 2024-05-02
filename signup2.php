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
  <?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    require_once 'config.php';

    if (isset($_POST["register"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        $mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = 0;
 
            $mail->isSMTP();
 
            $mail->Host = 'smtp.gmail.com';
 
            $mail->SMTPAuth = true;
 
            $mail->Username = 'albis.garry.06072002@gmail.com';
 
            $mail->Password = 'ryoyoewmduwrvrwo
            ';
 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            $mail->Port = 587;
 
            $mail->setFrom('albis.garry.06072002@gmail.com', 'ARCHIBOT');
 
            $mail->addAddress($email, $name);
 
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            $conn = mysqli_connect("localhost", "root", "", "loginotp");
            $check_email_sql = "SELECT COUNT(*) as count FROM (
              SELECT email FROM userss WHERE email = '" . $email . "'
              UNION ALL
              SELECT email FROM users WHERE email = '" . $email . "'
          ) AS combined_emails";
                $result = mysqli_query($conn, $check_email_sql);
            
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $email_count = $row['count'];
            
                if ($email_count > 0) {
                    // Email already exists, show alert or take appropriate action
                    echo "<script>alert('Email already exists!');</script>";
                } else {
                    // Email doesn't exist, proceed with insertion
                    $sql = "INSERT INTO userss(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
                    mysqli_query($conn, $sql);
            
                    // Redirect to email verification page
                    header("Location: email-verification.php?email=" . $email);
                    exit(); // Ensure script stops executing after redirection
                }
            } else {
                // Error in SQL query execution
                echo "Error: " . mysqli_error($conn);
            }            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    ?>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="login-content">
        <div class="content">
            <center>
                <h1 class="padding-bottom1">Sign Up</h1>
            </center><br>
            <div class="forms">
                <div>
                <h4>Name</h4>
                    <input type="text" class="input" name="name"> 
                    <center><span id="username" style="color: red;"></span></center>
                    <h4>Email</h4>
                    <input type="text" class="input" name="email"> 
                    <center><span id="username" style="color: red;"></span></center>
                    <h4>Password</h4>
                    <input type="password" class="input" name="password"> 
                    <center><span id="password" style="color: red;"></span></center>
                    <div class="spacing1"></div>
                    <input type="submit" value="Validate" name="register" class="submit-btn">
                    <br>


                        <!--
                            <button class="microsoft-btn"><i class="fab fa-windows icons"></i>Sign in with Microsoft</button>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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