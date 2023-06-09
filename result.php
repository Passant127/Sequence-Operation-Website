<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="stylle.css">
    <style>
        .button {
            background-color: white;
            color: #033045;
            border: none;
            padding: 30px 10px;
            font-size: 20px;
          }
          .button:hover {
            background-color: #e2dada;
          }
          
    </style>
</head>
<body>
    <div class="nav">
            <a href="home.php">Logout</a>
            <a href="profile.php">Profile</a>
            <a href="register.php">Register</a>
            <a href="about.php">About</a>
            <a href="home.php">Home</a>
    </div>
    <div class="seqback" style="margin-top: 0px;height:600px;">
        <div class="container">
            <h1 style="padding-top: 80px;color:white;">Your Result :</h1>
            <form method="POST" action="db.php">
            <?php session_start(); ?>
              <textarea style="width: 800px;height: 300px;margin-top:20px;margin-bottom :10px;font-size:20px" readonly name="textarea"><?php 
                  echo $_SESSION['result'];
              ?></textarea>
              <p>Your Operation Is : <?php echo $_SESSION['operation']; ?></p>
              <p style="margin-bottom: 10px;">You Can :</p>
              <input type="submit" class="button" value="Save" name="save" onclick="return saved();">
              <input type="submit" class="button" value="Delete" name="delete">
              <input type="submit" class="button" value="Back" name="back">
              <?php if (isset($_SESSION['save-message'])): ?>
                <p style="color:white;"><?php echo $_SESSION['save-message']; ?></p>
                <?php unset($_SESSION['save-message']); ?>
              <?php endif; ?>
              <?php if (isset($_SESSION['delete-message'])): ?>
                <p style="color:white;"><?php echo $_SESSION['delete-message']; ?></p>
                <?php unset($_SESSION['delete-message']); ?>
              <?php endif; ?>
            </form>
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
<script>
</script>
</html>