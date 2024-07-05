<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:logerhome.php");
    exit();
}

include 'dbconnect.php';
$username = $_SESSION["username"];
$popup_message = "";

if (isset($_POST["submit_1"])) {
    $cdate = date('Y-m-d');
    $expdate = date_create($cdate);
    date_add($expdate, date_interval_create_from_date_string("7 days"));
    $expdate_formatted = date_format($expdate, "Y-m-d");

    $price = 0;
    $meb = 'basic';
    $sql = "INSERT INTO `premium` (`user_id`, `buy_date`, `exp_date`, `meb_name`, `price`)
            VALUES ((SELECT user_id FROM users WHERE username='$username'), '$cdate', '$expdate_formatted', '$meb', '$price')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $popup_message = "Congratulations! Your 7-day free trial has started.";
    } else {
        $error = "Error: " . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('$error')</script>";
    }
}

if (isset($_POST["submit2"])) {
    $sql = "SELECT * FROM premium WHERE user_id=(SELECT user_id FROM users WHERE username='$username')";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_array($result);
        $expdate = date_create($row["exp_date"]);
        date_add($expdate, date_interval_create_from_date_string("30 days"));
        $expdate_formatted = date_format($expdate, "Y-m-d");

        $ql = "UPDATE premium SET exp_date='$expdate_formatted' WHERE user_id=(SELECT user_id FROM users WHERE username='$username')";
        $result = mysqli_query($conn, $ql);
        if ($result) {
            $popup_message = "+30 days added to your subscription.";
        } else {
            $error = "Error: " . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$error')</script>";
        }
    } else {
        $cdate = date('Y-m-d');
        $expdate = date_create($cdate);
        date_add($expdate, date_interval_create_from_date_string("30 days"));
        $expdate_formatted = date_format($expdate, "Y-m-d");

        $price = 150;
        $meb = 'advanced';
        $sql = "INSERT INTO `premium` (`user_id`, `buy_date`, `exp_date`, `meb_name`, `price`)
                VALUES ((SELECT user_id FROM users WHERE username='$username'), '$cdate', '$expdate_formatted', '$meb', '$price')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $popup_message = "Congratulations! You are now an Advanced Member.";
            header('Location: special.php');
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$error')</script>";
        }
    }
}

if (isset($_POST["submit3"])) {
    $sql = "SELECT * FROM premium WHERE user_id=(SELECT user_id FROM users WHERE username='$username')";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_array($result);
        $expdate = date_create($row["exp_date"]);
        date_add($expdate, date_interval_create_from_date_string("365 days"));
        $expdate_formatted = date_format($expdate, "Y-m-d");

        $ql = "UPDATE premium SET exp_date='$expdate_formatted' WHERE user_id=(SELECT user_id FROM users WHERE username='$username')";
        $result = mysqli_query($conn, $ql);
        if ($result) {
            $popup_message = "+365 days added to your subscription.";
        } else {
            $error = "Error: " . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$error')</script>";
        }
    } else {
        $cdate = date('Y-m-d');
        $expdate = date_create($cdate);
        date_add($expdate, date_interval_create_from_date_string("365 days"));
        $expdate_formatted = date_format($expdate, "Y-m-d");

        $price = 1000;
        $meb = 'pro';
        $sql = "INSERT INTO `premium` (`user_id`, `buy_date`, `exp_date`, `meb_name`, `price`)
                VALUES ((SELECT user_id FROM users WHERE username='$username'), '$cdate', '$expdate_formatted', '$meb', '$price')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $popup_message = "Congratulations! You are now a Pro Member.";
            header('Location: special.php');
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$error')</script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="css/pricestyle.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 100;
            color:rgba(0, 0, 0, 0.9);
        }

        .popup-content {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: popupFadeIn 0.3s ease;
        }

        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: scale(0.7);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .popup-content p {
            margin: 0 0 20px;
            font-size: 24px;
        }

        .popup-content button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .popup-content button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- <?php include('loader.php'); ?> -->

    <!-- pop up msg start -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <p><?php echo $popup_message; ?></p>
            <button id="okBtn">OK</button>
        </div>
    </div>
    <!-- pop up msg end -->

    <main class="main flow">
        <h1 class="main__heading">Pricing</h1>
        <div class="main__cards cards">
            <div class="cards__inner">
                <?php
                include("dbconnect.php");

                $username = $_SESSION['username'];

                // Prepare the SQL statement to prevent SQL injection
                $presql = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
                $presql->bind_param("s", $username);
                $presql->execute();
                $presql_result = $presql->get_result();

                if ($presql_result->num_rows > 0) {
                    $rest = $presql_result->fetch_assoc();
                    $user_id = $rest['user_id'];

                    // Prepare the SQL statement for the second query
                    $sql = $conn->prepare("SELECT * FROM premium WHERE user_id = ?");
                    $sql->bind_param("i", $user_id);
                    $sql->execute();
                    $result = $sql->get_result();

                    if ($result->num_rows == 0) {
                ?>
                        <form action="" method="post" class="cards__card card" id="submit_1">
                            <h2 class="card__heading">7 Days Free-Trail</h2>
                            <p class="card__price">Rs.0</p>
                            <ul role="list" class="card__bullets flow">
                                <li>Access to standard workouts and nutrition plans</li>
                                <li>Email support</li>
                            </ul>
                            <input type="submit" name="submit_1" class="card__cta cta" value="Get Started">
                        </form>
                <?php
                    }
                }
                $conn->close();
                ?>


                <form action="" method="post" class="cards__card card" id="submit2">
                    <h2 class="card__heading">Advanced</h2>
                    <p class="card__price">Rs.150/month</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Access to advanced workouts and nutrition plans</li>
                        <li>Priority Email support</li>
                        <li>Exclusive access to live Q&A sessions</li>
                    </ul>
                    <input type="submit" name="submit2" class="card__cta cta" value="Upgrade to Pro">
                </form>

                <form action="" method="post" class="cards__card card" id="submit3">
                    <h2 class="card__heading">Pro</h2>
                    <p class="card__price">Rs.1000/yr</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Access to all premium workouts and nutrition plans</li>
                        <li>24/7 Priority support</li>
                        <li>Exclusive content and early access to new features</li>
                    </ul>
                    <input type="submit" name="submit3" class="card__cta cta" value="Go Ultimate">
                </form>
            </div>

            <div class="overlay cards__inner"></div>
        </div>
    </main>
    <script>
        document.getElementById('okBtn').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
            window.location.href = 'special.php'; // Replace with the URL of the next page
        });

        // Display the popup if there is a message
        const popupMessage = "<?php echo $popup_message; ?>";
        if (popupMessage) {
            document.getElementById('popup').style.display = 'flex';
        }
    </script>
</body>

</html>