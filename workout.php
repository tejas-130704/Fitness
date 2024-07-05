<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location:logerhome.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Selector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stylelog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="workoutstyle.css">
</head>

<body>
<?php include('navbar.php') ?>
    <div class="container" id="main-con" style="margin-top: 100px;">
        <div class="head" >
            <div class="logo">
                <div id="img"></div>
                <span id="head-name">ReClaim FITNESS</span>
            </div>


            <div class="remain">
                <div class="profile-container">
                    <span class="material-symbols-outlined" id="profile-icon">
                        account_circle
                    </span>
                    <div class="dropdown-content">
                        <a href="admin.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                
            </div>
        </div>
        <h3>Select Your Equipment</h3>
        <div class="equipment-container" id="equipment-container">
            <div class="equipment" data-instrument="bodyweight">
                <img src="images/bodyweight.png" alt="Bodyweight">
                <p>Bodyweight</p>
            </div>
            <div class="equipment" data-instrument="dumbbell">
                <img src="images/dumbbell.png" alt="Dumbbell">
                <p>Dumbbell</p>
            </div>
            <div class="equipment" data-instrument="barbell">
                <img src="images/barbell.png" alt="Barbell">
                <p>Barbell</p>
            </div>
            <div class="equipment" data-instrument="belt">
                <img src="images/band.png" alt="belt">
                <p>Belt</p>
            </div>
            <div class="equipment" data-instrument="Plates">
                <img src="images/plate.png" alt="plates">
                <p>Plates</p>
            </div>
            <div class="equipment" data-instrument="Machine">
                <img src="images/machine.webp" alt="machine">
                <p>Machine</p>
            </div>
        </div>

        <h3>Exercises</h3>
        <div class="exercises-container" id="exercises-container"></div>
    </div>

    <div id="video-modal" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <video id="exercise-video" controls></video>
                <div class="description">
                    <h5 id="exercise-title"></h5>
                    <p id="exercise-description"></p>
                </div>
            </div>
            <div class="modal-header">
                <span id="close-button">&times;</span>
            </div>
        </div>
    </div>
    <div id="success-message" class="success-message">Successfully added!</div>

    <script src="workoutscript.js"></script>
</body>

</html>
