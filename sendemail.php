
<?php
  $naam = $_POST['naam'];
  $visitor_email = $_POST['email'];
  $bericht = $_POST['bericht'];

  $email_onderwerp = "nieuw bericht";

  $email = "Je hebt een bericht gekregen van $naam.\n" .
  "dit is het bericht:\n $bericht" .
  $naar = "jooosty112@gmail.com";
  $headers = "van: $email_from \n";
  mail($naar, $email_onderwerp, $email, $headers);