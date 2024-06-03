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
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #risposta{
            color:red;
            text-align:center;
            background-color: aliceblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
        h4 {
            margin: 0;
            padding: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .informazioni {
            width: 20px;
            height: 20px;
            background-color: blue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 12px;
            font-family: 'Old English Text MT';
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <a href="registrazione.php">torna indietro</a>
    <div class="container">
        <div id="risposta"></div>
            <table border="1" align="center">
                <tr>
                    <td colspan="2" align="center">
                        <input type="text" name="username" id="user" placeholder="inserisci il nome utente">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="password" id="pas" placeholder="inserire la password">
                    </td>
                    <td>
                        <input type="password" name="conferma" id="conf" placeholder="conferma la password">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="number" name="eta" id="e" min="1" max="110" placeholder="inserire età" style="width: 95%;">
                    </td>
                    <td>
                        <select name="nazione" id="naz">
                            <option value="">Seleziona una nazione</option>
                        </select>
                        <script>
                            const countries = [
                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua e Barbuda",
                                "Argentina", "Armenia", "Australia", "Austria", "Azerbaigian", "Bahamas", "Bahrain",
                                "Bangladesh", "Barbados", "Belgio", "Belize", "Benin", "Bhutan", "Bielorussia",
                                "Birmania", "Bolivia", "Bosnia ed Erzegovina", "Botswana", "Brasile", "Brunei",
                                "Bulgaria", "Burkina Faso", "Burundi", "Cambogia", "Camerun", "Canada",
                                "Capo Verde", "Ciad", "Cile", "Cina", "Cipro", "Colombia", "Comore", "Congo",
                                "Corea del Nord", "Corea del Sud", "Costa d'Avorio", "Costa Rica", "Croazia",
                                "Cuba", "Danimarca", "Dominica", "Ecuador", "Egitto", "El Salvador",
                                "Emirati Arabi Uniti", "Eritrea", "Estonia", "Eswatini", "Etiopia", "Figi",
                                "Filippine", "Finlandia", "Francia", "Gabon", "Gambia", "Georgia", "Germania",
                                "Ghana", "Giamaica", "Giappone", "Giordania", "Grecia", "Grenada", "Guatemala",
                                "Guinea", "Guinea-Bissau", "Guinea Equatoriale", "Guyana", "Haiti", "Honduras",
                                "India", "Indonesia", "Iran", "Iraq", "Irlanda", "Islanda", "Israele", "Italia",
                                "Kazakistan", "Kenya", "Kirghizistan", "Kiribati", "Kuwait", "Laos", "Lesotho",
                                "Lettonia", "Libano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Lussemburgo",
                                "Macedonia del Nord", "Madagascar", "Malawi", "Malaysia", "Maldive", "Mali", "Malta",
                                "Marocco", "Mauritania", "Mauritius", "Messico", "Micronesia", "Moldavia", "Monaco",
                                "Mongolia", "Montenegro", "Mozambico", "Namibia", "Nauru", "Nepal", "Nicaragua",
                                "Niger", "Nigeria", "Norvegia", "Nuova Zelanda", "Oman", "Paesi Bassi", "Pakistan",
                                "Palau", "Palestina", "Panama", "Papua Nuova Guinea", "Paraguay", "Perù", "Polonia",
                                "Portogallo", "Qatar", "Regno Unito", "Repubblica Centrafricana", "Repubblica Ceca",
                                "Repubblica Democratica del Congo", "Repubblica Dominicana", "Romania", "Ruanda",
                                "Russia", "Saint Kitts e Nevis", "Saint Vincent e Grenadine", "Saint Lucia",
                                "Samoa", "San Marino", "Santa Sede", "Sao Tome e Principe", "Senegal", "Serbia",
                                "Seychelles", "Sierra Leone", "Singapore", "Siria", "Slovacchia", "Slovenia",
                                "Somalia", "Spagna", "Sri Lanka", "Stati Uniti", "Sudafrica", "Sudan", "Sudan del Sud",
                                "Suriname", "Svezia", "Svizzera", "Swaziland", "Tagikistan", "Tanzania", "Thailandia",
                                "Timor Est", "Togo", "Tonga", "Trinidad e Tobago", "Tunisia", "Turchia", "Turkmenistan",
                                "Tuvalu", "Ucraina", "Uganda", "Ungheria", "Uruguay", "Uzbekistan", "Vanuatu",
                                "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                            ];
                            function populateCountries() {
                                const select = document.getElementById('naz');
                                countries.forEach(country => {
                                const option = document.createElement('option');
                                    option.value = country.toLowerCase().replace(/ /g, '-');
                                    option.text = country;
                                    select.appendChild(option);
                                });
                            }
                            document.addEventListener('DOMContentLoaded', populateCountries);
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4 title="i soldi inseriti, non scaleranno effettivamente dalla tua carta di credito">inserire il capitale economico</h4>
                        <input type="number" name="capitale" id="cap" min="1" placeholder="inserire capitale economico">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" value="registrati" onclick="controllo();">
                    </td>
                </tr>
            </table>
        </div>
        <script>
            function controllo() {
                document.getElementById("risposta").innerHTML = "";
                var str = document.getElementById('user').value;
                var pass = document.getElementById('pas').value;
                var contr = document.getElementById('conf').value;
                var eta = parseInt(document.getElementById('e').value, 10);
                var nazione = document.getElementById('naz').value;
                var cap = parseInt(document.getElementById('cap').value, 10);
                var re = false;
                if (str === "" && pass === "") {
                    document.getElementById('risposta').innerHTML += "Inserisci username e password<br>";
                    re = true;
                } else {
                    if (str === "") {
                        document.getElementById('risposta').innerHTML += "Inserisci username<br>";
                        re = true;
                    }
                    if (pass === "") {
                        document.getElementById('risposta').innerHTML += "Inserisci password<br>";
                        re = true;
                    }
                }
                if (pass !== contr) {
                    document.getElementById('risposta').innerHTML += "Il controllo della password non corrisponde<br>";
                    re = true;
                }
                if (isNaN(eta) || eta < 18) {
                    document.getElementById('risposta').innerHTML += "Devi essere maggiorenne per registrarti<br>";
                    re = true;
                }
                if (nazione === "") {
                    document.getElementById('risposta').innerHTML += "Seleziona una nazione valida<br>";
                    re = true;
                }
                if (isNaN(cap) || cap < 1) {
                    document.getElementById('risposta').innerHTML += "Inserisci un capitale valido<br>";
                    re = true;
                }
                if (re) {
                    return;
                }
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (xml.readyState == 4 && xml.status == 200) {
                        document.getElementById("risposta").innerHTML = xml.responseText;
                    }
                };
                var params = "n=" + encodeURIComponent(str) + 
                    "&pass=" + encodeURIComponent(pass) + 
                    "&e=" + encodeURIComponent(eta) + 
                    "&naz=" + encodeURIComponent(nazione) + 
                    "&cap=" + encodeURIComponent(cap);
                xml.open("GET", "nonregistrato1.php?" + params, true);
                xml.send();
            }
        </script>
    </body>
</html>