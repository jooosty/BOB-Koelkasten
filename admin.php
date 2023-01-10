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
      <li><a href="logout.php">uitloggen</a></li>
    </ul>
<?php
include('check_login.php');
?>

    <form action = "./koelkasttoevoegen.php" method = "GET" >
         <input type = "submit" value = "Koelkast toevoegen" />
    </form>
</br>
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
        <form action = "./koelkastedit.php" method = "GET" >
            <input type = "text" name = "id" value = "<?php echo $koelkast["id"] ?>" hidden>
            <input type = "submit" value = "Edit" />
        </form>
        <?php 
        if (isset($_GET["del"]) == false) {
            $_GET["del"] = null;
        }
        if ($_GET["del"] != $id) {?>
            <form action = "./admin.php" method = "GET" >
                <input type = "text" name = "del" value = "<?php echo  $id ?>" hidden>
                <input type = "submit" value = "Verwijder" />
            </form>
        <?php } elseif ($_GET["del"] == $id) { ?>
            <form action = "./database.php" method = "GET" >
                <input type = "text" name = "doen" value = "delete" hidden>
                <input type = "text" name = "id" value = "<?php echo $id ?>" hidden>
                <input type = "submit" value = "Weet je zeker dat je deze wilt verijwderen" />
            </form>
            <form action = "./admin.php" method = "GET" >
                <input type = "text" name = "del" value = null hidden>
                <input type = "submit" value = "niet verwijderen" />
            </form>
            <?php 
        } 
        ?>
        </div>
    </br>
<?php 
}
foreach ($dbh->query('SELECT * from reperatie ', PDO::FETCH_ASSOC) as $key => $reperatie) {
    ?>
    <div class="reperatie"> <?php
    echo "email: " . $reperatie['email']; ?></br> <?php
    echo "plaatsnaam: " . $reperatie['plaatsnaam']; ?></br> <?php
    echo "adres: " . $reperatie['adres']; ?></br> <?php
    echo "koelkast: " . $reperatie['koelkast']; ?></br> <?php
    echo "artikelnummer: " . $reperatie['artikelnummer']; ?></br> <?php
    echo "beschrijving: " . $reperatie['beschrijving']; ?></br> 

        <form action = "./repmail.php" method = "GET" >
            <input type = "text" name = "id" value = "<?php echo $reperatie["id"] ?>" hidden>
            <input type = "submit" value = "Mail terug" />
        </form>
        <?php 
        $id = $reperatie['id'];
        if (isset($_GET["repdel"]) == false) {
            $_GET["repdel"] = null;
        }
        if ($_GET["repdel"] != $id) {?>
            <form action = "./admin.php" method = "GET" >
                <input type = "text" name = "repdel" value = "<?php echo  $id ?>" hidden>
                <input type = "submit" value = "Verwijder" />
            </form>
        <?php } elseif ($_GET["repdel"] == $id) { ?>
            <form action = "./database.php" method = "GET" >
                <input type = "text" name = "doen" value = "repdelete" hidden>
                <input type = "text" name = "id" value = "<?php echo $id ?>" hidden>
                <input type = "submit" value = "Weet je zeker dat je deze wilt verijwderen" />
            </form>
            <form action = "./admin.php" method = "GET" >
                <input type = "text" name = "repdel" value = null hidden>
                <input type = "submit" value = "niet verwijderen" />
            </form>
    </div>
            <?php
        }
}
?>

</body>
</html>