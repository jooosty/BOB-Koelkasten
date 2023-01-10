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
    <form action="admin.php" method="GET">
        <input type="submit" value="terug" />
    </form>
    <br />
    <?php
    $valschade = false;
    $waterschade = false;
    $elektronischeschade = false;
    $diefstaldekking = false;
    $id = $_GET["id"];
    $user = 'root';
    $dbh = new PDO('mysql:host=localhost;dbname=bobkoelkast', $user);
    $query = $dbh->prepare('SELECT * FROM koelkast WHERE id = ?');
    $query->execute([$id]);

    foreach ($query as $key => $koelkast) {
    ?>
        <form id="edit_koelkast" action="database.php" method="GET">
            <input type="text" name="doen" value="edit" hidden>
            <input type="text" name="id" value="<?php echo $id ?>" hidden>
            <h3>Koelkast: </h3>
            <input type="text" name="koelkast" value="<?php echo $koelkast["koelkast"] ?>">
            <h3>Rating: </h3>
            <input type="text" name="prijs" value="<?php echo $koelkast["prijs"] ?>">
            <h3>Awards: </h3>
            <input type="text" name="energielabel" value="<?php echo $koelkast["energielabel"] ?>">
            <h3> Omschrijving: </h3>
            <textarea form="edit_koelkast" rows="20" cols="50" name="beschrijving"><?php echo $koelkast["beschrijving"] ?></textarea>
            <h3>artikel nummer: </h3>
            <input type="text" name="artikelnummer" value="<?php echo $koelkast["artikelnummer"] ?>">
            <h3>gebruikt: </h3>
            <input type="text" name="gebruikt" value="<?php echo $koelkast["gebruikt"] ?>">
            <h3>inhoud: </h3>
            <input type="text" name="inhoud" value="<?php echo $koelkast["inhoud"] ?>">
            <h3>aantal: </h3>
            <input type="text" name="aantal" value="<?php echo $koelkast["aantal"] ?>">
            <?php
            foreach (
                $dbh->query("SELECT verzekering.verzekering FROM verzekering
                INNER JOIN koelkast_link_verzekering ON koelkast_link_verzekering.verzekering_id = verzekering.id
                INNER JOIN koelkast ON koelkast.id = koelkast_link_verzekering.koelkast_id
                WHERE koelkast.id = $id", PDO::FETCH_ASSOC) as $key => $verzekeringen
                ) {
                if ($verzekeringen['verzekering'] == "valschade") {
                    $valschade = "checked";
                } elseif ($verzekeringen['verzekering'] == "waterschade") {
                    $waterschade = "checked";
                } elseif ($verzekeringen['verzekering'] == "elektronische schade") {
                    $elektronischeschade = "checked";
                } elseif ($verzekeringen['verzekering'] == "diefstaldekking") {
                    $diefstaldekking = "checked";
                }
            }
            ?>

            <br><label for="aantal">Verzekeringen:</label> <br>
            <label for="horns">valschade</label>
            <input type="checkbox" id="valschade" name="valschade" <?php echo $valschade ?>><br>
            <label for="horns">elektronische schade</label>
            <input type="checkbox" id="elektronischeschade" name="elektronischeschade" <?php echo $elektronischeschade ?>><br>
            <label for="horns">waterschade</label>
            <input type="checkbox" id="waterschade" name="waterschade" <?php echo $waterschade ?>><br>
            <label for="horns">diefstal dekking</label>
            <input type="checkbox" id="diefstaldekking" name="diefstaldekking" <?php echo $diefstaldekking ?>><br>

            </br> </br> </br> </br>
            <input type="submit" value="edit" />
        </form>
    <?php
    }
    ?>
</body>

</html>