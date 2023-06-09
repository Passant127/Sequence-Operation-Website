<!DOCTYPE html>
<html>
    <head>
        <title>BioWeb/Login</title>
        <link rel="stylesheet" href="stylle.css">
        <script  src="validation.js"></script>

    </head>
    <body>
        <div class="nav">
            
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="about.php">About</a>
            <a href="home.php">Home</a>
           </div>
           <div class="loginback">
            <div class="log">
                <div class="login-form">
                    <br>
                    <br>
                    <h2 class="login-title">Login</h2>
                    <form method="POST" action="db.php">
                        <br>
                        <br>
                        <label for="username"> Username:</label>
                        <input type="text" id="username" name="username"><br>
                        <p id="username-error" class="error"></p>
                        <br>
                        <label for="password"> Password:</label>
                        <input type="password" id="password" name="password"><br>
                        <p id="password-error" class="error"></p>
                       <div class="logdetails">
                
                     
                        <p id="error"><?php echo isset($_GET['error']) ? $_GET['error'] : ""; ?></p>
                        <br>
                        <input type="submit" name="login_submit" value="login" onclick="return validateLoginForm();" class="login">
                       </div>
                    </form>
                    <p class="signup"> <span>Don't have an account ?  
                    </span> <a href="register.php"> Sign Up</a></p>
                </div>
            </div>
         </div>




        <div class="contact_info">
            <p class="contact">Contact Us:</p>
            <p class="contact2">
              <span><img class="phone" src="telephone.png">+20 1123456789</span>
              <span><img class="email" src="email.png">ahmed123456@gmail.com</span>
              <span><img class="location" src="icons8-location-50.png">2001 Zimmerman Lane, New York</span>
            </p>
            <p class="contact-info-text">Get in touch with us if you have any questions or comments.</p>
          </div>
    </body>
</html>