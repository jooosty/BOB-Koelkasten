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
$user = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=bobkoelkast', $user);

foreach ($dbh->query('SELECT * from koelkast ', PDO::FETCH_ASSOC) as $key => $koelkast) {
    ?>
        <div class="koelkast"> <?php
                echo "koelkast: " . $koelkast["koelkast"];?></br> <?php
                echo "prijs: " . $koelkast["prijs"]; ?></br> <?php
                echo "energielabel: " . $koelkast["energielabel"]; ?></br> <?php
                echo "beschrijving: " . $koelkast["beschrijving"]; ?></br> <?php
                echo "artikelnummer: " . $koelkast["artikelnummer"]; ?></br> <?php
                echo "gebruikt: " . $koelkast["gebruikt"]; ?></br> <?php
                echo "inhoud: " . $koelkast["inhoud"]; ?></br> <?php
                echo "aantal: " . $koelkast["aantal"]; ?></br>

                <?php
                $id = $koelkast["id"];

                echo "verzekeringen: ";
                foreach ($dbh->query("SELECT verzekering.verzekering FROM verzekering
                INNER JOIN koelkast_link_verzekering ON koelkast_link_verzekering.verzekering_id = verzekering.id
                INNER JOIN koelkast ON koelkast.id = koelkast_link_verzekering.koelkast_id
                WHERE koelkast.id = $id", PDO::FETCH_ASSOC) as $key => $verzekeringen) {
                    echo $verzekeringen["verzekering"]; ?> </br> <?php
                }
                ?>
        </div>
    </br>
<?php 
}
?>
</body>
</html>