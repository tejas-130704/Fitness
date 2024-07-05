<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location:logerhome.php");
  exit();
}
include("dbconnect.php");
$username=$_SESSION["username"];
$sql = "Select * from users where username='$username'";
			$result = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($result);
			if ($num == 0) {
                header("loged.php");
                exit();
            }else{
                $row = $result->fetch_assoc();
                $username = $row["username"];

            }
            
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Form</title>
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

    <link rel="stylesheet" href="css/specialstyle.css">
</head>

<body onload="myFunction()" style="margin:0;">
 <?php include('loader.php');?>

    <div id="main-body">
    <div id="loading-animation" class="loading-animation"></div>
        <div class="form-container">
            <h2>Fitness Form</h2>
            <div id="fitness-form">
                <div class="form-group inline-radio-group">
                    <label>Goal:</label>
                    <div id="flex-dir">
                        <input type="radio" id="gain-weight" name="goal" value="gain">
                        <label for="gain-weight">Gain Weight</label>
                    </div>
                    <div id="flex-dir">
                        <input type="radio" id="maintain-weight" name="goal" value="maintain">
                        <label for="maintain-weight">Maintain Weight</label>
                    </div>
                    <div id="flex-dir">
                        <input type="radio" id="lose-weight" name="goal" value="lose">
                        <label for="lose-weight">Lose Weight</label>

                    </div>
                </div>

                <div class="form-group inline-radio-group">

                    <label>Dietary Preference:</label>
                    <div id="flex-dir">
                        <input type="radio" id="vegetarian" name="diet" value="vegetarian">
                        <label for="vegetarian">Vegetarian</label>
                    </div>
                    <div id="flex-dir">
                        <input type="radio" id="non-vegetarian" name="diet" value="non-vegetarian">
                        <label for="non-vegetarian">Non-Vegetarian</label>

                    </div>
                    <div id="flex-dir">
                        <input type="radio" id="lacto-ova-vegetarian" name="diet" value="lacto-ova-vegetarian">
                        <label for="lacto-ova-vegetarian">Lacto-Ova Vegetarian</label>

                    </div>
                </div>

                <div class="form-group">
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" required>
                </div>

                <div class="form-group">
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" required>
                </div>
                <div id="result"></div>
                <button type="button" onclick="calculateBMI()">Calculate BMI</button>
                <div class="form-group">
                    <label>Preferred Foods:</label>
                    <div id="flex-dir">
                        <input type="checkbox" id="pulses" name="food" value="pulses">
                        <label for="pulses">Pulses</label>
                    </div>
                    <div id="flex-dir">

                        <input type="checkbox" id="chicken" name="food" value="chicken">
                        <label for="chicken">Chicken</label>
                    </div>
                    <div id="flex-dir">

                        <input type="checkbox" id="salad" name="food" value="salad">
                        <label for="salad">Salad</label>
                    </div>
                    <div id="flex-dir">

                        <input type="checkbox" id="greek-yogurt" name="food" value="greek-yogurt">
                        <label for="greek-yogurt">Greek Yogurt</label>
                    </div>
                    <div id="flex-dir">

                        <input type="checkbox" id="chick-peas" name="food" value="chick-peas">
                        <label for="chick-peas">Chick Peas</label>
                    </div>
                </div>

                <button type="submit" id="sendButton">Submit</button>
            </div>
        </div>

        <div class="container-troy">
            <h1>Standard Diet Plan:</h1>
            <div id="responseOutput"></div>
        </div>
    </div>
    <hr class="w-80 border-2">
    <footer class="text-center">Made by TJ 💖</footer>

    <script src="apigpt.js"></script>
    <script src="specialscript.js"></script>
</body>

</html>