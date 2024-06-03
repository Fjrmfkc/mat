<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Div Visibility</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f0f0f0;
}

.immagine {
    position: absolute;
    top: 1%;
    right: 1%;
    width: 10%;
    height: auto;
    cursor: pointer;
    z-index: 10;
}

.immagine img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.lista-prodotti {
    width: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    margin-top: 2%;
    overflow-x: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
}

.dati-personali {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-sizing: border-box;
}

.exit {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: red;
    color: white;
    padding: 10px;
    cursor: pointer;
    font-family: 'Old English Text MT', serif;
    font-size: 24px;
    border-radius: 5px;
}

.dati-personali .info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 90%;
    width: 100%;
    margin: 0 auto;
}

#titolo {
    background-color: aliceblue;
    width: 100%;
    text-align: center;
    box-sizing: border-box;
}

.dati-personali .info-grid div {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: 10px;
    text-align: left;
    color: black;
}

.schermata-principale {
    text-align: center;
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}

.input-container {
    display: inline-block;
    width: 100%;
    max-width: 400px;
    position: relative;
}

input[type="text"],
input[type="button"] {
    width: calc(120% - 40px);
    padding: 15px 20px;
    border-radius: 25px;
    font-size: 16px;
    transition: all 0.3s ease;
    outline: none;
    text-align: center;
    box-sizing: border-box;
    margin-bottom: 20px;
}

input[type="text"]::placeholder {
    text-align: center;
}

input[type="text"]:focus {
    border-color: #0056b3;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}

input[type="button"] {
    border: none;
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    width: 100%;
}

input[type="button"]:hover {
    background-color: #0056b3;
}

input[type="button"]:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
}

.lis:hover {
    background-color: #f0f8ff;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #dddddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
}

td {
    background-color: #f9f9f9;
    color: black;
    text-align: center;
    vertical-align: middle;
}

tr:hover td {
    background-color: #f1f1f1;
}

@media (max-width: 600px) {
    .immagine {
        width: 15%;
    }
    .dati-personali .info-grid {
        grid-template-columns: 1fr;
    }
    .input-container {
        max-width: 300px;
    }
    input[type="text"],
    input[type="button"] {
        font-size: 14px;
        padding: 10px 15px;
    }
}
    </style>
    <script>
        function rimuovi(str){
                var elementoUtente = document.querySelector('.utente');
    if (!elementoUtente) {
        document.getElementById("ca").innerHTML = "Elemento utente non trovato.";
        return false;
    }
    var contenuto = elementoUtente.textContent;
    var valoreUtente = contenuto.replace('utente: ', '');
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            window.location.reload();
        }
    };

    var params = "o=" + encodeURIComponent(str) + "&utente=" + encodeURIComponent(valoreUtente);
    xml.open("GET", "registrato2.php?" + params, true);
    xml.send();
            }
            function carrello() {
            var elementoUtente = document.querySelector('.utente');
            if (!elementoUtente) {
                document.getElementById("ca").innerHTML = "Elemento utente non trovato.";
                return false;
            }
            var contenuto = elementoUtente.textContent;   
            var valoreUtente = contenuto.replace('utente: ', '');
            var tabella = document.getElementById("myTable");
            if (!tabella) {
                document.getElementById("ca").innerHTML = "Tabella non trovata.";
                return false;
            }
            var righe = tabella.getElementsByTagName("tr");
            if (righe.length === 2) {
                var str = document.getElementById("inputText").value;
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (xml.readyState == 4 && xml.status == 200) {
                        document.getElementById("ca").innerHTML = xml.responseText;
                        var a = document.getElementById("ca").value;
                        if (a !=="Soldi insufficienti."){
                            window.location.reload();  
                        }
                    }
                };
                var params = "n=" + encodeURIComponent(str) + "&utente=" + encodeURIComponent(valoreUtente);
                xml.open("GET", "registrato2.php?" + params, true);
                xml.send();
                return true;
            } else {
                document.getElementById("ca").innerHTML = "non è stato selezionato solo 1 valore";
                return false;
            }
        }
        function aggiungi(str) {
    var elementoUtente = document.querySelector('.utente');
    if (!elementoUtente) {
        document.getElementById("ca").innerHTML = "Elemento utente non trovato.";
        return false;
    }
    var contenuto = elementoUtente.textContent;
    var valoreUtente = contenuto.replace('utente: ', '');

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            document.getElementById("ca").innerHTML = xml.responseText;
            window.location.reload();
        }
    };

    var params = "m=" + encodeURIComponent(str) + "&utente=" + encodeURIComponent(valoreUtente);
    xml.open("GET", "registrato2.php?" + params, true);
    xml.send();
}
function sparisci() {
            var div1 = document.querySelector('.immagine');
            var div2 = document.querySelector('.dati-personali');
            var div3 = document.querySelector('.schermata-principale');
            if (div1.style.display !== 'none') {
                div1.style.display = 'none';
                div3.style.display = 'none';
                div2.style.display = 'block';
                caricaProdotti();
            } else {
                div1.style.display = 'block';
                div2.style.display = 'none';
                div3.style.display = 'block';
            }
        }

        function controllo(str) {
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (xml.readyState == 4 && xml.status == 200) {
                    document.getElementById("lista-prodotti").innerHTML = xml.responseText;
                }
            };
            var params = "n=" + encodeURIComponent(str);
            xml.open("GET", "registrato1.php?" + params, true);
            xml.send();
        }
    </script>
</head>
<body>
    <div class="immagine" onclick="sparisci()">
        <img src="kisspng-computer-icons-google-account-icon-design-login-5afc02dab4a218.0950785215264652427399.jpg" alt="Icon">
    </div>
    <div class="dati-personali" style="display:none;">
        <div class="exit" onclick="sparisci()">X</div>
        <?php
        $con = new mysqli("localhost", "root", "", "videogame");
        if ($con->connect_error) {
            die("Errore di connessione: " . $con->connect_error);
        }

        $variabile = $con->real_escape_string($_POST['variabile']);
        $sql = "SELECT * FROM utente WHERE username = '$variabile'";
        $ris = $con->query($sql) or die("errore");
        $num = mysqli_num_rows($ris);
        if ($num > 0) {
            while ($riga = $ris->fetch_assoc()) {
                echo "<div class='utente'>utente: " . $riga['username'] . "</div>";
                echo "<div class='password'>password: " . $riga['password'] . "</div>";
                echo "<div class='eta'>età: " . $riga['eta'] . "</div>";
                echo "<div class='nazione'>nazione: " . $riga['nazione'] . "</div>";
                echo "<div class='soldi'>soldi: " . $riga['soldi'] . "</div>";
            }
        }

        $sql = "SELECT nome, provenienza, console, annouscita, prezzo 
                FROM utente 
                INNER JOIN compra ON compra.username = utente.username 
                INNER JOIN videogame ON compra.id = videogame.id 
                WHERE utente.username = '$variabile';";
        $ris = $con->query($sql) or die("errore");
        $num = mysqli_num_rows($ris);
        if ($num > 0) {
            echo "<table border='1' align='center'><tr><td colspan='5' align='center'>carrello</td></tr><tr><td><b>nome</b></td><td><b>provenienza</b></td><td><b>console</b></td><td><b>anno di uscita</b></td><td><b>prezzo</b></td></tr>";
            while ($riga = $ris->fetch_assoc()) {
                echo "<tr class='lis'><td onclick='rimuovi(this.innerText)'>".$riga['nome']."</td><td>".$riga['provenienza']."</td><td>".$riga['console']."</td><td>".$riga['annouscita']."</td><td>".$riga['prezzo']."</td></tr>";
            }
            echo "</table>";
        }

        $con->close();
        ?>
    </div>
    <div class="schermata-principale">
        <div class="input-container">
            <table><tr><td><input type="text" id="inputText" oninput="controllo(this.value)" placeholder="ciccio inserisci qualcosa"></td><td><input type="button" value="metti nel carrello" onclick="carrello()"></td><td id="ca"></td></tr></table>
        </div>
        <div class="lista-prodotti" id="lista-prodotti">
        <?php
    $con = new mysqli("localhost", "root", "", "videogame");
    if ($con->connect_error) {
        die("Errore di connessione: " . $con->connect_error);
    }
    $sql = "SELECT * FROM videogame;";
    $ris = $con->query($sql);
    echo "<table border='1' align='center' id='myTable'><tr id='titolo'><td><b>nome</b></td><td><b>provenienza</b></td><td><b>console</b></td><td><b>anno di uscita</b></td><td><b>prezzo</b></td></tr>";
    foreach($ris as $riga){
        echo "<tr class='lis'><td onclick='aggiungi(this.innerText)'><b>".$riga['nome']."</b></td><td>".$riga['provenienza']."</td><td>".$riga['console']."</td><td>".$riga['annouscita']."</td><td>".$riga['prezzo']."</td></tr>";
    }
    echo "</table>";
    $con->close();
?>
        </div>
    </div>
</body>
</html>