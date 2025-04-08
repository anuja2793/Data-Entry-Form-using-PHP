<?php 
$servername = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$dbname = "employee"; 

$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <title>Employee Records</title> 
</head> 
<body> 
    <div class="container"> 
        <h2 class="my-4">Employee Records</h2>
        <button class="btn btn-primary mb-3">
            <a href="User.php" class="text-light" style="text-decoration: none;">Add User</a>
        </button>  
         
 
        <table class="table table-bordered table-striped"> 
            <thead class="table-dark"> 
                <tr> 
                    <th scope="col">Sr No</th> 
                    <th scope="col">Name</th> 
                    <th scope="col">Email</th> 
                    <th scope="col">Phone No</th> 
                    <th scope="col">Address</th> 
                    <th scope="col">Department</th> 
                    <th scope="col">Operations</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                $sql = "SELECT * FROM employee_data"; 
                $result = mysqli_query($conn, $sql); 
                if($result) { 
                    while($row = mysqli_fetch_assoc($result)) { 
                        $id = $row['id']; 
                        $name = $row['name1']; 
                        $email = $row['email']; 
                        $phone_no = $row['phone_no']; 
                        $address = $row['address1']; 
                        $department = $row['department']; 

                        echo ' 
                        <tr> 
                            <th scope="row">' . $id . '</th> 
                            <td>' . $name . '</td> 
                            <td>' . $email . '</td> 
                            <td>' . $phone_no . '</td> 
                            <td>' . $address . '</td> 
                            <td>' . $department . '</td> 
                            <td>  
                                <a href="update.php?id=' . $id . '" class="btn btn-primary btn-sm">Update</a> 
                                <a href="delete.php?deleteid=' . $id . '" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm(\'Are you sure you want to delete this record?\')">
                                   Delete
                                </a> 
                            </td>     
                        </tr>'; 
                    } 
                } 
                ?> 
            </tbody> 
        </table> 
    </div> 
</body> 
</html>
