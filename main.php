<?php
session_start();
// if(!isset($_SESSION["username"])){
//   header("Location:sign.php");
//   exit();
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness : Plans</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stylelog.css">
  <link rel="stylesheet" href="css/mainstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body onload="myFunction()" style="margin:0;">
<?php include("loader.php");?>
<?php include('navbar.php');?>
  <!--Caourel Start-->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="Pictures/food3.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block tej-dark">

          <h1>Nourishing your body with healthy food is like giving yourself a gift that keeps on giving.</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Pictures/food5.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block tej-dark special-cap">
          <h1>Eating healthy is a way of showing your body love and appreciation.</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Pictures/food6.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block tej-dark">
          <h1>Healthy eating doesn't have to be boring. Experiment, explore, and discover delicious ways to
            nourish your body.</h1>

        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!--end of careoul-->

  <div class="container tej-von">
    <h1 class="head-tej">Nutrition Guidelines: What to Embrace and What to Avoid</h1>
    <div class="tej-op">
      <a href="#carbohy" class="op">Carbohydrates</a>|
      <a href="#protein" class="op">Protein</a>|
      <a href="#fru&veg" class="op">Fruits and vegetables</a>|
      <a href="#helfat" class="op">Healthy fats</a>|
      <a href="#worksnack" class="op">Workout snacks</a>
    </div>
    <p class="para-tej tej-text-lg">With the right plan and the right discipline, you can get seriously shredded in just 28 days.
    </p>
    <div class="info container" >
      <div class="carbo" id="carbohy">
        <h2>Nutrition is important for fitness </h2>
        <div class="car-info">
          Eating a well-balanced diet can help you get the calories and nutrients you need to fuel your daily activities, including regular exercise.

          When it comes to eating foods to fuel your exercise performance, it’s not as simple as choosing vegetables over doughnuts. You need to eat the right types of food at the right times of the day.
          
          Learn about the importance of healthy breakfasts, workout snacks, and meal plans.
        </div>
      </div>
      <div class="carbo" id="carbohy">
        <h4>Carbohydrates : </h4>
        <div class="car-info">
          Carbohydrates are the body's main source of energy. They are found in foods like bread, pasta,
          rice, potatoes, and fruits.
          Carbs provide quick energy for daily activities and exercise.
          There are two main types of carbohydrates: simple carbs (found in sugary foods and drinks) and complex
          carbs (found in whole grains, fruits, and vegetables).
          Focus on consuming complex carbohydrates, which provide sustained energy and essential
          nutrients.
          Glycemic Index: Consider the glycemic index (GI) of carbohydrates, which measures how quickly they raise blood
          sugar levels. Choosing low to moderate GI carbs can help regulate blood sugar levels and provide sustained
          energy.
          Fiber: Focus on consuming fiber-rich carbohydrates like whole grains, fruits, and vegetables, which aid
          digestion, promote satiety, and support heart health.
          Portion Control: Be mindful of portion sizes when consuming carbohydrate-rich foods to avoid excessive calorie
          intake.
        </div>
      </div>
      <div class="carbo center-content" id="protein">
        <h4>Protein : </h4>
        <div class="car-info">
          Protein is crucial for building and repairing tissues in the body. It is found in foods like meat, fish,
          poultry, dairy products, beans, and nuts.
          Protein helps with muscle growth, immune function, and hormone production.
          Complete proteins contain all essential amino acids and are found in animal products, while incomplete
          proteins are found in plant-based foods.
          Aim to include a variety of protein sources in your diet to ensure you get all essential amino acids.
          Timing: Distribute protein intake evenly throughout the day to support muscle repair and growth.
          Plant-Based Options: Incorporate plant-based protein sources such as tofu, tempeh, lentils, and quinoa for
          variety and to reduce the environmental footprint of your diet.
          Quality: Choose lean protein sources to minimize saturated fat intake and support heart health.
        </div>
      </div>
      <div class="carbo center-content" id="fru&veg">
        <h4>Fruits and Vegetables : </h4>
        <div class="car-info">
          Fruits and vegetables are rich in vitamins, minerals, fiber, and antioxidants essential for overall health.
          They support immune function, digestion, and heart health while reducing the risk of chronic diseases.
          Include a colorful variety of fruits and vegetables to ensure a range of nutrients.
          Aim to fill half your plate with fruits and vegetables at each meal to meet daily nutritional
          needs.
          Seasonal Eating: Emphasize seasonal fruits and vegetables to enjoy fresh, flavorful produce at its peak
          nutritional value.
          Diversity: Experiment with different types of fruits and vegetables to maximize nutrient intake and add
          variety to meals.
          Preparation Methods: Opt for cooking methods like steaming, roasting, or grilling to preserve the nutrients in
          fruits and vegetables.
        </div>
      </div>
      <div class="carbo" id="helfat">
        <h4>Healthy Fats : </h4>
        <div class="car-info">
          Healthy fats, such as those found in avocados, nuts, seeds, and olive oil, are essential for brain function,
          hormone production, and nutrient absorption.
          They provide long-lasting energy, support heart health, and help regulate inflammation.
          Monounsaturated and polyunsaturated fats are considered healthy fats, while saturated and trans fats should be
          limited.
          Incorporate sources of healthy fats into your meals and snacks in moderation.
          Hydration: Don't forget to hydrate before, during, and after exercise by drinking water or electrolyte-rich
          beverages.
          Personalization: Tailor your pre- and post-workout snacks based on the intensity and duration of your
          exercise, as well as individual preferences and dietary restrictions.
          Whole Foods: Whenever possible, choose whole food snacks over processed options to provide your body with
          essential nutrients and minimize added sugars and artificial ingredients.
        </div>
      </div>
      <div class="carbo center-content" id="worksnack">
        <h4>Workout snacks : </h4>
        <div class="car-info">
          Workout snacks provide the necessary fuel and nutrients to support physical activity and enhance performance.
          Consuming a balanced snack before and after exercise helps maintain energy levels, supports muscle recovery,
          and replenishes glycogen stores.
          Pre-workout snacks may include a banana with almond butter, yogurt with fruit, or a granola bar. Post-workout
          snacks could be a protein shake, chocolate milk, or a turkey sandwich on whole grain bread.
          Choose snacks that combine carbohydrates and protein for sustained energy and muscle repair. Tailor snack
          choices based on individual preferences and dietary needs.
        </div>
      </div>
    </div>
  </div>


  <div id="accordion">
    <h3>Diet Plan For a Week :</h3>
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
            aria-controls="collapseOne">
            <span class="tej-text">Day 1</span>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <!--table-->
          <table class="table table-hover tej-text-lg" border="2px">
            <thead>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Breakfast</th>
                <td>Oats Banana Pancakes with
                  Protein Shake</td>
              </tr>
              <tr>
                <th scope="row">Lunch</th>
                <td>Multigrain roti along with palak chicken and Avocado bell pepper salad</td>
              </tr>
              <tr>
                <th scope="row">Pre-Workout </th>
                <td>Snack Bananas</td>
              </tr>
              <tr>
                <th scope="row">Dinner(Post-Workout)</th>
                <td>Brown rice, peas paneer curry, sprouts vegetable salad</td>
              </tr>
            </tbody>
          </table>
          <!--Table end-->
        </div>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <span class="tej-text">Day 2</span>
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <table class="table table-hover" border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Oatmeal with Greek Yogurt & Seasonal fruits
                Mango Juice</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Multigrain roti, fish curry, vegetable salad</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td>Toast with Jam</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Broken wheat khichidi along with carrot raita, egg white, and vegetable salad</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="false" aria-controls="collapseThree">
            <span class="tej-text">Day 3</span>
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <table class="table table-hover " border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Poached Eggs
                Whole Grain Toast
                Protein Shake</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Quinoa upma, chicken and broccoli salad</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td>Mixed Nuts & Dried Fruits</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Meal and vegetable curry, brown rice, cucumber raita
                Baby Potatoes
                Chocolate Milk</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingFour">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="false" aria-controls="collapseFour">
            <span class="tej-text">Day 4</span>
          </button>
        </h5>
      </div>

      <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
        <table class="table table-hover" border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Oatmeal with Honey, Apple Juice</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Grilled Chicken, Salad, Whole Grain Bread</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td>Toast with Peanut Butters</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Methi Chicken, Brown Rice, Broccoli, Protein Shake</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingFive">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="false" aria-controls="collapseFive">
            <span class="tej-text">Day 5</span>
          </button>
        </h5>
      </div>

      <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion">
        <table class="table table-hover" border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Scrambled Egg, Whole Grain Toast, Smoothie</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Grilled chicken vegetable roti rolls, Green Salad</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td> Mixed Nuts & Dried Fruits</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Chicken Stir Fry, Spring Onion, Peppers & Broccoli, Chocolate Milk</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingSix">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
            aria-controls="collapseSix">
            <span class="tej-text">Day 6</span>
          </button>
        </h5>
      </div>

      <div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
        <table class="table table-hover" border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Oatmeal, Whole Grain Toast, Orange Juice</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Whole Grain Chicken Wrap, Black Beans, Peppers & Greek Yogurt</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td>Apple with peanut butter</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Keema bhurji and multigrain rotiLean Beef Mince, Sweet Potato, Protein Shake</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card tej-text-lg">
      <div class="card-header" id="headingSeven">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"
            aria-expanded="false" aria-controls="collapseSeven">
            <span class="tej-text">Day 7</span>
          </button>
        </h5>
      </div>

      <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordion">
        <table class="table table-hover" border="2px">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Breakfast</th>
              <td>Oatmeal with Nuts, Smoothie</td>
            </tr>
            <tr>
              <th scope="row">Lunch</th>
              <td>Whole wheat pasta with chicken and Green Salad</td>
            </tr>
            <tr>
              <th scope="row">Pre-Workout </th>
              <td>Granola or Cereal</td>
            </tr>
            <tr>
              <th scope="row">Dinner(Post-Workout)</th>
              <td>Fish curry, boiled green peas salad, Brown Rice, Garden Peas, Milk</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>



  <!---->
  <div class="container tej-do">
    <div class="do-list carbo">
      <h3>Do :</h3>
      <ul class="tej-text-lg tej-lst">
        <li>Eat a variety of fruits and vegetables daily.</li>
        <li>Choose whole grains over refined grains.</li>
        <li>Include lean proteins such as poultry, fish, beans, and nuts in your diet.</li>
        <li>Drink plenty of water throughout the day.</li>
        <li>Limit added sugars, opting for natural sweeteners like fruits when possible.</li>
        <li>Incorporate healthy fats like those found in avocados, nuts, and olive oil.</li>
        <li>Pay attention to portion sizes to avoid overeating.</li>
        <li>Aim for balance in your meals, including carbohydrates, proteins, and fats.</li>
        <li>Read food labels and be mindful of the ingredients and nutritional content of packaged foods.</li>
        <li>Listen to your body's hunger and fullness cues.</li>
      </ul>
    </div>

    <div class="dont-list carbo">
      <h3>Don't :</h3>
      <ul class="tej-text-lg tej-lst">
        <li>Don't rely too heavily on processed and packaged foods, which are often high in sodium, sugar, and unhealthy
          fats.</li>
        <li>Avoid sugary drinks like soda and sweetened juices, opting for water, herbal tea, or unsweetened beverages
          instead.</li>
        <li>Don't skip meals, especially breakfast, as it can lead to overeating later in the day.</li>
        <li>Avoid fad diets or extreme restrictions that eliminate entire food groups unless medically necessary.</li>
        <li>Limit consumption of fried and high-fat foods, which can contribute to weight gain and health issues.</li>
        <li>Avoid excessive alcohol consumption, which can add empty calories and negatively impact health.</li>
        <li>Don't eat mindlessly or while distracted, as it can lead to overeating.</li>
        <li>Avoid eating late at night, as it can disrupt sleep and digestion.</li>
      </ul>
    </div>
  </div>
<!--Pop Up window-->

  <!--End pop up -->



<?php include('contact.php');?>
  <!--Footer Start-->
  <!--Footer-->
  <?php include('footer.php') ?>
    <!-- End of .container -->
  <!-- Footer -->



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</body>

</html>
