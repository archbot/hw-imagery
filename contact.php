<?php
  $myemail = "hwinsted@gmail.com";
  $subject = "Form Submitted via HW-Imagery";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $comments = $_POST['comments'];
  $message  = <<<EMAIL

Name:   $name
Email:  $email
Phone:  $number

Message:

$comments

EMAIL;

if($_POST){
  mail($myemail,$subject,$message);
  $feedback = "Thanks for contacting us! We'll be in touch soon.";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="bootstrap.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway|Dancing+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="contact.css">
    <title>HW Photography &middot; Contact</title> <!-- &middot; -->
  </head> 
  <body>
    <div class="back">
      <div class="nav">
        <div class="title">
          <img src="http://i.imgur.com/1H3YDF7.jpg"/>
        </div>
        <div class="container">
          <ul class="nav nav-justified">
            <li class="button"><a href="http://archbot.github.io/hw-imagery/"><h1>Home</h1></a></li>
            <li class="button"><a href="http://archbot.github.io/hw-imagery/archive.html"><h1>Archive</h1></a></li>
            <li class="button"><a href="http://archbot.github.io/hw-imagery/pricing.html"><h1>Pricing</h1></a></li>
            <li class="button"><a href="http://archbot.github.io/hw-imagery/contact.html"><h1>Contact</h1></a></li>
          </ul>
        </div>
      </div> <!-- end navbar -->
      <div class="contact">
        <h2>Contact Us</h2>
        <h4 id="feedback"><?php echo $feedback; ?></h4>
            <form  action="?" method="POST">
              <input type="hidden" name="action" value="submit" />
              <label for="name">Your name:<br></label>
              <input type="text" name="name" id="name" /><br></label>
              <label for="email">Your email:<br></label>
              <input type="text" name="email" id="email" /><br>
              <label for="number">Your number:<br></label>
              <input type="tel" name="number" id="number" /><br>
              <label for="comments">Your message:</label><br>
              <textarea name="comments" id="comments" rows="7" cols="30"></textarea><br>
              <input type="submit" value="Send email"/>
            </form>
        <p></p>
        <h5>Thanks for stopping by!</h5>
      </div>
    </div>
  </body>
</html>