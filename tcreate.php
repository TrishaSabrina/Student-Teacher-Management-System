<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $assign = $_POST['assi'];
    $time = $_POST['cls'];

    $sql = "INSERT INTO teachers (id, name, email, phone, assi, cls) VALUES ('$id', '$name', '$email', '$phone', '$assign', '$time')";
    if ($conn->query($sql) === TRUE) {
        header("Location: teachers.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Teacher</title>
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS to style the form */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }
      
    </style>
</head>
<body>
    
<?php include('templates/common/nav.php') ?>
    <div class="container">
     
    <h2 class="mt-3">Create Teacher</h2>

        
      
    
        <form method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="assi">Assign To:</label>
                <input type="number" id="assi" name="assi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cls">Class Time:</label>
                <input type="time" id="cls" name="cls" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Back</a>
    </div>

    <!-- Add the Bootstrap JS script link here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

