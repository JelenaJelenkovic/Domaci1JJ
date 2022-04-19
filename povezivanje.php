
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Povezivanje</title>

</head>
<body>

<?php
$server = "localhost";
$user = "root";
$password = "";
$mysql_db = "restoran";
$mysqli = new mysqli($server, $user, $password, $mysql_db);


if ($mysqli->connect_errno) {
    printf("Nema konekcije:  %s\n", $mysqli->connect_error);
    exit();
  
}
$mysqli->set_charset("utf8");


?>

</body>
</html>
