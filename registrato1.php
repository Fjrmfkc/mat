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
    if($nn == " "){
        $sql = "SELECT * FROM videogame;";
    }
    else{
        $sql = "SELECT * FROM videogame WHERE nome LIKE '".$nn."%';";
    }
    $ris = $con->query($sql);
    $num = $ris->num_rows;
    if ($num < 1) {
        echo "non ho trovato niente";
    } else {
        echo "<table border='1' align='center' id='myTable'><tr id='titolo'><td>nome</td><td>provenienza</td><td>console</td><td>anno di uscita</td><td>prezzo</td></tr>";
        foreach($ris as $riga){
            echo "<tr class='lis'><td onclick='aggiungi(this.innerText)'>".$riga['nome']."</td><td>".$riga['provenienza']."</td><td>".$riga['console']."</td><td>".$riga['annouscita']."</td><td>".$riga['prezzo']."</td></tr>";
        }
    }
    echo "</table>";
    $con->close();
}
?>
</body>
</html>