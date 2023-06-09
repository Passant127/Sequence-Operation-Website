<!DOCTYPE html>
<html>
  <head>
    <title>BioWeb/Register</title>
    <link rel="stylesheet" href="stylle.css" />
  </head>
  <body >
    <div class="nav">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="about.php">About</a>
            <a href="home.php">Home</a>
    </div>
    <div class="registerback" style="height: 900px;">
      <div class="register">
        <div class="register-form">
          <br>
          <h2>Register</h2>
          <br>
          <form onsubmit="return validateForm()" method="POST" action="db.php" name="register">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" /><br /><br />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" /><br /><br />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" /><br /><br />

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" /><br /><br />

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" /><br /><br />
            <div class="buttons">
                <input type="submit" name="register_submit" value="Submit" class="s">
                <button type="reset">Reset</button>
            </div>
          </form>
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

    <script  src="validation.js"></script>
  </body>
</html>

