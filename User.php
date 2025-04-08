<?php 
$servername = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$dbname = "employee"; 

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name1 = $_POST['name1']; 
    $email = $_POST['email']; 
    $phone_no = $_POST['phone_no']; 
    $address1 = $_POST['address1']; 
    $department = $_POST['department']; 

    $sql = "INSERT INTO employee_data (name1, email, phone_no, address1, department) 
            VALUES ('$name1', '$email', '$phone_no', '$address1', '$department')"; 

    if ($conn->query($sql) === TRUE) { 
        echo "<script>alert('New record created successfully');</script>"; 
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
} 

$conn->close(); 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <title>Employee Data Entry</title> 
</head> 
<body> 
    <div class="container my-5"> 
        <h3>Employee Data Entry</h3> 
        <form method="post" action="User.php"> 
            <div class="mb-3"> 
                <label class="form-label">Name</label> 
                <input type="text" name="name1" placeholder="Enter your name" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label class="form-label">Email</label> 
                <input type="email" name="email" placeholder="Enter your Email" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label class="form-label">Phone Number</label> 
                <input type="text" name="phone_no" placeholder="Enter your phone number" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label class="form-label">Address</label> 
                <input type="text" name="address1" placeholder="Enter your Address" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label class="form-label">Department</label> 
                <input type="text" name="department" placeholder="Enter your department" class="form-control" required> 
            </div> 
            <button type="submit" class="btn btn-success">Submit</button> 
            <a href="display.php" class="btn btn-primary">View Records</a> 
        </form> 
    </div> 
</body> 
</html>
