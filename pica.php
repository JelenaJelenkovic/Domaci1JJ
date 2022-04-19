<!DOCTYPE html>
<html>
<head>
<title>Pregled pića</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="stylepica.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="pica1">
<img src="drink.jpg" alt="Drink">
</div>

<?php
include "povezivanje.php";
if (isset ($_GET['akcija'])){
    if ($_GET['akcija'] == 'unos'){
?>


<div class="jelopice">
<h1>Unos novog pića</h1>
<hr/>
<form method="post" action="?akcija=unos">
<label>ID :</label> <input type="text" name="ID_Pica" /><br/>
<label>Naziv :</label> <input type="text" name="Naziv" /><br/>
<label>Cena :</label> <input type="text" name="Cena" /><br/>
<label>Kategorija :</label> <input type="text" name="Kategorija" /><br/>
<input type="submit" name="unos" value="Ubaci piće" />
</form>
</div>


<?php
include "povezivanje.php";
if (isset($_POST["unos"])){
    if (isset($_POST['ID_Pica'])&&isset($_POST['Naziv'])&&isset($_POST['Cena'])&&isset($_POST['Kategorija'])){
    $ID_Pica = $_POST['ID_Pica'];
    $Naziv = $_POST['Naziv'];
    $Cena = $_POST['Cena'];
    $Kategorija = $_POST['Kategorija'];


$sql="INSERT INTO pica (ID_Pica,Naziv,Cena,Kategorija) VALUES ('".$ID_Pica."', '".$Naziv."', '".$Cena."', '".$Kategorija."')";
if ($mysqli->query($sql)){
    echo '<script>alert("Piće je uspešno dodato")</script>';
} else {
    echo '<script>alert("Nastala je greška pri dodavanju pića")</script>';
}
} else {

    echo '<script>alert("Nisu prosledjeni parametri.")</script>';
}}}}

if (isset ($_GET['akcija']) && isset ($_GET['ID_Pica'])){
    $akcija = $_GET['akcija'];
    $ID_Pica = $_GET['ID_Pica'];
    switch ($akcija){
        case "brisanje":
        $upit = "DELETE FROM pica WHERE ID_Pica = ".$ID_Pica;
        if (!$q=$mysqli->query($upit)){
                echo '<script>alert("Nastala je greška pri izvodjenju upita.")</script>';
                die();
                } else {
                echo '<script>alert("Brisanje pića je uspelo.")</script>';

                }
        break;

        case "izmena_forma":
        $upit="SELECT ID_Pica, Naziv, Cena, Kategorija FROM pica WHERE ID_Pica=".$ID_Pica;
        if (!$q=$mysqli->query($upit)){
            echo '<script>alert("Nastala je greška pri izvodjenju upita")</script>';
            die();
            } else {
            if ($q->num_rows!=1){
            echo '<script>alert("Nepostojeće piće")</script>';
            } else {
                $pice = $q->fetch_object();
                $ID_Pica = $pice->ID_Pica;
                $Naziv = $pice->Naziv;
                $Cena = $pice->Cena;
                $Kategorija = $pice->Kategorija;
?>

<div class="jelopice">
<h1>Izmena pića</h1>
<hr/>
<form method="post" action="?akcija=izmena&ID_Pica=<?php echo $_GET['ID_Pica'];?>">
<label>Naziv : </label> <input type="text" name="Naziv" value="<?php echo $Naziv;?>"/><br/>
<label>Cena : </label> <input type="text" name="Cena" value="<?php echo $Cena;?>"/><br/>
<label>Kategorija : </label> <input type="text" name="Kategorija" value="<?php echo $Kategorija;?>"/><br/>
<input type="submit" name="unos" value="Potvrdi" />
</form>
</div>

<?php
}
}
    break;

    case "izmena":
            if (isset ($_POST['Naziv']) && isset ($_POST['Cena']) && isset ($_POST['Kategorija'])){
                $Naziv = $_POST['Naziv'];
                $Cena = $_POST['Cena'];
                $Kategorija = $_POST['Kategorija'];

$upit="UPDATE pica SET Naziv='". $Naziv ."', Cena='". $Cena ."', Kategorija='". $Kategorija ."' WHERE ID_Pica=". $ID_Pica;
        if ($mysqli->query($upit)){
        if ($mysqli->affected_rows > 0 ){
            echo '<script>alert("Podaci o piću uspešno izmenjeni")</script>';
            } else {
                echo '<script>alert("Podaci nisu izmenjeni")</script>';
                    }
                    } else {
                echo '<script>alert("Nastala je greška pri izmeni podataka")</script>';
                            }
                            } else {
                echo '<script>alert("nisu prosledjeni parametri za izmenu")</script>';
                                    }
    break;

    default:
    echo '<script>alert("Nepostojeća akcija!")</script>';
    break;
}
}


$sql="SELECT ID_Pica, Naziv, Cena, Kategorija FROM pica";
if (!$q=$mysqli->query($sql)){
    echo '<script>alert("Nastala je greška izvodjenju upita")</script>';

    die();
    }
if ($q->num_rows==0){
    echo '<script>alert("Nema pića za prikaz")</script>';

    } else {
?>
<div class="jelopice">
<h1>Pićovnik</h1> 

<hr/>
<table class="table table-striped table-dark " style="width:60%">
<thead>
<th><b>Redni broj</b></th>
<th><b>Naziv</b></th>
<th><b>Cena</b></th>
<th><b>Kategorija</b></th>
</thead>

<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->ID_Pica; ?></td>
<td><?php echo $red->Naziv; ?></td>
<td><?php echo $red->Cena; ?></td>
<td><?php echo $red->Kategorija; ?></td>
<td><a href="pica.php?akcija=izmena_forma&ID_Pica=<?php echo $red->ID_Pica; ?>">Izmena</a></td>
<td><a href="pica.php?akcija=brisanje&ID_Pica=<?php echo $red->ID_Pica; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
<p><a href="pica.php?akcija=unos">Unesi novo piće, izmeni ili obriši</a></p>
<br>
</div>

<footer>
  <p>Duškina kuhinjica<br>
  <p>Pariske komune, Novi Beograd<br>
 

<a href="https://sr-rs.facebook.com/" class="fa fa-facebook"></a>
<a href="https://twitter.com/?lang=sr" class="fa fa-twitter"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
<a href="https://www.pinterest.com/" class="fa fa-pinterest"></a>
</footer>
</body>
</html>