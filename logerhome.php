<?php
session_start(); // Ensure session is started at the beginning

if (isset($_SESSION["username"])) {
  header("Location:index.php");
  exit();
}

// Initialize error and success messages
$error = $success = $username_err = $password_err = $email_err = "";

if (isset($_POST['submit_1'])) {
    include 'dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username or password is empty
        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Username or password cannot be empty";
        } else {
            $sql = "SELECT password FROM users WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['username'] = $username;
                    // Set success message and redirect
                    $_SESSION['success'] = "Login successful";
                 
                    header("Location:index.php");

                    exit(); // Ensure script stops executing after redirect
                } else {
                    $_SESSION['error'] = "Invalid username or password";
                }
            } else {
                $_SESSION['error'] = "No user exists!";
            }
        }
    }
    $conn->close();
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="logerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="main">
        <div id="caromal">
        </div>
        <div id="data">
            <h1 class="mb-5">Log In</h1>
            <form class="form-col" action="" method="post">
                <div class="label-data">
                    <label>Username:</label>
                    <input type="text" name="username">
                </div>
                <div class="label-data">
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <button type="submit" name="submit_1" class="log-btn" id="sub-btn">Submit</button>
                <div class="ask">
                    Don't Have Account?<a href="siginhome.php" style="text-decoration:none ;"> Register</a>
                </div>
            </form>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="error">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            // if(isset($_SESSION['success'])){
            //     echo'<script>alert("' . $_SESSION['success'] . '")</script>';
            //     unset($_SESSION['success']);
            // }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
