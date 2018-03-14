<?php
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $mailadres = $_POST['mailadres'];

    //DATA IN DATABASE STOPPEN

// CONNECTIE MAKEN MET DATABASE
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = '25061_db';

$dbc = mysqli_connect($host, $username, $password, $dbname) or die ('Error Connecting to the database.');

        //2. OPDRACHT (QUERY) SCHRIJVEN VOOR DE DATABASE
        $query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam', '$tussenvoegsel' , '$achternaam' , '$mailadres')";

        //3. QUERY UITVOEREN
        $result = mysqli_query($dbc,$query) or die ('Error querying.');
    //4. VERBINDING VERBREKEN
         mysqli_close($dbc);
    //5. BEVESTIGEN DAT DATA IN DATABASE STAAT
        if ($result) {
            echo '<h2> De volgende gegevens zijn nu toegevoegd aan de database:<br> ' . '</h2>';
            echo '<strong>' . 'Voornaam: ' . '</strong>' .  $voornaam . '<br>';
            echo '<strong>' . 'Tussenvoegsel: ' . '</strong>' . $tussenvoegsel . '<br>';
            echo '<strong>' . 'Achternaam: ' . '</strong>' . $achternaam . '<br>';
            echo '<strong>' . 'E-mailadres: ' . '</strong>' . $mailadres . '<br><br>';
            echo '<a href="index.php">Klik hier om terug te gaan naar de homepage</a><br><br>';

        } else {
            echo 'Sorry, er is iets misgegaan. Probeer het opnieuw.';
        }
