<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beheren</title>
</head>
<body>
<?php

// 1. Connectie maken met de DB
$dbc = mysqli_connect('localhost', 'root', '', '25061_db') or die ('Error Connecting');

// 2. Kijken in de Database en alle mailadressen tevoorschijn halen
$query = "SELECT * FROM nieuwsbrief";
$result = mysqli_query($dbc, $query) or die ('Error querying');

// 3. Loopje waarin alle mailadressen in beeld worden gebracht
while ($row = mysqli_fetch_array($result)) {
    echo $row ['mailadres'] . '<br>';
}

?>
</body>
</html>