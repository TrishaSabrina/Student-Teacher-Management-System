<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $assi = $_POST['assi'];
    $cls = $_POST['cls'];

    $sql = "UPDATE teachers SET name='$id', name='$name', email='$email', phone='$phone', assi='$assi', cls='$cls' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: teachers.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM teachers WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS to style the form */
        form {
            width: 300px;
            margin: auto;
            margin-top: 50px;
        }
        
        form label {
            font-weight: bold;
        }
        
        form input[type="text"],
        form input[type="email"],
        form input[type="phone"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
<?php include('templates/common/nav.php') ?>

    <h2 class="text-center mt-3">Edit Teacher</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
                    <label>Phone:</label>
                    <input type="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br>
                    <label>Assign To:</label>
                    <input type="number" name="assi" value="<?php echo $row['assi']; ?>" required><br>
                    <label>Class Time:</label>
                    <input type="time" name="cls" value="<?php echo $row['cls']; ?>" required><br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <a href="teachers.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <!-- Add the Bootstrap JS script link here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
