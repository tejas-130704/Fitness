<?php
session_start();
$error = $success = $username_err = $password_err = $email_err = "";

if (isset($_POST['submit_2'])) {
    $username = $password = $confirm_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'dbconnect.php';

        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $username = trim($_POST["username"]);
        }

        if (empty($_POST["email"])) {
            $email_err = "Please enter an email.";
        } else {
            if (filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $email = trim($_POST["email"]);
            } else {
                $email_err = "Invalid email address.";
            }
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        if (empty($username_err) && empty($password_err) && empty($email_err)) {
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `date_created`) VALUES ('$username', '$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['username'] = $username;
                    $success = "Signup successful";
                    echo '<script>alert("' . $success . '");window.location.href = "./index.php";</script>';
                    exit(); // Ensure script stops executing after redirect
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            } else {
                $error = "Username already taken";
            }
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReClaim Fitness</title>
    <link rel="stylesheet" href="sigin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div id="main">
        <div id="caromal"></div>
        <div id="data">
            <h1 class="mb-5">Sign Up</h1>
            <form class="form-col" action="" method="post">
                <div class="label-data">
                    <label>Username:</label>
                    <input type="text" name="username">
                    <?php if (!empty($username_err)) echo '<p class="error">' . $username_err . '</p>'; ?>
                </div>
                <div class="label-data">
                    <label>Email:</label>
                    <input type="email" name="email">
                    <?php if (!empty($email_err)) echo '<p class="error">' . $email_err . '</p>'; ?>
                </div>
                <div class="label-data">
                    <label>Password:</label>
                    <input type="password" name="password">
                    <?php if (!empty($password_err)) echo '<p class="error">' . $password_err . '</p>'; ?>
                </div>
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<p class="error">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
                if (!empty($error)) {
                    echo '<p class="error">' . $error . '</p>';
                }
                ?>
                <button type="submit" name="submit_2" class="log-btn" id="sub-btn">Sign Up</button>
                <div class="ask">
                    Already have Account?<a href="logerhome.php" style="text-decoration:none ;"> Login</a>
                </div>
            </form> 
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>