<?php 
$servername = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$dbname = "employee"; 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
if(isset($_GET['deleteid'])) { 
$id = $_GET['deleteid']; 
$sql = "DELETE FROM employee_data WHERE id=$id"; 
$result = mysqli_query($conn, $sql); 
if($result) { 
header('Location: Display.php'); 
exit;  
} else { 
die(mysqli_error($conn)); 
} 
} 
?>