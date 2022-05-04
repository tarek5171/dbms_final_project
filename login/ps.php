<?php
session_start();

$error = "";

$servername = "localhost";
$username = "root";
$password = null;
$db_database = "final_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



	$uname="ta";
    $sql = "SELECT id FROM employees WHERE fullname=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user_id2 = $result->fetch_assoc(); // fetch data 
    $user_id = strval(reset($user_id2));

echo $user_id;
?>