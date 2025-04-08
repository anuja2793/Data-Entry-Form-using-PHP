<?php 
$servername = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$dbname = "employee"; 

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data
    $sql = "SELECT * FROM employee_data WHERE id=$id"; 
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $name1 = $_POST['name1']; 
        $email = $_POST['email']; 
        $phone_no = $_POST['phone_no']; 
        $address1 = $_POST['address1']; 
        $department = $_POST['department']; 

        $stmt = $conn->prepare("UPDATE employee_data SET name1=?, email=?, phone_no=?, address1=?, department=? WHERE id=?"); 
        $stmt->bind_param("sssssi", $name1, $email, $phone_no, $address1, $department, $id); 

        if ($stmt->execute()) { 
            echo "<script>alert('✅ Record updated successfully'); window.location.href='Display.php';</script>";
        } else { 
            echo "❌ Error updating record: " . $conn->error; 
        } 
    }
} else {
    echo "❗ No ID specified in URL.";
    exit;
}

$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Update Your Employee Data Entry</h3>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" value="<?php echo $row['name1']; ?>" name="name1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" value="<?php echo $row['phone_no']; ?>" name="phone_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" value="<?php echo $row['address1']; ?>" name="address1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Department</label>
                <input type="text" value="<?php echo $row['department']; ?>" name="department" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="Display.php" class="btn btn-secondary">View</a>
        </form>
    </div>
</body>
</html>
