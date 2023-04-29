<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
  </head>
  <body>
    <h1>Contact Us</h1>
    <form method="post" action="send_email.php">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required><br>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required><br>

      <label for="subject">Subject:</label>
      <input type="text" name="subject" id="subject" required><br>

      <label for="message">Message:</label><br>
      <textarea name="message" id="message" rows="5" required></textarea><br>

      <input type="submit" value="Send">
    </form>
  </body>
</html>
<?php
$to = "ranounouch.kh@gamil.com";
$subject = "Test email";
$message = "Hello, this is a test email.";
$headers = "From: sender@example.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
  echo "Email sent successfully.";
} else {
  echo "Email failed to send.";
}
?>
