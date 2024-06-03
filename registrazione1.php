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
                            $con=new mysqli("localhost","root","","videogame") or die("Errore");
                            $nn=$con->real_escape_string($_GET['n']);
                            $password=$con->real_escape_string($_GET['pass']);
                            $sql="SELECT username, password FROM utente WHERE username = '$nn' AND password = '$password';";
                            $ris=$con->query($sql) or die("Errore1");
                            $num=mysqli_num_rows($ris);
                            if($num>0){
                                echo "<input type='submit' value='puoi passare'>";
                                exit();
                            }
                            else{
                                echo "utente non registrato<br><a href='nonregistrato.php'>registrati</a>";
                                exit();
                            }
                        }
                    ?>
</body>
</html>