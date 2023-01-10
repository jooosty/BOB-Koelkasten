<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$user = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=bobkoelkast', $user);
if ($_GET['doen'] == "toevoegen") {
    try {
        $koelkast = $_GET['koelkast'];
        $prijs = $_GET['prijs'];
        $energielabel = $_GET['energielabel'];
        $beschrijving = $_GET['beschrijving'];
        $artikelnummer = $_GET['artikelnummer'];
        $gebruikt = $_GET['gebruikt'];
        $inhoud = $_GET['inhoud'];
        $aantal = $_GET['aantal'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "INSERT INTO koelkast (`koelkast`, `prijs`, `energielabel`, `beschrijving`, `artikelnummer`, `gebruikt`, `inhoud`, `aantal`) VALUES 
        (:koelkast, :prijs, :energielabel, :beschrijving, :artikelnummer, :gebruikt, :inhoud, :aantal)";
    
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":koelkast" => $koelkast,
            ":prijs" => $prijs,
            ":energielabel" => $energielabel,
            ":beschrijving" => $beschrijving,
            ":artikelnummer" => $artikelnummer,
            ":gebruikt" => $gebruikt,
            ":inhoud" => $inhoud,
            ":aantal" => $aantal,
            ]);
        if ($_GET["valschade"] == true) {
            foreach ($dbh->query('SELECT id from koelkast ', PDO::FETCH_ASSOC) as $key => $koelkast) {
                $id = $koelkast['id'];
            }
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 1,
                ]);
        } 
        if ($_GET["elektronischeschade"] == true) {
            foreach ($dbh->query('SELECT id from koelkast ', PDO::FETCH_ASSOC) as $key => $koelkast) {
                $id = $koelkast['id'];
            }
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 2,
                ]);
        } 
        if ($_GET['waterschade'] == true) {
            foreach ($dbh->query('SELECT id from koelkast ', PDO::FETCH_ASSOC) as $key => $koelkast) {
                $id = $koelkast['id'];
            }
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 3,
                ]);
        } 
        if ($_GET['diefstaldekking'] == true) {
            foreach ($dbh->query('SELECT id from koelkast ', PDO::FETCH_ASSOC) as $key => $koelkast) {
                $id = $koelkast['id'];
            }
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 4,
                ]);
        }
            
        echo "records UPDATED successfully";
        header("refresh:0;url=./admin.php?");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        header("refresh:10000000;url=index.php?");
    }
    $conn = null;
} elseif ($_GET['doen'] == "edit") {
    try {
        $id = $_GET['id'];
        $koelkast = $_GET['koelkast'];
        $prijs = $_GET['prijs'];
        $energielabel = $_GET['energielabel'];
        $beschrijving = $_GET['beschrijving'];
        $artikelnummer = $_GET['artikelnummer'];
        $gebruikt = $_GET['gebruikt'];
        $inhoud = $_GET['inhoud'];
        $aantal = $_GET['aantal'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE koelkast SET koelkast=:koelkast, prijs=:prijs, energielabel=:energielabel, beschrijving=:beschrijving, 
        artikelnummer=:artikelnummer, gebruikt=:gebruikt, inhoud=:inhoud, aantal=:aantal WHERE id=:id";


        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":koelkast" => $koelkast,
            ":prijs" => $prijs,
            ":energielabel" => $energielabel,
            ":beschrijving" => $beschrijving,
            ":artikelnummer" => $artikelnummer,
            ":gebruikt" => $gebruikt,
            ":inhoud" => $inhoud,
            ":aantal" => $aantal,
            "id" => $id,
        ]);

        $sql = ("DELETE FROM `koelkast_link_verzekering` WHERE koelkast_id=$id");
        $dbh->query($sql);

        if ($_GET["valschade"] == true) {
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 1,
                ]);
        } 
        if ($_GET["elektronischeschade"] == true) {
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 2,
                ]);
        } 
        if ($_GET['waterschade'] == true) {
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 3,
                ]);
        } 
        if ($_GET['diefstaldekking'] == true) {
            $sql = "INSERT INTO koelkast_link_verzekering (`koelkast_id`, `verzekering_id`) VALUES 
            (:koelkast_id, :verzekering_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":koelkast_id" => $id,
                ":verzekering_id" => 4,
                ]);
        }
    
        

        echo "records UPDATED successfully";
        header("refresh:0;url=./admin.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        header("refresh:10000;url=./index.php?");
    }
    $conn = null;
} elseif ($_GET["doen"] == "delete") {
    $id = $_GET["id"];
    $sql = ("DELETE FROM `koelkast` WHERE id=$id");
    $dbh->query($sql);
    $sql = ("DELETE FROM `koelkast_link_verzekering` WHERE koelkast_id=$id");
    $dbh->query($sql);
    header("refresh:0;url=./admin.php");
} elseif ($_GET["doen"] == "reperatie") {
    try {
        $email = $_GET['email'];
        $plaatsnaam = $_GET['plaatsnaam'];
        $adres = $_GET['adres'];
        $koelkast = $_GET['koelkast'];
        $artikelnummer = $_GET['artikelnummer'];
        $beschrijving = $_GET['beschrijving'];

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "INSERT INTO reperatie (`email`, `plaatsnaam`, `adres`, `koelkast`, `artikelnummer`, `beschrijving`) VALUES 
        (:email, :plaatsnaam, :adres, :koelkast, :artikelnummer, :beschrijving)";
    
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":email" => $email,
            ":plaatsnaam" => $plaatsnaam,
            ":adres" => $adres,
            ":koelkast" => $koelkast,
            ":artikelnummer" => $artikelnummer,
            ":beschrijving" => $beschrijving,
            ]);
            
        echo "records UPDATED successfully";
        header("refresh:0;url=./index.php?");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        header("refresh:10000000;url=index.php?");
    }
} elseif ($_GET["doen"] == "repdelete") {
    $id = $_GET["id"];
    $sql = ("DELETE FROM `reperatie` WHERE id=$id");
    $dbh->query($sql);
    header("refresh:0;url=./admin.php");
}
?>
</body>
</html>