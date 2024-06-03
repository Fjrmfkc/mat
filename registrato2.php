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
        $sql = "SELECT nome FROM videogame WHERE nome LIKE '".$nn."%';";
        $ris = $con->query($sql);
        foreach($ris as $riga){
            $nn=$riga['nome'];
        }
        $utente = $con->real_escape_string($_GET['utente']);
        $sql = "SELECT soldi FROM utente WHERE username = '$utente'";
        $ris = $con->query($sql);
        if ($ris->num_rows > 0) {
            $riga = $ris->fetch_assoc();
            $soldiutente = $riga['soldi'];
        } else {
            echo "Utente non trovato.";
            exit();
        }
        $sql = "SELECT prezzo FROM videogame WHERE nome = '$nn'";
        $risp = $con->query($sql);
        if ($risp->num_rows > 0) {
            $riga = $risp->fetch_assoc();
            $soldivideogame = $riga['prezzo'];
        } else {
            echo "Videogioco non trovato.";
            exit();
        }
        if ($soldiutente >= $soldivideogame) {
            $sql = "SELECT * FROM compra";
            $ris = $con->query($sql);
            $num = $ris->num_rows;
            $sql = "SELECT id FROM videogame WHERE nome = '$nn'";
            $ris = $con->query($sql);
            if ($ris->num_rows > 0) {
                $riga = $ris->fetch_assoc();
                $id = $riga['id'];
            } else {
                echo "ID del videogioco non trovato.";
                exit();
            }
            $nuovoSaldo = $soldiutente - $soldivideogame;
            $sql = "UPDATE utente SET soldi = $nuovoSaldo WHERE username = '$utente'";
            if (!$con->query($sql)) {
                echo "Errore nell'aggiornamento dei soldi dell'utente: " . $con->error;
                exit();
            }
            $com = $num + 1;
            $sql = "INSERT INTO compra (com, id, username) VALUES ('$com', '$id', '$utente')";
            if ($con->query($sql)) {
                echo "Acquisto concluso con successo.";
            } else {
                echo "Errore nell'inserimento dell'acquisto: " . $con->error;
            }
        } else {
            echo "Soldi insufficienti.";
        }

        $con->close();
    } else {
        echo "Parametri mancanti.";
    }
    ?>
    <?php
    if(isset($_GET['m'])) {
        $con = new mysqli("localhost", "root", "", "videogame");
        if ($con->connect_error) {
            die("Errore di connessione: " . $con->connect_error);
        }
        $nn = $con->real_escape_string($_GET['m']);
        $utente = $con->real_escape_string($_GET['utente']);
        $sql = "SELECT soldi FROM utente WHERE username = '$utente'";
        $ris = $con->query($sql);
        if ($ris->num_rows > 0) {
            $riga = $ris->fetch_assoc();
            $soldiutente = $riga['soldi'];
        } else {
            echo "Utente non trovato.";
            exit();
        }
        $sql = "SELECT prezzo FROM videogame WHERE nome = '$nn'";
        $risp = $con->query($sql);
        if ($risp->num_rows > 0) {
            $riga = $risp->fetch_assoc();
            $soldivideogame = $riga['prezzo'];
        } else {
            echo "Videogioco non trovato.";
            exit();
        }
        if ($soldiutente >= $soldivideogame) {
            $sql = "SELECT * FROM compra";
            $ris = $con->query($sql);
            $num = $ris->num_rows;
            $sql = "SELECT id FROM videogame WHERE nome = '$nn'";
            $ris = $con->query($sql);
            if ($ris->num_rows > 0) {
                $riga = $ris->fetch_assoc();
                $id = $riga['id'];
            } else {
                echo "ID del videogioco non trovato.";
                exit();
            }
            $nuovoSaldo = $soldiutente - $soldivideogame;
            $sql = "UPDATE utente SET soldi = $nuovoSaldo WHERE username = '$utente'";
            if (!$con->query($sql)) {
                echo "Errore nell'aggiornamento dei soldi dell'utente: " . $con->error;
                exit();
            }
            $com = $num + 1;
            $sql = "INSERT INTO compra (com, id, username) VALUES ('$com', '$id', '$utente')";
            if ($con->query($sql)) {
                echo $nn." acquistato";
            } else {
                echo "Errore nell'inserimento dell'acquisto: " . $con->error;
            }
        } else {
            echo "Soldi insufficienti.";
        }
        $con->close();
    }
    ?>
    <?php
    if(isset($_GET['o'])) {
        $con = new mysqli("localhost", "root", "", "videogame");
        if ($con->connect_error) {
            die("Errore di connessione: " . $con->connect_error);
        }
        $nn = $con->real_escape_string($_GET['o']);
        $utente = $con->real_escape_string($_GET['utente']);
        $sql = "SELECT soldi FROM utente WHERE username = '$utente'";
        $ris = $con->query($sql);
        if ($ris->num_rows > 0) {
            $riga = $ris->fetch_assoc();
            $soldiutente = $riga['soldi'];
        } else {
            echo "Utente non trovato.";
            exit();
        }
        $sql = "SELECT prezzo FROM videogame WHERE nome = '$nn'";
        $risp = $con->query($sql);
        if ($risp->num_rows > 0) {
            $riga = $risp->fetch_assoc();
            $soldivideogame = $riga['prezzo'];
        } else {
            echo "Videogioco non trovato.";
            exit();
        }
            $sql = "SELECT * FROM compra";
            $ris = $con->query($sql);
            $num = $ris->num_rows;
            $sql = "SELECT id FROM videogame WHERE nome = '$nn'";
            $ris = $con->query($sql);
            if ($ris->num_rows > 0) {
                $riga = $ris->fetch_assoc();
                $id = $riga['id'];
            } else {
                echo "ID del videogioco non trovato.";
                exit();
            }
            $nuovoSaldo = $soldiutente + $soldivideogame;
            $sql = "UPDATE utente SET soldi = $nuovoSaldo WHERE username = '$utente'";
            if (!$con->query($sql)) {
                echo "Errore nell'aggiornamento dei soldi dell'utente: " . $con->error;
                exit();
            }
            $com = $num + 1;
            $sql = "DELETE FROM compra 
            WHERE id = (SELECT id FROM videogame WHERE nome = '$nn') 
            AND username = '$utente';";
            if ($con->query($sql)) {
                echo $nn." acquistato";
            } else {
                echo "Errore nell'inserimento dell'acquisto: " . $con->error;
            }
        $con->close();
    }
    ?>
</body>
</html>