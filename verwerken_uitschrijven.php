<?php
// FORMULIER UITLEZEN (DATA BINNENHALEN)
$mailadres = $_POST['mailadres'];

// CONNECTIE MAKEN MET DATABASE
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = '25061_db';

$dbc = mysqli_connect($host, $username, $password, $dbname) or die ('Error Connecting to the database.');
// QUERY SCHRIJVEN VOOR ZOEKEN NAAR DATA
$query = "SELECT * FROM nieuwsbrief WHERE mailadres = '$mailadres'";
// QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying (SELECT).');
// TELLEN HOEVEEL REGELS WE NU HEBBEN
$number_of_rows = mysqli_num_rows($result);
// TESTEN OF ER REGELS ZIJN EN DAAR CONCLUSIES AAN VERBINDEN
if ($number_of_rows ==0) {
    echo 'Helaas, het mailadres ' . $mailadres . ' staat niet in de database.<br>';
    echo '<a href="uitschrijven.php">Klik hier om het nogmaals te proberen...</a><br><br>';
    exit();
}
// QUERY SCHRIJVEN VOOR VERWIJDEREN DATA
$query = "DELETE FROM nieuwsbrief WHERE mailadres = '$mailadres'";
// QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying (DELETE).');
// CONNECTIE VERBREKEN
mysqli_close($dbc);
// VERSLAG DOEN VAN HET RESULTAAT
echo 'Het mailadres ' . $mailadres . ' is verwijderd uit de database!<br>';
echo '<a href="index.php">Klik hier om terug te gaan naar de homepage</a><br><br>';