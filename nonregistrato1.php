<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['n'])) {
            $con = new mysqli("localhost", "root", "", "videogame");
            if ($con->connect_error) {
                die("Errore di connessione: " . $con->connect_error);
            }
            $nn = $con->real_escape_string($_GET['n']);
            $password = $con->real_escape_string($_GET['pass']);
            $eta = (int) $_GET['e'];
            $nazione = $con->real_escape_string($_GET['naz']);
            $cap = (int) $_GET['cap'];
            $sql = "SELECT username, password FROM utente WHERE username = '$nn' AND password = '$password';";
            $ris = $con->query($sql);
            if (!$ris) {
                die("Errore nella query: " . $con->error);
            }
            $num = $ris->num_rows;
            if ($num > 0) {
                echo "Utente già registrato, ritenta";
            } else {
                $sql = "INSERT INTO utente (username, password, eta, nazione, soldi) VALUES ('$nn', '$password', $eta, '$nazione', $cap);";
                $ris = $con->query($sql);
                if (!$ris) {
                    die("Errore nella query: " . $con->error);
                }
                echo "Ora sei registrato.";
            }
            $con->close();
        }
    ?>
</body>
</html>