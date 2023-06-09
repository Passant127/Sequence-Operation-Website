<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="stylle.css">
    </head>
    <body>

        <div class="nav">
            <a href="login.php">Logout</a>
            <a href="sequence.php">Sequence</a>
            <a href="register.php">Register</a>
            <a href="about.php">About</a>
            <a href="home.php">Home</a>
           
           </div>
           <div class="clearfix"></div>
        <div class="seqback" style="margin-top: 0px;height:900px;">
            <div class="container">
                <h1 style="padding-top: 80px;color:white;" class="profile-header">Your Profile :</h1>
                <form method="POST" action="db.php">
                <?php
                 session_start();
                 if(!isset($_SESSION['username'])){
                    header('Location: login.php');
                    exit;
                 }
                 if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['email']) && isset($_SESSION['age']) && isset($_SESSION['phone'])){
                    $username = $_SESSION['username'];
                    $password = $_SESSION['password'];
                    $email = $_SESSION['email'];
                    $age = $_SESSION['age'];
                    $phone = $_SESSION['phone'];
                    $userid = $_SESSION['id'];
                 } 
                 ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly class="editable">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" value="<?php echo $password; ?>" readonly class="editable">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly class="editable">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" readonly class="editable">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" id="age" name="age" value="<?php echo $age; ?>" readonly class="editable">
                </div>
                <div class="form-group">
                    <input type="button" class="submit-btn" value="Change" name="change" id="changeButton" onclick="enableEdit()">
                    <input type="submit" class="submit-btn" value="Save" name="save2" id="saveButton" style="display: none;">
                </div>
                </form>
                <hr style="margin-top:20px;">
                <?php 
                        $connection = mysqli_connect('localhost', 'root', 'usbw', 'user');
                        $query = "SELECT operation, result FROM operations WHERE userid = $userid";
                        $result = mysqli_query($connection, $query);

                        // Create an empty array to store the user operations
                        $operations = array();

                        // Iterate over the query result and populate the array
                        while ($row = mysqli_fetch_assoc($result)) {
                            $operations[] = $row;
                        }
                        mysqli_close($connection);
                ?>
                <textarea readonly class="textarea-operations"><?php 
                                        if (!empty($operations)) {
                                            foreach ($operations as $operation) {
                                                echo "Your Operation Name :".$operation['operation'] . "\n";
                                                echo $operation['result'] . "\n";
                                                echo "----------------------------------------------------------------------------"."\n";
                                            }
                                        }
                                    ?></textarea>
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
        function enableEdit() {
            var inputs = document.getElementsByClassName('editable');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].readOnly = false;
            }
            document.getElementById('changeButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'block';
        }
    </script>
</html>