<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "usbw";
$dbname ="user";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if(isset($_POST["register_submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $sql = "INSERT INTO info (username,password,email,phone,age) VALUES ('$username','$password','$email','$phone','$age') ";
    if ($conn->query($sql) === TRUE)
    {
       header("Location: login.php");
       exit;
    }
    else
    {
    echo "Error: " . $sql . "<br>" . $Conn->error;
    }
}

if(isset($_POST["login_submit"])){
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    $password = $_POST['password'];
    $_SESSION['password'] = $password;
    $sql = "SELECT * FROM info WHERE BINARY username = '$username' AND BINARY password = '$password'";
    
    $sqlemail = "SELECT email FROM info WHERE username = '$username' AND password = '$password'";
    $resemail = $conn->query($sqlemail);
    $emailRow = $resemail->fetch_assoc();
    $_SESSION['email'] = $emailRow['email'];
    
    $sqlphone = "SELECT phone FROM info WHERE username = '$username' AND password = '$password'";
    $resphone = $conn->query($sqlphone);
    $phoneRow = $resphone->fetch_assoc();
    $_SESSION['phone'] = $phoneRow['phone'];
    
    $sqlage = "SELECT age FROM info WHERE username = '$username' AND password = '$password'";
    $resage = $conn->query($sqlage);
    $ageRow = $resage->fetch_assoc();
    $_SESSION['age'] = $ageRow['age'];

    $sqlid = "SELECT id FROM info WHERE username = '$username' AND password = '$password'";
    $resid = $conn->query($sqlid);
    $idRow = $resid->fetch_assoc();
    $_SESSION['id'] = $idRow['id'];
    $res = $conn->query($sql);
    if($res->num_rows>0){
        header('Location: sequence.php');
        exit;
    }else{
        $errorMessage = "Username or password incorrect";
        header("Location: login.php?error=" . urlencode($errorMessage));
    }
}
if (isset($_POST['save'])) {
    $username = $_SESSION['username'];
    $operation = $_SESSION['operation'];

    $useridQuery = "SELECT id FROM info WHERE username = '$username'";
    $result = $_POST['textarea'];

    $useridResult = $conn->query($useridQuery);
    if ($useridResult->num_rows > 0) {
        $useridRow = $useridResult->fetch_row();
        $userid = $useridRow[0];
        $sql = "INSERT INTO operations (userid,operation,result) VALUES ('$userid', '$operation','$result')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['save-message'] = 'Result Saved';
            header('Location: result.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
}
if(isset($_POST['delete'])){
    $result = $_POST['textarea'];
    $query = "DELETE FROM operations WHERE result = '$result'";
    if ($conn->query($query) === TRUE){
        $_SESSION['delete-message'] = 'Result Deleted';
        header('Location: result.php');
        exit;
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
if(isset($_POST['save2'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $userid = $_SESSION['id'];

    $sql = "UPDATE info SET password = '$password', email = '$email', phone = '$phone', age = '$age' , username = '$username' WHERE id = '$userid';";
    if ($conn->query($sql) === TRUE)
    {
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['age'] = $age;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
       header('Location: profile.php');
       exit;
    }
    else
    {
    echo "Error: " . $sql . "<br>" . $Conn->error;
    }   
}
if(isset($_POST['back'])){
    header('Location: sequence.php');
    exit;
}
// Close connection
$conn->close();
?>