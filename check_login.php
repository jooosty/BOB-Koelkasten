<?php

$user = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=bobkoelkast', $user);


if (isset($_COOKIE['usertoken'])) {
    $gebruikers =  $dbh->query('SELECT * from gebruikers', PDO::FETCH_ASSOC)->fetchAll();
    foreach ($gebruikers as $key => $gebruiker) {
        if ($_COOKIE['usertoken'] == $gebruiker['token']) {
            $naam = $gebruiker['username'];
            $bytes = random_bytes(10);
            $token = bin2hex($bytes);
            $id = $gebruiker['id'];
            setcookie('usertoken', $token, time() + 2000);
            try {
                $stmt = $dbh->prepare('UPDATE gebruikers SET token=:token WHERE id=:id');
                $var_code = $stmt->execute([
                    ':token' => $token,
                    ':id' => $id
                ]);
            } catch (PDOException $exception) {
                var_dump($exception);
            }
        }
    }
}
if (empty($naam)) {
    header("Location:login.php");
    exit;
}
?>
