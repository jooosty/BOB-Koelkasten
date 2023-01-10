<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="admin.php">Admin</a></li>
      <li><a href="reperatie.php">reperatie</a></li>
    </ul>
    <form method="post" name="myemailform" action="sendemail.php">

naam: <input type="text" name="naam"> <br>

Email address: <input type="email" name="email"><br>

Bericht: <br><textarea name="bericht"></textarea><br>

<input type="submit" value="Send Form">
</form>
</body>
</html>