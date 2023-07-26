<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        


        body {
        background-image: url('https://img.freepik.com/premium-photo/open-book-with-graduation-hat-light-bulb-education-learning-school-university-idea-concept-3d-illustration_56345-604.jpg?w=2000');
     
        height: 100%;
        width: 100%;
    }

        .dashboard-container {
            padding: 20px;
        }

        .dashboard-card {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card h2 {
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard-card p {
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        /* Custom CSS for colorful card */
        .card-color {
            background: linear-gradient(45deg, #FF5733, #FFD633, #33FF57, #33D8FF, #8B33FF);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            color: #fff;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }


       
    </style>
</head>
<body>


<?php include('templates/common/nav.php') ?>
    <div class="container dashboard-container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="dashboard-card card-color">
                    <h2>T.S.C</h2>
                    <p>Total Students: 400</p>
                    <p>Total Teachers: 50</p>
                </div>

                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add the Bootstrap JS script link here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

