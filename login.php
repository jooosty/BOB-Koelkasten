<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    $user = 'root';
    $dbh = new PDO('mysql:host=localhost;dbname=bobkoelkast', $user);
foreach ($dbh->query('SELECT username, wachtwoord, id from gebruikers', PDO::FETCH_ASSOC) as $key => $gebruikers) {
    ?>
    <form action = "" method = "post">

    <input type = "text" name = "naam" placeholder = "Username">
    <input type = "password" name = "ww" placeholder = "wachtwoord">
    <input type = "submit" value = "login" />
</form>

    <?php
    if (isset($_POST["naam"]) && isset($_POST["ww"])) {
        $username = $_POST["naam"];
        $wachtwoord = $_POST["ww"];
        foreach ($dbh->query('SELECT * from gebruikers', PDO::FETCH_ASSOC) as $key => $gebruiker) {
            if ($username == $gebruiker['username'] && $wachtwoord == $gebruiker['wachtwoord']) {
                setcookie('usertoken', $gebruiker['token'], time() + 200000);

                header("Location:./admin.php");
            } else {
                echo "login failed";
            }
        }
    }
}
?>
</body>
</html>
