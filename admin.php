<?php
session_start();
$username = $_SESSION["username"];
if (!isset($_SESSION["username"])) {
    header("Location:logerhome.php");
    exit();
}
include("img-uplod.php");

if (isset($_POST['detail'])) {
    include 'dbconnect.php';
    $username = $_SESSION["username"];
    $name = $_POST['name'];
    $mob = $_POST['mobno'];
    $gend = $_POST['gender'];
    $gender = htmlspecialchars($gend);
    $desig = $_POST['desig'];
    $locat = $_POST['locat'];
    $about = $_POST['about'];
    $tran = $_POST['exp'];

    // Get user_id from the users table
    $sql_get_user_id = "SELECT user_id FROM users WHERE username = ?";
    $stmt_get_user_id = $conn->prepare($sql_get_user_id);
    $stmt_get_user_id->bind_param("s", $username);
    $stmt_get_user_id->execute();
    $stmt_get_user_id->bind_result($user_id);
    $stmt_get_user_id->fetch();
    $stmt_get_user_id->close();

    if ($user_id) {
        // Check if the user already has an entry in the personal table
        $search_sql = "SELECT * FROM personal WHERE user_id = ?";
        $stmt_search = $conn->prepare($search_sql);
        $stmt_search->bind_param("i", $user_id);
        $stmt_search->execute();
        $stmt_search->store_result();
        $num = $stmt_search->num_rows;
        $stmt_search->close();

        if ($num == 0) {
            // Insert new record
            $sql_insert = "INSERT INTO personal (user_id, full_name, gender, contact_no, designation, location, training_exp, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("isssssss", $user_id, $name, $gender, $mob, $desig, $locat, $tran, $about);

            if ($stmt_insert->execute()) {
                echo "<script type='text/javascript'>alert('Data Inserted Successfully');</script>";
            } else {
                echo "Error: " . $stmt_insert->error;
            }

            $stmt_insert->close();
        } else {
            // Update existing record
            $sql_update = "UPDATE personal SET full_name = ?, gender = ?, contact_no = ?, designation = ?, location = ?, training_exp = ?, about = ? WHERE user_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sssssssi", $name, $gender, $mob, $desig, $locat, $tran, $about, $user_id);

            if ($stmt_update->execute()) {
                echo "<script type='text/javascript'>alert('Data Updated Successfully');</script>";
            } else {
                echo "Error: " . $stmt_update->error;
            }

            $stmt_update->close();
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylelog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <!-- <?php include("loader.php"); ?> -->
    <?php include('data.php'); ?>
    <?php include("navbar.php"); ?>
    <!--end nav-->
    <main>
        <section class="profile-container">
            <div class="profile-header">
                <div>
                    <h1>My Profile</h1>
                </div>

            </div>
            <div id="pro-sect-1">
                <div class="profile-info" id="pro-about">
                    <h2>About</h2>
                    <!-- profile picture -->
                    <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column flex-wrap">
    <?php
    include('dbconnect.php');
    $user = $_SESSION['username'];
    $sql = "SELECT profile_pic FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row) {
        echo '<div class="position-relative d-inline-block">';
        echo '<img src="' . $row['profile_pic'] . '" alt="" id="pro-img" class="img-fluid">';
        echo '<label for="profile-photo" class="position-absolute bottom-0 mx-auto me-2 mb-2">';
        echo '<span class="material-symbols-outlined">photo_camera</span></label>';
        echo '</div>';
    } else {
        echo '<div class="position-relative d-inline-block">';
        echo '<img src="" alt="" id="pro-img" class="img-fluid">';
        echo '<label for="profile-photo" class="position-absolute bottom-0 mx-auto me-2 mb-2">';
        echo '<span class="material-symbols-outlined">photo_camera</span></label>';
        echo '</div>';
    }
    $conn->close();
    ?>
    <input type="file" id="profile-photo" name="profile_photo" class="d-none">
    <button class="upload-btn btn btn-outline-success m-2" type="submit" name="upload_photo">Upload Photo</button>
</form>

                    <!-- end -->

                    <p id="user-name"><?php echo $PreUsername; ?></p>
                    <p><?php echo $Designation; ?></p>
                    <p><?php echo $TrainingExp; ?>+ Work Experience</p>
                    <p><?php echo $ContactNo; ?></p>
                    <p><?php echo $Location; ?></p>
                </div>

                <div class="profile-section" id="pro-info">
                    <div class="arr">
                        <h2>Personal Info</h2>
                        <span class="material-symbols-outlined" id="editable" onclick="toggleEdit()">
                            edit
                        </span>
                    </div>
                    <form action="" method="post">
                        <label for="full-name">Full Name:</label>
                        <input type="text" id="full-name" value="<?php echo $FullName; ?>" name="name" readonly>
                        <label for="contact-number">Contact Number:</label>
                        <input type="tel" id="contact-number" value="<?php echo $ContactNo; ?>" name="mobno" readonly>
                        <label for="designation">Designation:</label>
                        <input type="text" id="designation" value="<?php echo $Designation; ?>" name="desig" readonly>
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" readonly>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="location">Location:</label>
                        <input type="text" id="location" value="<?php echo $Location; ?>" name="locat" readonly>
                        <label for="designation">Training Experience:</label>
                        <input type="text" id="training-experience" value="<?php echo $TrainingExp; ?>+ Years" name="exp" readonly>
                        <label for="designation">About:</label>
                        <input type="text" id="about" value="<?php echo $About; ?>" name="about" readonly>
                        <button class="save-btn" type="submit" name="detail">Save Changes</button>
                    </form>
                </div>
            </div>
            <?php
            include("dbconnect.php");
            $sql1 = "SELECT * 
           FROM users JOIN premium 
           ON users.user_id = premium.user_id 
           WHERE users.username='" . $_SESSION['username'] . "';";

            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                //Premium exists
                $row1 = $result1->fetch_assoc();
            ?>
                <div class="profile-section">
                    <h2>Premium</h2>
                    <p>Membership :<?php echo $row1['meb_name']; ?></p>
                    <p>(Expires on <?php echo $row1['exp_date']; ?>)</p>
                </div>

            <?php
            }
            ?>
            <div class="profile-section">
                <h2>Bio</h2>
                <p>Hey I'm <?php echo $username = $_SESSION["username"]; ?></p>
                <p><?php echo $About; ?></p>
            </div>
            <div class="profile-section">
                <h2>Training Experience</h2>
                <p><?php echo $TrainingExp; ?>+ Years</p>

            </div>
            <!-- Connect with me block -->
            <!-- <div class="profile-section">
                <h2>Connect with</h2>
                <div>
                    <a href="">
                        <i class="fa-brands fa-facebook" id="tej-icon"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-twitter" id="tej-icon"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-google" id="tej-icon"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-instagram" id="tej-icon"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-linkedin" id="tej-icon"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-github" id="tej-icon"></i>
                    </a>
                </div>
            </div> -->
        </section>
        <?php include("contact.php"); ?>
    </main>
    <script>
        function toggleEdit() {
            const fields = document.querySelectorAll('#pro-info input, #pro-info select');
            fields.forEach(field => {
                if (field.hasAttribute('readonly') || field.hasAttribute('disabled')) {
                    field.removeAttribute('readonly');
                    field.removeAttribute('disabled');
                } else {
                    field.setAttribute('readonly', 'readonly');
                    field.setAttribute('disabled', 'disabled');
                }
            });
        }
    </script>
</body>

</html>