<?php
        $servername = "localhost";  // Wenn die Datenbank nicht auf localhost läuft kommt da die Serveradresse rein
        $user = "root";                     // Das was bei phpMyAdmin als Benutzer drinsteht muss hier rein! Nicht Standartconfig nutzen, also pw und so machen
        $passwort = "";   // Hier tragen sie das Passwort ein welches mit dem Benutzer verbunden ist.
        $dbName = "mydb";     // Hier den Namen der Datenbank (so wies in phpmyadmin steht)
        //echo "test";
        $conn= mysqli_connect ("127.0.0.1","myuser","test12345","mydb");
        // $conn = mysqli_connect($servername, $user, $pw, $dbName);   //Hier findet die "richtige" Verbindung statt!
        //echo "test";
        if($conn->connect_error){
                die("Irgendwas hat nicht funktioniert!" .$con->connect_error); // Gibt Fehler aus
        }
?>