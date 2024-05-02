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
  require_once 'config.php';

  function Message($location, $error) {
    echo "<script>alert('$error'); window.location.href = '$location';</script>";
  }

  if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "loginotp");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM userss WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
      Message("login.php", "Email not found.");
      exit();
    }

    $user = mysqli_fetch_object($result);

    if (!password_verify($password, $user->password)) {
      Message("login.php", "Incorrect password.");
      exit();
    }

    if ($user->email_verified_at == null) {
      header("Location: email-verification.php?email=" . $email);
      exit();
    }

    header("Location: Archidashboard.php");
    exit();
  }
  ?>
  
<form method="post" >
<div class="login-content">
  <div class="content">
        <center><h1>Sign In</h1></center><br>
        <div class="forms">
            <div class="rows">
                <h4>Email</h4>
                <input type="text" class="input" name="email">
                <center><span id="username" style="color: red;"></span></center>
                <h4>Password</h4>
                <input type="password" class="input" name="password">
                <center><span id="password" style="color: red;"></span></center>
                <br>
                <input id="openModalButton" name="login" type="submit" value="Sign In" class="submit-btn">
                    <br>
                    <div class="signin-options">
    <a href="<?php echo $client->createAuthUrl(); ?>" class="google-btn">
        <i class="fab fa-google icons"></i> Sign in with Google
    </a>
</div>
</div>

  

  <script>
    function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>
</body>
</html>