<!DOCTYPE html>
<html>
<head>
<title>Pregled jela po kategoriji</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylezajednicki.css">
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
include "povezivanje.php";

$sql="SELECT * FROM jela order by Kategorija";
if (!$q=$mysqli->query($sql)){
        echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
        exit();
        }
if ($q->num_rows==0){
        echo "Ne postoji nijedno jelo.";
        } else {
?>
<br>
<table class="table table-striped table-dark ">
<tr>
<td><b>Kategorija</b></td>
<td><b>Redni broj</b></td>
<td><b>Naziv</b></td>
<td><b>Cena</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->Kategorija; ?></td>
<td><?php echo $red->ID_Jela; ?></td>
<td><?php echo $red->Naziv; ?></td>
<td><?php echo $red->Cena; ?></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
</body>
</html>