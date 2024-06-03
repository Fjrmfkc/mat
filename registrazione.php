<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
    position: absolute;
    top: 5%;
    left: 10%;
    transform: translate(-50%, -50%);
}
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        
        .conta {
            border: 1px solid blue;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <a href="nonregistrato.php">registrati</a>
    <?php
        $create_db= new mysqli("localhost", "root", "");
        $sql="CREATE DATABASE IF NOT EXISTS videogame";
        $ris=$create_db->query($sql) or die("errore");
        $create_db->close();
        $create_popolate= new mysqli("localhost", "root", "", "videogame");
        $sql="CREATE TABLE IF NOT EXISTS utente(
            username varchar(20) PRIMARY KEY,
            password varchar(20) NOT NULL,
            eta int NOT NULL,
            nazione varchar(20) NOT NULL,
            soldi int NOT NULL);";
        $ris=$create_popolate->query($sql) or die("errore");
        $sql="CREATE TABLE IF NOT EXISTS videogame(
            id char(3) PRIMARY KEY,
            nome varchar(100) NOT NULL,
            provenienza varchar(50) NOT NULL,
            console varchar(50) NOT NULL,
            annouscita date NOT NULL,
            prezzo int NOT NULL);";
            $ris=$create_popolate->query($sql) or die("errore");
        $sql="CREATE TABLE IF NOT EXISTS compra (
            com CHAR(3) PRIMARY KEY,
            id CHAR(3),
            FOREIGN KEY (id) REFERENCES videogame(id),
            username VARCHAR(20),
            FOREIGN KEY (username) REFERENCES utente(username)
        );";
        $ris=$create_popolate->query($sql) or die("errore");
        $sql="SELECT * FROM videogame;";
        $ris=$create_popolate->query($sql) or die("errore");
        $num = mysqli_num_rows($ris);
        if ($num < 1){
            $sql="INSERT INTO videogame (id, nome, provenienza, console, annouscita, prezzo) VALUES
            ('001', 'spyro a new beginning', 'sony', 'game boy advance', '2006-10-10', 10),
            ('002', 'super mario 3', 'nintendo', 'game boy advance', '1988-10-23', 10),
            ('003', 'mario sport mix', 'nintendo', 'wii', '2010-11-25', 20),
            ('004', 'wii sports', 'nintendo', 'wii', '2006-11-19', 20),
            ('005', 'gogoto', 'nintnedo', 'wii', '2000-01-01', 10),
            ('006', 'skylander trap team', 'activision', 'wii/xbox 360', '2014-10-05', 20),
            ('007', 'skylanders spyro adventure', 'activision', 'wii', '2011-10-16', 20),
            ('008', 'luigi mansion', 'nintendo', 'game cube', '2001-09-14', 30),
            ('009', 'super mario 64', 'nintendo', 'nintendo 64', '1996-06-23', 40),
            ('010', 'just dance 2016', 'nintendo', 'wii', '2015-10-20', 30),
            ('011', 'just dance 3', 'nintendo', 'wii', '2011-10-07', 30),
            ('012', 'just dance 4', 'nintendo', 'wii', '2012-10-09', 30),
            ('013', 'mario kart wii', 'nintendo', 'wii', '2008-04-10', 40),
            ('014', 'super mario galaxy', 'nintendo', 'wii', '2007-11-01', 40),
            ('015', 'michael jackson', 'nintendo', 'wii', '2010-11-23', 20),
            ('016', 'new super mario bros', 'nintendo', 'ds', '2006-05-15', 30),
            ('017', 'power ranger', 'nintendo', 'ds', '2007-09-11', 20),
            ('018', 'castelvania', 'nintendo', 'ds', '2005-11-29', 20),
            ('019', 'pokemon bianco', 'nintendo', 'ds', '2010-09-18', 30),
            ('020', 'pang', 'nintendo', 'ds', '2006-01-01', 20),
            ('021', 'cars', 'nintendo', 'ds', '2006-06-06', 20),
            ('022', 'bagugan', 'nintendo', 'ds', '2009-10-20', 20),
            ('023', 'super princes peach', 'nintendo', 'ds', '2005-10-20', 30),
            ('024', 'pokemon mundo misterioso', 'nintendo', 'ds', '2005-11-17', 30),
            ('025', 'mostri contro alieni', 'nintendo', 'ds', '2009-03-24', 20),
            ('026', 'ben 10 alien force', 'nintendo', 'ds', '2008-10-28', 20),
            ('027', 'sam power', 'nintendo', 'ds', '2008-10-01', 20),
            ('028', 'spider man edge of time', 'sony', 'ds', '2011-10-04', 20),
            ('029', 'luigi mansion 2', 'nintendo', '3ds', '2013-03-20', 40),
            ('030', 'new super mario bros 2', 'nintendo', '3ds', '2012-07-28', 40),
            ('031', 'kirby planet robobot', 'nintendo', '3ds', '2016-04-28', 40),
            ('032', 'pac man and the ghostly adventure', 'nintendo', '3ds', '2013-10-29', 30),
            ('033', 'power ranger megaforce', 'nintendo', '3ds', '2013-11-30', 30),
            ('034', 'pokemon zaffiro alpha', 'nintendo', '3ds', '2014-11-21', 40),
            ('035', 'pokemon rubino omega', 'nintendo', '3ds', '2014-11-21', 40),
            ('036', 'mario party island tour', 'nintendo', '3ds', '2013-11-22', 40),
            ('037', 'super pokemon rumble', 'nintendo', '3ds', '2011-12-02', 30),
            ('038', 'yu-gi-oh zexal', 'nintendo', '3ds', '2012-12-13', 30),
            ('039', 'mario kart 7', 'nintendo', '3ds', '2011-12-01', 40),
            ('040', 'super smash bros 3ds', 'nintendo', '3ds', '2014-09-13', 40),
            ('041', 'pokemon sole', 'nintendo', '3ds', '2016-11-18', 40),
            ('042', 'yo-kai-watch', 'nintendo', '3ds', '2013-07-11', 40),
            ('043', 'yo-kai-watch 2', 'nintendo', '3ds', '2014-07-10', 40),
            ('044', 'inazuma eleven 3 fuoco esplosivo', 'nintendo', '3ds', '2013-12-13', 40),
            ('045', 'tenkai knights: brave battle', 'nintendo', '3ds', '2014-09-25', 30),
            ('046', 'steel diver', 'nintendo', '3ds', '2011-03-27', 30),
            ('047', 'street fighter 5', 'sconosciuto', 'xbox 360', '2016-02-16', 40),
            ('048', 'rabbids invasion', 'nintendo', 'xbox 360', '2014-11-18', 20),
            ('049', 'luigi mansion 3', 'nintendo', 'switch', '2019-10-31', 60),
            ('050', 'paper mario the origami king', 'nintendo', 'switch', '2020-07-17', 60),
            ('051', 'super mario odyssey', 'nintendo', 'switch', '2017-10-27', 60),
            ('052', 'mario tennis aces', 'nintendo', 'switch', '2018-06-22', 60),
            ('053', 'just dance 2018', 'nintendo', 'switch', '2017-10-24', 40),
            ('054', 'super smash bros ultimate', 'nintendo', 'switch', '2018-12-07', 60),
            ('055', 'splatoon 3', 'nintendo', 'switch', '2022-09-09', 60),
            ('056', 'bayonetta', 'nintendo', 'switch', '2014-10-24', 40),
            ('057', 'bayonetta 2', 'nintendo', 'switch', '2014-10-24', 40),
            ('058', 'ARMS', 'nintendo', 'switch', '2017-06-16', 60),
            ('059', 'mario kart 8 deluxe', 'nintendo', 'switch', '2017-04-28', 60),
            ('060', 'peach', 'nintendo', 'switch', '2005-10-20', 60),
            ('061', 'splatoon 2', 'nintendo', 'switch', '2017-07-21', 60),
            ('062', 'spider-man', 'sony', 'playstation 4', '2018-09-07', 60),
            ('063', 'spider-man 2', 'sony', 'playstation 5', '2023-10-20', 70),
            ('064', 'ratchet and clank', 'sony', 'playstation 4', '2016-04-12', 40),
            ('065', 'ratchet and clank rift apart', 'sony', 'playstation 5', '2021-06-11', 70),
            ('066', 'super mario party', 'nintendo', 'switch', '2018-10-05', 60),
            ('067', 'nintendo labo bot', 'nintendo', 'switch', '2018-04-20', 60),
            ('068', 'detroit: become human', 'sony', 'playstation 4', '2018-05-25', 60),
            ('069', 'avatar: frontiers of pandora', 'sony', 'playstation 5', '2023-12-07', 70),
            ('070', 'days gone', 'sony', 'playstation 4', '2019-04-26', 60),
            ('071', 'uncharted 4', 'sony', 'playstation 4', '2016-05-10', 40),
            ('072', 'horizon zero dawn', 'sony', 'playstation 4', '2017-02-28', 60),
            ('073', 'horizon forbidden west', 'sony', 'playstation 5', '2022-02-18', 70);";
            $ris=$create_popolate->query($sql) or die("errore");
        }
    ?>
    <div class="conta">
        <form action="registrato.php" METHOD="POST">
        <table border="1" align="center">
            <tr>
                <td colspan="2" align="center" id="response"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" placeholder="inserisci identificativo" id="identificator" name="variabile">
                </td>
                <td>
                    <input type="password" placeholder="inserisci password" id="pas">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="verifica" onclick="verifica()">
                </td>
            </tr>
        </table>
        </form>
        <script>
            function verifica() {
                document.getElementById("response").innerHTML = "";
                var str = document.getElementById('identificator').value;
                var pass = document.getElementById('pas').value;
                if (str === "" && pass === "") {
                    document.getElementById('response').innerHTML = "Inserisci username e password";
                    return;
                }
                if (str === "") {
                    document.getElementById('response').innerHTML = "Inserisci username";
                    return;
                }
                if (pass === "") {
                    document.getElementById('response').innerHTML = "Inserisci password";
                    return;
                }
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (xml.readyState == 4 && xml.status == 200) {
                        document.getElementById("response").innerHTML = xml.responseText;
                    }
                };
                xml.open("GET","registrazione1.php?n="+str+"&pass="+pass,true);
                xml.send();
            }
        </script>
    </div>
</body>
</html>