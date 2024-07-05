<?php
session_start();
// if (!isset($_SESSION["username"])) {
//   header("Location:sign.php");
//   exit();
// }

if (isset($_SESSION['success'])) {
  echo '<script>alert("' . $_SESSION['success'] . '")</script>';
  unset($_SESSION['success']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness : Make Yourself fit</title>
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
</head>

<body onload="myFunction()" style="margin:0;">
  <?php include ("loader.php"); ?>
  <?php include ('navbar.php');?>
    <!--Quote-->
  <div class="quote">
    <h1 id="h1quote">Transform your body, ignite your soul.</h1>
    <h2 id="h2quote">On the fitness journey now!</h2>
    <p id="autotyped"></p>
  </div>
  <div id="bg"></div>



  <!--Slide-->





  <!--Personal info-->
  <div class="personal" id="Personal-id">
    <!--My Info-->
    <div class="card mb-3 tej-card" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="Pictures/me2.jpg" class="img-fluid rounded-start" alt="..." style="height:100%;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Tejas Jadhav</h5>
            <p class="card-text"> A brilliant engineering student with a passion for innovation and a knack for coding.
              Showcasing his intelligence and creativity in the web devlopment field..</p>
            <p class="card-text"><small class="text-body-secondary">

                <div class="acc-det container-fluid">
                  <a href="">
                    <i class="fa-brands fa-facebook tej-icon-dark"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-twitter tej-icon-dark"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-google tej-icon-dark"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-instagram tej-icon-dark"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-linkedin tej-icon-dark"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-github tej-icon-dark"></i>
                  </a>
                </div>

              </small></p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--No. of -->


  <div class="tracker">
    <div class="track1">
      <span>Nutrition <p>Plans</p></span>
      <h1 id="tej-track1" class="tej-tr">100+</h1>
    </div>
    <div class="track1">
      <span>Workouts <p>Plans</p></span>
      <h1 id="ttrack2" class="tej-tr">500+</h1>
    </div>
    <div class="track1">
      <span>Fitness <p>Products</p></span>
      <h1 id="ntrack3" class="tej-tr">50+</h1>
    </div>
  </div>
  <!-- contact us -->
  <?php include("contact.php");?>
  <!--Footer-->
  <?php include ('footer.php') ?>
  <!--End of Footer-->
  <!-- Remove the container if you want to extend the Footer to full width. -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


  <script>


    
    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }
    async function autotype() {
      var at = document.getElementById("autotyped");
      var str = "No one can stop you..!";
      var ch = "";
      var i = 0;
      while (true) {
        if (i > str.length) {
          i = 0;
          at.innerHTML = "";
          ch = "";
        }
        ch = ch + str.charAt(i);
        at.innerHTML = ch + "|";
        await sleep(300);
        i++;
      }
    }
    autotype();
    async function numtrack2() {
      var di = document.getElementById("ttrack2");
      var i = 0;
      var ch = "";
      while (i <= 200) {

        ch = i.toString();
        di.innerHTML = ch + "+";
        await sleep(0.01);
        i++;
      }
    }

    async function numtrack1() {
      var dit = document.getElementById("tej-track1");
      var ip = 0;
      while (ip <= 100) {
        dit.innerHTML = ip.toString() + "+";
        await sleep(5);
        ip++;
      }
    }

    async function numtrack3() {
      var dip = document.getElementById("ntrack3");
      var it = 0;
      while (it <= 50) {
        dip.innerHTML = it.toString() + "+";
        await sleep(10);
        it++;
      }
    }
    numtrack3();
    numtrack1();
    numtrack2();


  </script>
</body>

</html>