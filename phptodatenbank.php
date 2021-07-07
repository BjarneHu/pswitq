<?php
        $servername = "localhost";  // Wenn die Datenbank nicht auf localhost läuft kommt da die Serveradresse rein
        $user = "root";                     // Das was bei phpMyAdmin als Benutzer drinsteht muss hier rein! Nicht Standartconfig nutzen, also pw und so machen
        $passwort = "";   // Hier tragen sie das Passwort ein welches mit dem Benutzer verbunden ist.
        $dbName = "mydbase";     // Hier den Namen der Datenbank (so wies in phpmyadmin steht)
        $conn = mysqli_connect($servername, $user, $passwort, $dbName);   //Hier findet die "richtige" Verbindung statt!
        if($conn->connect_error){
                die("Irgendwas hat nicht funktioniert!" . $con->connect_error); // Gibt Fehler aus
        }
       
?>