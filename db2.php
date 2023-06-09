<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "genome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sequence_sql = "SELECT gene_id,gene_sequence FROM genes";
$res_sequence = $conn->query($sequence_sql);
echo $res_sequence->num_rows;
if($res_sequence && $res_sequence->num_rows >0){
    $gene_data = array();

    while($row = $res_sequence->fetch_assoc()){
        $gene_id = $row['gene_id'];
        $gene_sequence = $row['gene_sequence'];
        
        $gene_data[$gene_id] = $gene_sequence;
    }
    $_SESSION['gene_data'] = $gene_data;
}


$conn->close();

header("Location: sequence.php");
exit();
?>
