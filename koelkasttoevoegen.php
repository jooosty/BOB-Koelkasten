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
    <?php
    include('check_login.php');
    ?>
    <form action = "admin.php" method = "GET" >
        <input type = "submit" value = "terug" />
    </form>
<form id="koelkastform" action="./database.php" method="get">
<input type = "text" name = "doen" value = "toevoegen" hidden>  
  <label for="koelkast">Koelkast naam:</label>
  <input type="text" id="koelkast" name="koelkast"><br>
  <label for="prijs">prijs:</label>
  <input type="number" id="prijs" name="prijs"><br>
  <label for="energielabel">energie label:</label>
  <input type="text" id="energielabel" name="energielabel"><br>
  <label for="beschrijving">beschrijving:</label><br>
  <textarea form="koelkastform" name="beschrijving" id="beschrijving" cols="30" rows="10" placeholder="beschrijving"></textarea><br>
  <label for="artikelnummer">artikel nummer:</label>
  <input type="number" id="artikelnummer" name="artikelnummer"><br>
  <label for="gebruikt">gebruikt:</label>
  <input type="gebruikt" id="gebruikt" name="gebruikt"><br>
  <label for="inhoud">inhoud in liters:</label>
  <input type="number" id="inhoud" name="inhoud"><br>
  <label for="aantal">Aantal producten:</label>
  <input type="number" id="aantal" name="aantal"><br>
  <label for="aantal">Verzekeringen:</label> <br>
  <label for="horns">valschade</label>
  <input type="checkbox" id="valschade" name="valschade"><br>
  <label for="horns">elektronische schade</label>
  <input type="checkbox" id="elektronischeschade" name="elektronischeschade"><br>
  <label for="horns">waterschade</label>
  <input type="checkbox" id="waterschade" name="waterschade"><br>
  <label for="horns">diefstal dekking</label>
  <input type="checkbox" id="diefstaldekking" name="diefstaldekking"><br>
  <input type="submit" value="Koelkast toevoegen">
</form>
</body>
</html>