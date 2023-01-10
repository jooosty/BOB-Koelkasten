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
    <form id="koelkastform" action="./database.php" method="get">
  <input type = "text" name = "doen" value = "reperatie" hidden> 
  <label for="email">email</label>
  <input type="email" id="email" name="email"><br>
  <label for="plaatsnaam">plaatsnaam:</label>
  <input type="text" id="plaatsnaam" name="plaatsnaam"><br>
  <label for="adres">adres(Straat+nummer):</label>
  <input type="text" id="adres" name="adres"><br> 
  <label for="koelkast">Koelkast naam:</label>
  <input type="text" id="koelkast" name="koelkast"><br>
  <label for="artikelnummer">artikel nummer:</label>
  <input type="number" id="artikelnummer" name="artikelnummer"><br>
  <label for="beschrijving">Wat is er kapot:</label><br>
  <textarea form="koelkastform" name="beschrijving" id="beschrijving" cols="30" rows="10" placeholder="beschrijving"></textarea><br>
  <input type="submit" value="Reperatie aanvragen">
</form>
</body>
</html>