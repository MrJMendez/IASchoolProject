<?php 
  
  include("prosetup.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">HiQual </h2>
                        <h2 class="form-title">Sign up Now</h2>
                        <form method="POST" class="register-form" id="register-form" action="signUp.php">
                            <div class="form-group">
                                <label class="zmdi zmdi-account material-icons-name"></label>
                                <input type="text" name="firstName" id="name" placeholder="First Name" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-account material-icons-name"></label>
                                <input type="text" name="lastName" id="name" placeholder="Last Name" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-phone"></label>
                                <input type="number" name="phoneNumber" id="name" placeholder="Phone Number" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-email"></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-lock"></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>

                            <div class="form-group">
                                <label  class="zmdi zmdi-pin-drop"></label>
                                <input type="text" name="address" id="pass" placeholder="Address" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-pin-drop"></label>
                                <input type="text" name="state" id="pass" placeholder="State"/>
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-pin-drop"></label>
                                <input type="text" name="city" id="pass" placeholder="City"/>
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-pin-drop"></label>
                                <input type="text" name="country" id="pass" placeholder="Country" required />
                            </div>
                            <div class="form-group">
                                <label class="zmdi zmdi-pin-drop"></label>
                                <input type="text" name="zip" id="pass" placeholder="Zip Code"/>
                            </div>
                    
                    
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="signIn.php" class="signup-image-link">I am already member</a>
                        <a href="../index.php" class="signup-image-link">Go Back To Home Page</a>
                    </div>
                </div>
  <div> <?php echo $error; ?></div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>