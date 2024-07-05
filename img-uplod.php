<?php

if (isset($_POST['upload_photo'])) {
    if ($_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {

        $file_tmp_name = $_FILES['profile_photo']['tmp_name'];
        $file_name = $_FILES['profile_photo']['name'];
        $file_destination = 'uploads/' . $file_name; // Change 'uploads/' to your desired upload directory

        include('dbconnect.php');
        $username = $_SESSION['username'];
        if (move_uploaded_file($file_tmp_name, $file_destination)) {
            // Debugging: Check the value of $file_destination
            // Update the profile_pic column in the users table
            $sql = "UPDATE users SET `profile_pic` = '$file_destination' WHERE `username` = '$username'";
            mysqli_query($conn, $sql);
            // Redirect to admin.php after successful upload
            header('Location: admin.php');
            exit(); // Ensure that no further code is executed
        } else {
            echo "Error uploading file.";
        }

        $conn->close();
    } else {
        echo "Error uploading file.";
    }
}
?>
