<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: Materials.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wwww.math.boost.login.ca.za</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login-reg.css">
    
</head>
<body>
    <!------------------------------------navigation bar-------------------------------->
    <header class="page-navigation">
    <a href="index.html">Hompepage</a>
    <a href="Price Plan.html">Pricing</a>
    <a href="contact Us.html">Help Center</a>
    <a href="About Us.html">About Us</a>
    <a href="services.html">Services</a>
    <a href="https://scitechdaily.com/tag/mathematics/">News</a>
   </header>

        <h1 class="welcoming">Welcome to Math boost login page</h1>
        <p class="message">"Welcome to the world of math, where every problem holds a key to unlock the beauty of the universe."</p>

    <div class="container">
           <h3>Registered Users</h3>
        <?php

        require_once "database.php";

        if (isset($_POST["login"])) {
           $email = mysqli_real_escape_string($conn, $_POST['email']);
           $inputPassword = $_POST["password"];

           
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

           
            if ((mysqli_num_rows($result) == 1)) {
                $user = mysqli_fetch_assoc($result);
                $dbpassword = $user['password'];

                if (password_verify($dbpassword, crypt( $inputPassword,$dbpassword))) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: Materials.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>You entered invalid password</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>This email is not found</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="login-btn">
        </div>
      </form>
     <div class="not-registered"><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>