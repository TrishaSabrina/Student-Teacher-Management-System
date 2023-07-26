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
    $sql = "DELETE FROM teachers WHERE id = '$userId'";
    if ($conn->query($sql) === TRUE) {
        header("Location: teachers.php");
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
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS to style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
<?php include('templates/common/nav.php') ?>
    <div class="container">
        <h2 class="mt-3">Teachers List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Assign To</th>
                <th>Class Time</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM teachers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['assi'] . "</td>";
                    echo "<td>" . $row['cls'] . "</td>";
                    echo "<td><a href='tedit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a> | <a href='teachers.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No users found.</td></tr>";
            }
            ?>
        </table>
        <a href="tcreate.php" class="btn btn-success mt-3">Add New Teacher</a>
        <a href="index.php" class="btn btn-secondary mt-3">Back</a>
    </div>

    <!-- Add the Bootstrap JS script link here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
