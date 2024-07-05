<!-- <?php session_start();
?>  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-tej fixed-top container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img id="mainLogo" src="Pictures/images1.png"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link nav-tej" href="index.php">
          Home
        </a>
      </li>
      <li class="nav-item ">
          <a class="nav-link nav-tej" href="health.html">
            Health Codition
          </a>
        </li>
      <li class="nav-item ">
        <a class="nav-link nav-tej" href="main.php">Nutrition</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link nav-tej" id="sideabout" href="workout.php">Workouts</a>
      </li>
      <?php
      include("dbconnect.php");
      if (isset($_SESSION["username"])) {


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

          if ($result->num_rows > 0) {
            echo '
        <li class="nav-item">
          <a class="nav-link nav-tej" href="special.php" style="color:yellow;">Member</a>
        </li>';
          }
        }
      }
      $conn->close();
      ?>

      <li class="nav-item">
        <a class="nav-link nav-tej" onclick="visible()" href="#incident">About</a>
      </li>
      <!-- <li class="nav-item">
          <a class="nav-link nav-tej" href="#Personal-id">Contact</a>
        </li> -->
    </ul>
    <div class="form-inline my-2 my-lg-0 tej-div">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <a href="Pricing.php" class="tej-flex tej-1 " target="_blank">
        <button id="SignUp" class="btn btn-outline-warning my-2 my-sm-0 tej-black" type="submit"><i class="fa-solid fa-crown"></i>Subcription</button>
      </a>
      <?php
      if (isset($_SESSION['username'])) {
      ?>
      <a href="logout.php" class="tej-flex tej-1 ">
        <button id="SignUp" class="btn btn-outline-success my-2 my-sm-0 tej-black" type="submit">Log Out</button>
      </a>
        <a href="admin.php"><span class="material-symbols-outlined">
            account_circle
          </span></a>
      <?php
      } else {
      ?>
        <a href="siginhome.php">
          <button id="SignUp" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
        </a>
        <a href="logerhome.php" class="tej-flex tej-1 ">
          <button id="SignUp" class="btn btn-outline-success my-2 my-sm-0 tej-black" type="submit">Log In</button>
        </a>
      <?php
      }
      ?>


    </div>

  </div>
</nav>
<div id="incident">
  <div class="incident">
    <h5 id="fitword"><span>FITNESS</span></h5>
    <h1 id="startword"><span>START</span></h1>
    <h1 id="trword"><span>TRAINING</span></h1>
    <h1 id="tdword"><span>TODAY</span></h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus quia facere excepturi commodi dolorem,
      itaque voluptates nostrum, qui modi fugit, explicabo veritatis officiis iste placeat natus dolor ipsum
      praesentium quos!</p>
    <button type="button" class="btn btn-tej btn-outline-danger">READ MORE</button>
  </div>
</div>
<script>
  function visible() {
    var diva = document.getElementById("incident");
    var quote = document.getElementsByClassName("quote");
    var pro = window.getComputedStyle(diva).getPropertyValue("display");
    if (pro == "none") {
      diva.style.display = "block";
      quote.style.display = "none";
    } else {
      diva.style.display = "none";
      quote.style.display = "block";
    }
  }
</script>
