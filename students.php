<?php include_once 'db.php'; 
$servername = "localhost"; // Usually "localhost"
$username = "root";
$password = "";
$dbname = "records";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete_id'])) {
    $userId = $_GET['delete_id'];
    $sql = "DELETE FROM users WHERE id = '$userId'";
    if ($conn->query($sql) === TRUE) {
        header("Location: students.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS to style the table and buttons */
        table {
            font-size: 14px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
<?php include('templates/common/nav.php') ?>
    <div class="container">
        <h2 class="mt-3">Students List</h2>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Edit</a> | <a href='students.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </table>

        <div class="btn-container">
            <a href="screate.php" class="btn btn-primary">Add New Student</a>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <!-- Add the Bootstrap JS script link here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
