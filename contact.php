<?php

$message = [];

if (isset($_POST['send'])) {
   include 'dbconnect.php';

   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $msg = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);

   // Prepare and execute select query
   $select_message = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND phone = ? AND message = ?");
   $select_message->bind_param("ssss", $name, $email, $number, $msg);
   $select_message->execute();
   $select_message->store_result();

   if ($select_message->num_rows > 0) {
      $message[] = 'Message already sent!';
   } else {
      // Prepare and execute insert query
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, phone, message) VALUES(?, ?, ?, ?)");
      $insert_message->bind_param("ssss", $name, $email, $number, $msg);
      $insert_message->execute();

      if ($insert_message->affected_rows > 0) {
         $message[] = 'Message sent successfully!';
      } else {
         $message[] = 'Failed to send message!';
      }
      $insert_message->close();
   }
   $select_message->close();
   $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="cstyle.css">
</head>

<body>

   <!-- Contact section starts -->

   <section id="contact-section" class="d-flex flex-column gap-3">

      <?php if (!empty($message)) : ?>
         <div class="alert alert-success">
            <?php foreach ($message as $msg) :
               echo  '<script>alert("'.htmlspecialchars($msg).'");</script>';
               echo htmlspecialchars($msg); ?>
            <?php endforeach; ?>
         </div>
      <?php endif; ?>
      <div id="contact-row">

         <div id="image-container">
            <img id="contact-image" src="Pictures/contact-img.svg" alt="Contact Image">
         </div>

         <form id="contact-form" action="" method="post">
            <h3 id="form-title">Contact Us</h3>
            <input type="text" id="name-input" name="name" maxlength="50" class="input-box" placeholder="Enter your name" required>
            <input type="number" id="number-input" name="number" min="0" max="9999999999" class="input-box" placeholder="Enter your number" required maxlength="10">
            <input type="email" id="email-input" name="email" maxlength="50" class="input-box" placeholder="Enter your email" required>
            <textarea id="message-input" name="msg" class="input-box" required placeholder="Enter your message" maxlength="500" cols="30" rows="3"></textarea>
            <input type="submit" id="submit-btn" value="Send Message" name="send" class="btn-ctn">
         </form>
      </div>

   </section>
</body>

</html>